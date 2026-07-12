<?php
namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\User;
use App\Models\Game;

class LeaderboardController extends Controller
{
    public function index()
    {
        // Top players by total score
        $topPlayers = User::withSum('scores', 'score')
                          ->orderByDesc('scores_sum_score')
                          ->take(10)
                          ->get();

        // Top scores per game
        $games = Game::with(['scores' => function($q) {
            $q->with('user')->orderByDesc('score')->take(5);
        }])->where('is_active', true)->get();

        return view('leaderboard', compact('topPlayers', 'games'));
    }
}