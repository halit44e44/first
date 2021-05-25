<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {

        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(5);
        if ($quizzes) {
            return view('dashboard', compact('quizzes'));
        }
    }

    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions')->first();
        return view('quiz', compact('quiz'));
    }

    public function quiz_detail($slug)
    {
        $quiz = Quiz::whereSlug($slug)->withCount('questions')->first() ?? abort(404,'Böyle bir quiz bulunamadı.');
        return view('quiz_detail', compact('quiz'));
    }

    public function result(Request $request, $slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions')->first() ?? abort(404, "Sayfa bulunamadı");
        $correct = 0;
        
        foreach ($quiz->questions as $item) {
            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $item->id,
                'answer' => $request->post($item->id)
            ]);
            if ($item->correct_answer == $request->post($item->id)) {
                $correct += 1;
            }
        }
        
        $point = round((100 / count($quiz->questions)) * $correct);
        $wrong = count($quiz->questions) - $correct;
        Result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong

        ]);

        return redirect()->route('quiz.detail' , $quiz->slug)->withSuccess("Başarıyla Quizi Bitirdin Puanın: " . $point);
    }
}
