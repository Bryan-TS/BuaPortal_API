<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::all();
        return $questions;
    }


    public function store(Request $request)
    {
        $question = new Question();
        $question->category = $request->category;
        $question->title = $request->title;
        $question->description = $request->description;

        $question->save();
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
