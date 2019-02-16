<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use Excel;
use File;

class QuestionsController extends Controller
{
	public function allBCSQuestions(Request $request)
	{
        $all = [];
        $catagoryName = [];
        if( $request->input('catagory') != null)
        {
            $catagoryID = $request->input('catagory');
            $catagoryName = DB::table('questioncatagories')->where('id', '=', $catagoryID)->get();
        }

        
		if(Auth::check())
        {
            $catagories = DB::table('questioncatagories')->get();
            if($request->input('catagory') == null)
            {
                return view('questions.all_question',compact(['catagoryName','catagories','all']));
            }
            else
            {
                $all = Question::where('catagory_id', '=', $catagoryID)->paginate(5);
                return view('questions.all_question',compact(['catagoryName','catagories','all']));
            }
        }
        return view('auth.login');
	}

    public function addBCSquestion()
    {
        $questioncatagories = DB::table('questioncatagories')->get();

        //echo count($questioncatagories);
    	return view('questions.add_question',['catagories' => $questioncatagories]);
    }

    public function uploadQuestion(Request $request)
    {
    	$this->validate($request,[
        		'file' => 'required|mimes:csv,txt,xlsx',
        		'catagory' => 'required'
      		]);


        if($request->hasFile('file'))
        {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") 
            {
 
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader){})->get();
                if(!empty($data) && $data->count())
                {
                    $co = 1;
                    foreach($data as $data)
                    {
                        //echo $co++.". -> ".$data->id."->".$data->question." -> ".$data->a." -> ".$data->b." -> ".$data->c." -> ".$data->d." -> ".$data->correct_answer." -> ".$request->input('catagory').'<br><br><br>';

                        $question = Question::create([
                                'question' => $data->question,
                                'opt_A' => $data->a,
                                'opt_B' => $data->b,
                                'opt_C' => $data->c,
                                'opt_D' => $data->d,
                                'correct_opt' => $data->correct_answer,
                                'catagory_id' => $request->input('catagory'),
                                'user_id' => Auth::user()->id
                            ]);
                    }
                }
            }
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
