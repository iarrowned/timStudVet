<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;
use App\Models\Answer;
use Carbon\Carbon;

class AnsController extends Controller
{
    public function show(){
        $questions = question::latest()->get();

        return view('admin.questions', [
            'questions' => $questions
        ]);
    }

    public function ans($id){
        $quest = question::find($id);

        return view('admin.answer', [
            'quest' => $quest
        ]);
    }

    public function ansSubmit($id, Request $request){
        //TODO сделать валидацию
        Answer::insert([
            'quest_id' => $id,
            'answer' => $request->input('answer'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $check = question::find($id)->update(['is_answer' => 1]);
        return redirect('/admin/answer');
    }

    public function deleteQuest($id){
        question::find($id)->delete();
        return redirect('/admin/answer');
    }

    public function updateAnswer($id){
        $quest = question::find($id);
        $ans = Answer::where('quest_id', $id)->first();
        return view('admin.updateAnswer', [
           'quest' => $quest,
           'ans' => $ans
        ]);
    }

    public function updateAnswerSubmit($id, Request $request){

        //TODO сделать валидацию
        Answer::where('quest_id', $id)->first()->update([
            'answer' => $request->input('answer'),
        ]);
        return redirect('/admin/answer');
    }
}
