<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title','slug','description','instructions',
        'thumbnail','category','difficulty',
        'color_from','color_to','play_count','is_active'
    ];

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function topScores()
    {
        return $this->hasMany(Score::class)->orderByDesc('score')->take(10);
    }

    public function incrementPlays(): void
    {
        $this->increment('play_count');
    }
}