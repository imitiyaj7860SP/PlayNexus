<?php
namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $achievements = [
            [
                'title'           => 'First Win',
                'description'     => 'Win your first game',
                'icon'            => '🏆',
                'condition_type'  => 'wins',
                'condition_value' => 1,
                'color'           => '#f59e0b',
            ],
            [
                'title'           => 'Century',
                'description'     => 'Score 100 total points',
                'icon'            => '💯',
                'condition_type'  => 'score',
                'condition_value' => 100,
                'color'           => '#8b5cf6',
            ],
            [
                'title'           => 'Dedicated Player',
                'description'     => 'Play 10 games',
                'icon'            => '🎮',
                'condition_type'  => 'plays',
                'condition_value' => 10,
                'color'           => '#06b6d4',
            ],
            [
                'title'           => 'High Scorer',
                'description'     => 'Score 500 total points',
                'icon'            => '⭐',
                'condition_type'  => 'score',
                'condition_value' => 500,
                'color'           => '#f97316',
            ],
            [
                'title'           => 'Veteran',
                'description'     => 'Win 10 games',
                'icon'            => '🎖️',
                'condition_type'  => 'wins',
                'condition_value' => 10,
                'color'           => '#10b981',
            ],
        ];

        foreach ($achievements as $a) {
            Achievement::create($a);
        }
    }
}