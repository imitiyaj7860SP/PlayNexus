@extends('layouts.auth')
@section('title', 'Forgot Password')

@section('content')
<div class="w-full max-w-md">

    {{-- Logo --}}
    <div class="text-center mb-8">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group">
            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-cyan-400 rounded-2xl flex items-center justify-center shadow-2xl shadow-purple-500/40 group-hover:scale-110 transition-all duration-300">
                <span class="font-gaming text-white font-black text-lg">P</span>
            </div>
            <span class="font-gaming text-2xl font-black neon-text">
                <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">PLAY</span><span class="text-white">NEXUS</span>
            </span>
        </a>
    </div>

    <div class="glass-card rounded-3xl p-8 shadow-2xl shadow-purple-950/50">

        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-purple-900/50 border border-purple-700/40 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                </svg>
            </div>
            <h2 class="font-gaming text-xl font-black text-white mb-2">FORGOT PASSWORD?</h2>
            <p class="text-gray-400 text-sm leading-relaxed">No worries! Enter your email and we'll send you a reset link.</p>
        </div>

        @if (session('status'))
            <div class="bg-green-900/40 border border-green-500/30 text-green-300 px-4 py-4 rounded-xl text-sm mb-6 flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="Enter your email address"
                           class="glow-input w-full bg-gray-800/60 border border-gray-700/50 text-gray-100 placeholder-gray-600 rounded-xl pl-11 pr-4 py-3.5 text-sm focus:border-purple-500 outline-none transition-all duration-300">
                </div>
                @error('email')
                    <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="btn-shimmer w-full bg-gradient-to-r from-purple-600 to-cyan-500 hover:from-purple-500 hover:to-cyan-400 text-white py-4 rounded-xl font-gaming font-bold text-sm tracking-wider transition-all duration-300 shadow-xl shadow-purple-500/25 hover:shadow-purple-500/50 hover:-translate-y-0.5">
                SEND RESET LINK →
            </button>
        </form>

        <p class="text-center text-gray-500 text-sm mt-8">
            Remember your password?
            <a href="{{ route('login') }}" class="text-purple-400 hover:text-purple-300 font-semibold transition-colors ml-1">Back to Login →</a>
        </p>
    </div>
</div>
@endsection