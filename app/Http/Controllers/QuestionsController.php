<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class QuestionsController extends Controller
{
	public function allBCSQuestions()
	{
		if(Auth::check())
        {
            $all = Question::all();

            return view('questions.all_question',['all'=>$all]);
        }
        return view('auth.login');
	}

    public function addBCSquestion()
    {
    	return view('questions.add_question');
    }

    public function uploadQuestion(Request $request)
    {
    	$this->validate($request,[
        		'file' => 'required|mimes:csv,txt,xlsx',
        		'catagory' => 'required'
      		]);

    	if(($handle =fopen($_FILES['file']['tmp_name'],"r")) !== FALSE)
    	{
    		fgetcsv($handle);

    		//echo $data[2]."<br>";

    		while(( $data =fgetcsv($handle,1000,",")) !== FALSE)
    		{
    			//echo $data[0]."->".$data[1]."->".$data[2].'<br>';
    			$question = Question::create([
                        'question' => $data[1],
                        'opt_A' => $data[2],
                        'opt_B' => $data[3],
                        'opt_C' => $data[4],
                        'opt_D' => $data[5],
                        'correct_opt' => $data[6],
                        'catagory_id' => $request->input('catagory'),
                        'user_id' => Auth::user()->id
            		]);
    		}
    		fclose($handle);
    	}
    	if($question)
            {
                return redirect()->route('home')->with('success','File data uploaded to the database Successfully');
            }
        else
        {
        	return back()->withInput()->with('error','Error Uploading file to the database.');
        }
    }
}
