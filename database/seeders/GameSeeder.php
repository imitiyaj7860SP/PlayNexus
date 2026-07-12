<?php
namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $games = [
            [
                'title'        => 'Tic Tac Toe',
                'slug'         => 'tic-tac-toe',
                'description'  => 'Classic 2-player strategy game. Get 3 in a row to win!',
                'instructions' => 'Click any cell to place your mark. Get 3 in a row horizontally, vertically, or diagonally to win.',
                'thumbnail'    => '⭕',
                'category'     => 'Strategy',
                'difficulty'   => 'Easy',
                'color_from'   => '#7c3aed',
                'color_to'     => '#06b6d4',
            ],
            [
                'title'        => 'Snake Game',
                'slug'         => 'snake',
                'description'  => 'Guide the snake to eat food and grow. Don\'t hit the walls!',
                'instructions' => 'Use arrow keys or WASD to move. Eat the red food to grow. Avoid walls and yourself.',
                'thumbnail'    => '🐍',
                'category'     => 'Arcade',
                'difficulty'   => 'Medium',
                'color_from'   => '#059669',
                'color_to'     => '#0d9488',
            ],
            [
                'title'        => 'Memory Cards',
                'slug'         => 'memory-cards',
                'description'  => 'Flip cards and match pairs. Test your memory!',
                'instructions' => 'Click cards to flip them. Match all pairs in the fewest moves possible.',
                'thumbnail'    => '🃏',
                'category'     => 'Puzzle',
                'difficulty'   => 'Medium',
                'color_from'   => '#db2777',
                'color_to'     => '#9333ea',
            ],
            [
                'title'        => 'Rock Paper Scissors',
                'slug'         => 'rock-paper-scissors',
                'description'  => 'Challenge the computer. Best of 5 wins!',
                'instructions' => 'Choose Rock, Paper, or Scissors. Rock beats Scissors, Scissors beats Paper, Paper beats Rock.',
                'thumbnail'    => '✊',
                'category'     => 'Strategy',
                'difficulty'   => 'Easy',
                'color_from'   => '#d97706',
                'color_to'     => '#dc2626',
            ],
            [
                'title'        => 'Flappy Bird',
                'slug'         => 'flappy-bird',
                'description'  => 'Tap to fly through pipes. How far can you go?',
                'instructions' => 'Press SPACE or tap to flap. Avoid the pipes and ground. Each pipe passed = 1 point.',
                'thumbnail'    => '🐦',
                'category'     => 'Arcade',
                'difficulty'   => 'Hard',
                'color_from'   => '#2563eb',
                'color_to'     => '#7c3aed',
            ],
            [
    'title'        => 'Quiz Challenge',
    'slug'         => 'quiz-challenge',
    'description'  => 'Test your knowledge across Science, History, Sports, and more. Answer fast and score big!',
    'instructions' => 'Choose a subject, then answer 10 questions. Each correct answer earns points. Faster answers earn bonus points!',
    'thumbnail'    => '🧠',
    'category'     => 'Quiz',
    'difficulty'   => 'Medium',
    'color_from'   => '#0ea5e9',
    'color_to'     => '#6366f1',
],
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}