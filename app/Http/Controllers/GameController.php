<?php
namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Activity;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();  // Get ALL games, no filter
        return view('games.index', compact('games'));
    }

    public function show(Game $game)
    {
        if (auth()->check()) {
            Activity::create([
                'user_id' => auth()->id(),
                'game_id' => $game->id,
                'action'  => 'visited',
                'score'   => 0,
            ]);
        }
        $game->incrementPlays();
        $topScores = $game->scores()
                          ->with('user')
                          ->orderByDesc('score')
                          ->take(5)
                          ->get();
        return view('games.show', compact('game', 'topScores'));
    }
}