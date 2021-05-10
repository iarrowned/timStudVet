<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;
use Carbon\Carbon;

class QueController extends Controller
{
    public function index(){
        return view('question');
    }

    public function QuestSubmit(Request $request){
        $rules = [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:50',
            'city' => 'required|min:3|max:50',
            'animal' => 'required|min:2|max:50',
            'age' => 'required|min:3|max:50|integer',
            'date' => 'required',
            'food' => 'required|min:3|max:50',
            'theme' => 'required|min:3|max:50',
            'question' => 'required|min:15|max:500'
        ];
        $validation = $this->validate($request ,$rules);
        if ($_FILES['file']['size'] != 0 && $_FILES['file']['error'] == 0) {
            $path = $request->file('file')->store('uploads', 'public');
        }
        else {
            $path = 0;
        }
        question::insert(['name' => $request->input('name'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
            'animal' => $request->input('animal'),
            'age' => $request->input('age'),
            'date' => $request->input('date'),
            'food' => $request->input('food'),
            'theme' => $request->input('theme'),
            'path' => $path,
            'question' => $request->input('question'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        return redirect('/quest');

    }


}
