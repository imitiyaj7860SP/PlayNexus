<?php
namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Activity;
use App\Models\Achievement;
use App\Models\UserAchievement;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Save score submitted from a game via AJAX
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'score'   => 'required|integer|min:0',
            'result'  => 'required|in:win,loss,draw,played',
        ]);

        // Save the score
        Score::create([
            'user_id' => auth()->id(),
            'game_id' => $request->game_id,
            'score'   => $request->score,
            'result'  => $request->result,
        ]);

        // Log activity
        Activity::create([
            'user_id' => auth()->id(),
            'game_id' => $request->game_id,
            'action'  => $request->result,
            'score'   => $request->score,
        ]);

        // Check and award achievements
        $this->checkAchievements(auth()->user());

        return response()->json(['status' => 'saved']);
    }

    /**
     * Check if user has earned any new achievements
     */
    private function checkAchievements($user): void
    {
        $achievements = Achievement::all();
        $earnedIds = $user->achievements()->pluck('achievements.id');

        foreach ($achievements as $achievement) {
            if ($earnedIds->contains($achievement->id)) continue;

            $earned = match($achievement->condition_type) {
                'score' => $user->totalScore() >= $achievement->condition_value,
                'wins'  => $user->totalWins() >= $achievement->condition_value,
                'plays' => $user->gamesPlayed() >= $achievement->condition_value,
                default => false,
            };

            if ($earned) {
                UserAchievement::create([
                    'user_id'        => $user->id,
                    'achievement_id' => $achievement->id,
                    'earned_at'      => now(),
                ]);
            }
        }
    }
}