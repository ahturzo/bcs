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
    public function allBCSQuestions()
	{
        $all = [];
        $catagoryName = [];
        $catagories = DB::table('questioncatagories')->get();
            
        if (request()->has('catagory')) 
        {
            $catagoryName = DB::table('questioncatagories')->where('id',request('catagory'))->get();

            $all = Question::where('catagory_id',request('catagory'))->paginate(20)
                            ->appends('catagory',request('catagory'));
                
            return view('questions.all_question',compact(['catagories','all','catagoryName']));
        }
        else
        {
            return view('questions.all_question',compact(['catagories','catagoryName','all']));
        }   
	}

    public function addBCSquestion()
    {
        $questioncatagories = DB::table('questioncatagories')->get();

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
            return redirect()->route('home')->with('success','<div class="text-center">File data uploaded Successfully</div>');
        }
        else
        {
            return back()->withInput()->with('error','<div class="text-center">Error Uploading file to the database.</div>');
        }
    }

    public function destroy(Request $request)
    {
        $qus = Question::find($request->input('question_id'));
        $qus->delete();
        return back()->withInput()->with('success','<div class="text-center">Question deleted Successfully.</div>');
    }

    public function update(Request $request, $id)
    {
        //echo $request->input('question_id')."<br>".$request->input('question')."<br>".$request->input('opt_a')."<br>".$request->input('opt_b')."<br>".$request->input('opt_c')."<br>".$request->input('opt_d')."<br>".$request->input('correct_opt')."<br>";

        $questionUpdate = Question::where('id',$request->input('question_id'))
        ->update([
                'question' => $request->input('question'),
                'opt_A' => $request->input('opt_a'),
                'opt_B' => $request->input('opt_b'),
                'opt_C' => $request->input('opt_c'),
                'opt_D' => $request->input('opt_d'),
                'correct_opt' => $request->input('correct_opt')
        ]);

        if($questionUpdate)
        {
            return back()->withInput()->with('success','<div class="text-center">Question Updated Successfully.</div>');
        }
        else
        {
            return back()->withInput()->with('error','<div class="text-center">Error Updation Question.</div>');
        }
    }
}
