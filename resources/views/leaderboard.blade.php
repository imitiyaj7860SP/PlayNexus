@extends('layouts.app')
@section('title', 'Leaderboard')
@section('content')
<div class="max-w-5xl mx-auto px-4 py-16">

    <div class="text-center mb-14">
        <h1 class="font-gaming text-4xl font-black text-white mb-3">🏆 LEADERBOARD</h1>
        <p class="text-gray-400">Top players across all games</p>
    </div>

    {{-- Top Players --}}
    <div class="bg-gray-900/50 border border-gray-800/50 rounded-3xl p-6 mb-10">
        <h2 class="font-gaming text-sm font-black text-white mb-6 uppercase tracking-widest">Global Top Players</h2>
        @if($topPlayers->count())
        <div class="space-y-3">
            @foreach($topPlayers as $i => $player)
            <div class="flex items-center justify-between bg-gray-800/40 rounded-2xl px-5 py-4 hover:bg-gray-800/60 transition-colors {{ $i < 3 ? 'border border-gray-700/40' : '' }}">
                <div class="flex items-center gap-4">
                    <span class="font-gaming text-lg w-8 text-center {{ $i === 0 ? 'text-yellow-400' : ($i === 1 ? 'text-gray-300' : ($i === 2 ? 'text-amber-600' : 'text-gray-600')) }}">
                        {{ $i === 0 ? '🥇' : ($i === 1 ? '🥈' : ($i === 2 ? '🥉' : $i + 1)) }}
                    </span>
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-purple-500 to-cyan-400 flex items-center justify-center text-sm font-black">
                        {{ strtoupper(substr($player->name, 0, 1)) }}
                    </div>
                    <span class="font-medium text-gray-200">{{ $player->name }}</span>
                </div>
                <span class="font-gaming text-sm text-purple-300 font-bold">{{ number_format($player->scores_sum_score ?? 0) }} pts</span>
            </div>
            @endforeach
        </div>
        @else
            <p class="text-gray-500 text-sm text-center py-6">No scores yet. Be the first to play!</p>
        @endif
    </div>

    {{-- Per Game Top Scores --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($games as $game)
        <div class="bg-gray-900/40 border border-gray-800/40 rounded-2xl p-5">
            <div class="flex items-center gap-3 mb-4">
                <span class="text-2xl">{{ $game->thumbnail }}</span>
                <h3 class="font-gaming text-sm font-bold text-white">{{ $game->title }}</h3>
            </div>
            @if($game->scores->count())
                <div class="space-y-2">
                    @foreach($game->scores as $j => $score)
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-gray-500 w-4">{{ $j + 1 }}</span>
                            <span class="text-gray-300">{{ $score->user->name }}</span>
                        </div>
                        <span class="font-gaming text-xs text-purple-300">{{ number_format($score->score) }}</span>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-xs">No scores yet</p>
            @endif
        </div>
        @endforeach
    </div>

</div>
@endsection