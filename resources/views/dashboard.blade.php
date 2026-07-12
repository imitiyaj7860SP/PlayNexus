@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">

    <div class="mb-10">
        <h1 class="font-gaming text-3xl font-black text-white">MY <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">DASHBOARD</span></h1>
        <p class="text-gray-400 mt-1">Welcome back, {{ auth()->user()->name }} 👋</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-12">
        @foreach([
            ['Total Score', $totalScore, '⭐', 'from-purple-900/40 to-purple-950/60', 'border-purple-800/30', 'text-purple-400'],
            ['Games Played', $gamesPlayed, '🎮', 'from-cyan-900/40 to-cyan-950/60', 'border-cyan-800/30', 'text-cyan-400'],
            ['Total Wins', $totalWins, '🏆', 'from-yellow-900/40 to-yellow-950/60', 'border-yellow-800/30', 'text-yellow-400'],
            ['Achievements', $achievements->count(), '🎖️', 'from-pink-900/40 to-pink-950/60', 'border-pink-800/30', 'text-pink-400'],
        ] as [$label, $value, $icon, $gradient, $border, $color])
        <div class="bg-gradient-to-br {{ $gradient }} border {{ $border }} rounded-2xl p-5 hover:-translate-y-0.5 transition-all">
            <div class="text-2xl mb-2">{{ $icon }}</div>
            <div class="font-gaming text-3xl font-black text-white mb-1">{{ number_format($value) }}</div>
            <div class="text-xs text-gray-400">{{ $label }}</div>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Games --}}
        <div class="lg:col-span-2">
            <h2 class="font-gaming text-lg font-black text-white mb-5">PLAY A GAME</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($games as $game)
                <a href="{{ route('games.show', $game->slug) }}"
                   class="flex items-center gap-4 bg-gray-900/50 border border-gray-800/40 rounded-2xl p-4 hover:border-purple-500/40 hover:-translate-y-0.5 transition-all group">
                    <div class="text-3xl">{{ $game->thumbnail }}</div>
                    <div class="flex-1 min-w-0">
                        <div class="font-gaming text-sm font-bold text-white group-hover:text-purple-300 transition-colors">{{ $game->title }}</div>
                        <div class="text-xs text-gray-500">{{ $game->category }} · {{ $game->difficulty }}</div>
                    </div>
                    <svg class="w-4 h-4 text-gray-600 group-hover:text-purple-400 transition-colors shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                @endforeach
            </div>
        </div>

        {{-- Right Column --}}
        <div class="space-y-6">

            {{-- Recent Activity --}}
            <div class="bg-gray-900/40 border border-gray-800/40 rounded-2xl p-5">
                <h3 class="font-gaming text-sm font-bold text-white mb-4">RECENT ACTIVITY</h3>
                @if($recentActivity->count())
                    <div class="space-y-3">
                        @foreach($recentActivity as $act)
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center gap-2">
                                <span class="text-lg">{{ $act->game->thumbnail }}</span>
                                <div>
                                    <div class="text-xs text-gray-300">{{ $act->game->title }}</div>
                                    <div class="text-xs text-gray-500 capitalize">{{ $act->action }}</div>
                                </div>
                            </div>
                            @if($act->score > 0)
                            <span class="font-gaming text-xs text-purple-300">+{{ $act->score }}</span>
                            @endif
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-xs">No activity yet. Play a game!</p>
                @endif
            </div>

            {{-- Achievements --}}
            <div class="bg-gray-900/40 border border-gray-800/40 rounded-2xl p-5">
                <h3 class="font-gaming text-sm font-bold text-white mb-4">ACHIEVEMENTS</h3>
                @if($achievements->count())
                    <div class="flex flex-wrap gap-2">
                        @foreach($achievements as $achievement)
                        <div class="flex items-center gap-2 bg-gray-800/60 px-3 py-2 rounded-xl border border-gray-700/40" title="{{ $achievement->description }}">
                            <span class="text-lg">{{ $achievement->icon }}</span>
                            <span class="text-xs text-gray-300 font-medium">{{ $achievement->title }}</span>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-xs">Play games to earn achievements!</p>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection