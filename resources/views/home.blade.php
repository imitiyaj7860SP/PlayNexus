@extends('layouts.app')
@section('title', 'Home')
@section('content')

{{-- Hero --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-purple-950/20 to-gray-950"></div>
    <div class="absolute top-20 left-10 w-80 h-80 bg-purple-600/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-cyan-600/8 rounded-full blur-3xl animate-pulse" style="animation-delay:2s"></div>

    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-purple-900/30 border border-purple-500/30 text-purple-300 text-xs px-5 py-2 rounded-full mb-8">
            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
            5 Games Live · Leaderboards · Achievements
        </div>

        <h1 class="font-gaming text-6xl md:text-8xl font-black mb-6 leading-none">
            <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">PLAY</span><br>
            <span class="text-white text-5xl md:text-7xl">NEXUS</span>
        </h1>

        <p class="text-gray-300 text-lg md:text-xl mb-12 max-w-2xl mx-auto">
            Play browser games, climb the leaderboard, and earn achievements. No downloads required.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            @guest
                <a href="{{ route('register') }}" class="bg-gradient-to-r from-purple-600 to-cyan-500 hover:from-purple-500 hover:to-cyan-400 text-white px-10 py-4 rounded-2xl font-black text-base transition-all shadow-2xl shadow-purple-500/30 hover:-translate-y-1">
                    🎮 Start Playing Free
                </a>
                <a href="{{ route('games.index') }}" class="border border-purple-500/40 hover:border-purple-400 text-gray-300 hover:text-white px-10 py-4 rounded-2xl font-semibold transition-all hover:bg-purple-900/20">
                    Browse Games →
                </a>
            @endguest
            @auth
                <a href="{{ route('games.index') }}" class="bg-gradient-to-r from-purple-600 to-cyan-500 text-white px-10 py-4 rounded-2xl font-black text-base transition-all shadow-2xl shadow-purple-500/30 hover:-translate-y-1">
                    🎮 Play Now
                </a>
                <a href="{{ route('dashboard') }}" class="border border-purple-500/40 text-gray-300 hover:text-white px-10 py-4 rounded-2xl font-semibold transition-all hover:bg-purple-900/20">
                    Dashboard →
                </a>
            @endauth
        </div>
    </div>
</section>

{{-- Games Grid --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-14">
        <h2 class="font-gaming text-3xl font-black text-white mb-3">FEATURED <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">GAMES</span></h2>
        <p class="text-gray-400">Click any game to start playing instantly</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($games as $game)
            @include('partials.game-card', ['game' => $game])
        @endforeach
    </div>
</section>

@endsection