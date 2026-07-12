@extends('layouts.auth')
@section('title', 'Reset Password')

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

        <h2 class="font-gaming text-xl font-black text-white mb-1">RESET PASSWORD</h2>
        <p class="text-gray-400 text-sm mb-8">Create a strong new password for your account</p>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- Email --}}
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <input type="email" name="email" value="{{ old('email', $request->email) }}" required
                           class="glow-input w-full bg-gray-800/60 border border-gray-700/50 text-gray-100 rounded-xl pl-11 pr-4 py-3.5 text-sm focus:border-purple-500 outline-none transition-all duration-300">
                </div>
                @error('email')
                    <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- New Password --}}
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">New Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <input type="password" name="password" id="rp-password" required
                           placeholder="New password"
                           class="glow-input w-full bg-gray-800/60 border border-gray-700/50 text-gray-100 placeholder-gray-600 rounded-xl pl-11 pr-12 py-3.5 text-sm focus:border-purple-500 outline-none transition-all duration-300">
                    <button type="button" onclick="togglePassword('rp-password','eye-rp')"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-purple-400 transition-colors">
                        <svg id="eye-rp" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Confirm Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <input type="password" name="password_confirmation" required
                           placeholder="Confirm new password"
                           class="glow-input w-full bg-gray-800/60 border border-gray-700/50 text-gray-100 placeholder-gray-600 rounded-xl pl-11 pr-4 py-3.5 text-sm focus:border-purple-500 outline-none transition-all duration-300">
                </div>
            </div>

            <button type="submit"
                    class="btn-shimmer w-full bg-gradient-to-r from-purple-600 to-cyan-500 hover:from-purple-500 hover:to-cyan-400 text-white py-4 rounded-xl font-gaming font-bold text-sm tracking-wider transition-all duration-300 shadow-xl shadow-purple-500/25 hover:shadow-purple-500/50 hover:-translate-y-0.5">
                RESET PASSWORD →
            </button>
        </form>
    </div>
</div>

<script>
function togglePassword(fieldId, iconId) {
    const field = document.getElementById(fieldId);
    const icon  = document.getElementById(iconId);
    if (field.type === 'password') {
        field.type = 'text';
        icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`;
    } else {
        field.type = 'password';
        icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
    }
}
</script>
@endsection