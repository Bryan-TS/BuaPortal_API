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
        $question->user_id = $request->userId;

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

    public function questionsByUser($id)
    {
        $questions = Question::where('user_id', '=', $id)->get();
        return $questions;
    }

    public function questionsBySearching($searchingTerm)
    {
        $keywords = explode(" ", $searchingTerm);
        $result = Question::query();

        $filteredKeywords = array_filter($keywords, function($word) {
            return strlen($word) > 2;
        });

        foreach($filteredKeywords as $word){
            $result->orWhere('title', 'LIKE', '%'.$word.'%');
        }
        
        $results = $result->get();
        // $questions = Question::where('title', 'LIKE', "%{$searchingTerm}%")->get();
        return $results;
    }
}
