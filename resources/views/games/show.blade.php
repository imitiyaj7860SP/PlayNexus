@extends('layouts.app')
@section('title', 'Playing ' . $game->title)
@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">

    {{-- Back + Title --}}
    <div class="flex items-center justify-between mb-6 flex-wrap gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('games.index') }}" class="text-gray-400 hover:text-purple-400 text-sm transition-colors flex items-center gap-1 group">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Games
            </a>
            <span class="text-gray-700">/</span>
            <span class="text-2xl">{{ $game->thumbnail }}</span>
            <h1 class="font-gaming text-xl font-black text-white">{{ $game->title }}</h1>
        </div>
        <div class="flex gap-2">
            <span class="text-xs bg-gray-800 text-gray-400 px-3 py-1.5 rounded-full">{{ $game->category }}</span>
            <span class="text-xs bg-gray-800 text-gray-400 px-3 py-1.5 rounded-full">{{ $game->difficulty }}</span>
            <span class="text-xs bg-purple-900/40 border border-purple-800/40 text-purple-300 px-3 py-1.5 rounded-full">
                🎮 {{ number_format($game->play_count) }} plays
            </span>
        </div>
    </div>

    {{-- Game Window --}}
    <div class="bg-gray-900/80 border border-gray-800/60 rounded-3xl overflow-hidden shadow-2xl"
         style="border-color: {{ $game->color_from }}25">
        {{-- Window bar --}}
        <div class="flex items-center justify-between px-6 py-3 border-b border-gray-800/60"
             style="background: linear-gradient(135deg, {{ $game->color_from }}12, transparent)">
            <div class="flex gap-2">
                <div class="w-3 h-3 rounded-full bg-red-500/60"></div>
                <div class="w-3 h-3 rounded-full bg-yellow-500/60"></div>
                <div class="w-3 h-3 rounded-full bg-green-500/60"></div>
            </div>
            <span class="font-gaming text-xs text-gray-500 tracking-widest">{{ strtoupper($game->title) }}</span>
            <div class="w-16"></div>
        </div>

        {{-- Game content --}}
        <div class="p-4 md:p-8 flex items-center justify-center min-h-[500px] bg-gray-950/60">
            @include('games.engines.' . $game->slug)
        </div>
    </div>

    {{-- Info + Leaderboard Row --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        {{-- Instructions --}}
        <div class="bg-gray-900/40 border border-gray-800/40 rounded-2xl p-6">
            <h3 class="font-gaming text-sm font-bold text-white mb-3">📋 How to Play</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ $game->instructions }}</p>
        </div>

        {{-- Top Scores --}}
        <div class="bg-gray-900/40 border border-gray-800/40 rounded-2xl p-6">
            <h3 class="font-gaming text-sm font-bold text-white mb-4">🏆 Top Scores</h3>
            @if($topScores->count())
                <div class="space-y-2">
                    @foreach($topScores as $i => $score)
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-3">
                            <span class="font-gaming text-xs w-5 text-center {{ $i === 0 ? 'text-yellow-400' : ($i === 1 ? 'text-gray-300' : ($i === 2 ? 'text-amber-600' : 'text-gray-600')) }}">
                                {{ $i + 1 }}
                            </span>
                            <span class="text-gray-300">{{ $score->user->name }}</span>
                        </div>
                        <span class="font-gaming text-xs text-purple-300">{{ number_format($score->score) }} pts</span>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-xs">No scores yet. Be the first!</p>
            @endif
        </div>
    </div>
</div>
@endsection