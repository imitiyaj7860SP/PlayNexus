@extends('layouts.app')
@section('title', 'All Games')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-14">
        <h1 class="font-gaming text-4xl font-black text-white mb-3">ALL <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">GAMES</span></h1>
        <p class="text-gray-400">Choose your game and start playing instantly</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($games as $game)
            @include('partials.game-card', ['game' => $game])
        @endforeach
    </div>
</div>
@endsection