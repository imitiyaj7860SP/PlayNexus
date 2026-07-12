<?php
namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Score;

class DashboardController extends Controller
{
    public function index()
    {
        $user         = auth()->user();
        $totalScore   = $user->totalScore();
        $totalWins    = $user->totalWins();
        $gamesPlayed  = $user->gamesPlayed();
        $achievements = $user->achievements()->get();
        $recentActivity = $user->activities()
                               ->with('game')
                               ->latest()
                               ->take(5)
                               ->get();
        $games = Game::where('is_active', true)->get();

        return view('dashboard', compact(
            'user','totalScore','totalWins',
            'gamesPlayed','achievements',
            'recentActivity','games'
        ));
    }
}