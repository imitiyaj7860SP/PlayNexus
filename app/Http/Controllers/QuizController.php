<?php
namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Return 10 random questions for the given subject (or all subjects if Random)
     */
    public function questions(Request $request)
    {
        $subject = $request->get('subject');

        $query = QuizQuestion::query();

        if ($subject && $subject !== 'Random') {
            $query->where('subject', $subject);
        }

        $questions = $query->inRandomOrder()->take(10)->get([
            'id', 'subject', 'question',
            'option_a', 'option_b', 'option_c', 'option_d',
            'correct_answer'
        ]);

        return response()->json($questions);
    }
}