@extends('layouts.auth')
@section('title', 'Register')

@section('content')
<style>
@keyframes aurora  { 0%,100%{transform:translate(-20%,-20%) scale(1.2)} 50%{transform:translate(20%,10%) scale(1.4)} }
@keyframes aurora2 { 0%,100%{transform:translate(20%,20%) scale(1.3)} 50%{transform:translate(-20%,-10%) scale(1.1)} }
@keyframes floatUp { 0%,100%{transform:translateY(0px)} 50%{transform:translateY(-8px)} }
@keyframes spinSlow { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }
@keyframes spinRev  { from{transform:rotate(360deg)} to{transform:rotate(0deg)} }
@keyframes shimmer  { 0%{left:-75%} 100%{left:150%} }
@keyframes borderPulse {
    0%,100%{border-color:rgba(124,58,237,0.3)}
    50%    {border-color:rgba(6,182,212,0.3)}
}
@keyframes scanMove { 0%{top:-2px} 100%{top:100%} }

.aurora-1 { animation: aurora  20s ease-in-out infinite; }
.aurora-2 { animation: aurora2 25s ease-in-out infinite; }
.float-1  { animation: floatUp 5s ease-in-out infinite; }
.float-2  { animation: floatUp 7s ease-in-out infinite; animation-delay:.8s; }
.float-3  { animation: floatUp 6s ease-in-out infinite; animation-delay:1.6s; }
.spin-cw  { animation: spinSlow 18s linear infinite; }
.spin-ccw { animation: spinRev  12s linear infinite; }

.glass-form {
    background: linear-gradient(135deg,rgba(17,24,39,0.93),rgba(30,27,75,0.88));
    backdrop-filter: blur(32px);
    border: 1px solid rgba(124,58,237,0.22);
    box-shadow: 0 0 0 1px rgba(255,255,255,0.03) inset, 0 30px 60px rgba(0,0,0,0.5);
    animation: borderPulse 5s ease-in-out infinite;
}
.prem-input {
    background: rgba(9,14,28,0.7);
    border: 1px solid rgba(124,58,237,0.18);
    color: #e2e8f0;
    transition: all 0.3s ease;
}
.prem-input::placeholder { color:#4b5563; }
.prem-input:focus {
    background: rgba(9,14,28,0.9);
    border-color: rgba(124,58,237,0.75);
    box-shadow: 0 0 0 3px rgba(124,58,237,0.12), 0 0 20px rgba(124,58,237,0.15);
    outline: none;
}
.btn-nexus {
    background: linear-gradient(135deg,#6d28d9,#4f46e5 50%,#0891b2);
    position:relative; overflow:hidden;
    transition: all 0.35s ease;
}
.btn-nexus::after {
    content:''; position:absolute;
    top:-50%; left:-75%; width:50%; height:200%;
    background:linear-gradient(90deg,transparent,rgba(255,255,255,0.18),transparent);
    transform:skewX(-20deg); animation:shimmer 3s infinite;
}
.btn-nexus:hover { transform:translateY(-2px); box-shadow:0 12px 30px rgba(109,40,217,0.4); }
.btn-nexus:active { transform:translateY(0) scale(0.98); }

.feat-card {
    background: rgba(15,23,42,0.75);
    border: 1px solid rgba(124,58,237,0.14);
    backdrop-filter: blur(16px);
    transition: all 0.3s ease;
}
.feat-card:hover { border-color:rgba(124,58,237,0.38); }

.game-pill {
    background: rgba(124,58,237,0.08);
    border: 1px solid rgba(124,58,237,0.16);
}
</style>

{{-- FULL VIEWPORT SPLIT --}}
<div class="w-full h-screen flex overflow-hidden">

    {{-- ══════════════════════════
         LEFT — VISUAL PANEL
    ══════════════════════════ --}}
    <div class="hidden lg:flex w-1/2 relative items-center justify-center overflow-hidden">

        <div class="aurora-1 absolute w-[600px] h-[600px] rounded-full pointer-events-none"
             style="background:radial-gradient(circle,rgba(109,40,217,0.22) 0%,transparent 65%);top:-20%;left:-20%"></div>
        <div class="aurora-2 absolute w-[500px] h-[500px] rounded-full pointer-events-none"
             style="background:radial-gradient(circle,rgba(6,182,212,0.12) 0%,transparent 65%);bottom:-20%;right:-10%"></div>

        <div class="absolute inset-0 opacity-[0.06]"
             style="background-image:radial-gradient(rgba(124,58,237,0.9) 1px,transparent 1px);background-size:28px 28px"></div>
        <div class="absolute inset-x-0 h-0.5 pointer-events-none"
             style="background:linear-gradient(90deg,transparent,rgba(6,182,212,0.3),transparent);animation:scanMove 7s linear infinite;top:0"></div>

        <div class="relative z-10 flex flex-col items-center text-center px-8 w-full max-w-md">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-5 group">
                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-cyan-400 rounded-lg flex items-center justify-center shadow-lg shadow-purple-500/30 group-hover:scale-110 transition-transform">
                    <span class="font-gaming text-white font-black text-xs">P</span>
                </div>
                <span class="font-gaming text-base font-black">
                    <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">PLAY</span><span class="text-white">NEXUS</span>
                </span>
            </a>

            {{-- Mini Sphere --}}
            <div class="relative mb-5" style="width:120px;height:120px">
                <div class="spin-cw absolute inset-0 rounded-full"
                     style="border:1px solid rgba(124,58,237,0.3);background:conic-gradient(from 0deg,transparent 75%,rgba(124,58,237,0.7) 100%)"></div>
                <div class="spin-ccw absolute rounded-full"
                     style="inset:14px;border:1px solid rgba(6,182,212,0.2);background:conic-gradient(from 180deg,transparent 75%,rgba(6,182,212,0.6) 100%)"></div>
                <div class="absolute rounded-full"
                     style="inset:28px;background:radial-gradient(circle,rgba(124,58,237,0.6) 0%,rgba(6,182,212,0.2) 60%,transparent 100%);box-shadow:0 0 30px rgba(124,58,237,0.6)"></div>
                <div class="absolute inset-0 flex items-center justify-center float-1">
                    <span class="font-gaming text-2xl font-black bg-gradient-to-br from-purple-300 to-cyan-300 bg-clip-text text-transparent"
                          style="filter:drop-shadow(0 0 10px rgba(124,58,237,0.9))">P</span>
                </div>
                <div style="position:absolute;inset:0;animation:spinSlow 10s linear infinite">
                    <div style="position:absolute;top:50%;left:-3px;width:6px;height:6px;margin-top:-3px;background:#7c3aed;border-radius:50%;box-shadow:0 0 6px #7c3aed"></div>
                </div>
                <div style="position:absolute;inset:0;animation:spinRev 7s linear infinite">
                    <div style="position:absolute;top:-3px;left:50%;width:4px;height:4px;margin-left:-2px;background:#06b6d4;border-radius:50%;box-shadow:0 0 5px #06b6d4"></div>
                </div>
            </div>

            {{-- Headline --}}
            <h2 class="font-gaming text-xl font-black text-white mb-1.5 leading-snug">
                JOIN THE <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">NEXUS</span>
            </h2>
            <p class="text-gray-500 text-xs mb-5 max-w-xs leading-relaxed">
                Create your account and compete with players worldwide.
            </p>

            {{-- Feature list — compact --}}
            <div class="w-full space-y-2 mb-5">
                @foreach([
                    ['🎮','Play 6 Browser Games',   'No downloads needed',       'text-purple-300'],
                    ['🏆','Global Leaderboards',    'Climb the rankings',         'text-cyan-300'],
                    ['🎖️','Earn Achievements',      'Unlock badges as you play',  'text-yellow-300'],
                    ['📊','Track Your Progress',    'Stats and personal bests',   'text-pink-300'],
                ] as [$icon,$title,$sub,$color])
                <div class="feat-card rounded-xl px-3 py-2.5 flex items-center gap-3 text-left">
                    <span class="text-base shrink-0">{{ $icon }}</span>
                    <div>
                        <div class="text-xs font-semibold {{ $color }}">{{ $title }}</div>
                        <div class="text-xs text-gray-600">{{ $sub }}</div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Game pills --}}
            <div class="flex flex-wrap justify-center gap-1">
                @foreach(['⭕ TTT','🐍 Snake','🃏 Cards','✊ RPS','🐦 Flappy','🧠 Quiz'] as $g)
                    <span class="game-pill text-xs text-gray-500 px-2 py-0.5 rounded-full">{{ $g }}</span>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ══════════════════════════
         RIGHT — REGISTER FORM
    ══════════════════════════ --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-6 relative z-10 overflow-y-auto">

        <div class="aurora-2 absolute w-[400px] h-[400px] rounded-full pointer-events-none"
             style="background:radial-gradient(circle,rgba(6,182,212,0.08) 0%,transparent 70%);top:-10%;right:-20%"></div>

        <div class="w-full max-w-[400px]">

            {{-- Mobile logo --}}
            <div class="flex lg:hidden justify-center mb-6">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
                    <div class="w-9 h-9 bg-gradient-to-br from-purple-500 to-cyan-400 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/30">
                        <span class="font-gaming text-white font-black text-sm">P</span>
                    </div>
                    <span class="font-gaming text-xl font-black">
                        <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">PLAY</span><span class="text-white">NEXUS</span>
                    </span>
                </a>
            </div>

            {{-- Heading --}}
            <div class="mb-5">
                <h1 class="font-gaming text-3xl font-black text-white leading-tight mb-1.5">
                    CREATE <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">ACCOUNT</span>
                </h1>
                <p class="text-gray-500 text-xs flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse shrink-0"></span>
                    Free forever · No credit card needed
                </p>
            </div>

            {{-- Form Card --}}
            <div class="glass-form rounded-2xl p-6">
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Full Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </span>
                            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                                   placeholder="Your gamer name"
                                   class="prem-input w-full rounded-xl pl-10 pr-4 py-2.5 text-sm">
                        </div>
                        @error('name')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Email Address</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   placeholder="player@playnexus.com"
                                   class="prem-input w-full rounded-xl pl-10 pr-4 py-2.5 text-sm">
                        </div>
                        @error('email')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password row --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-3.5 h-3.5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </span>
                                <input type="password" name="password" id="rp1" required
                                       placeholder="Min 8 chars"
                                       class="prem-input w-full rounded-xl pl-9 pr-8 py-2.5 text-sm">
                                <button type="button" onclick="togglePwd('rp1','e1')"
                                        class="absolute inset-y-0 right-0 pr-2 flex items-center text-gray-600 hover:text-purple-400 transition-colors">
                                    <svg id="e1" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Confirm</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-3.5 h-3.5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </span>
                                <input type="password" name="password_confirmation" id="rp2" required
                                       placeholder="Repeat"
                                       class="prem-input w-full rounded-xl pl-9 pr-8 py-2.5 text-sm">
                                <button type="button" onclick="togglePwd('rp2','e2')"
                                        class="absolute inset-y-0 right-0 pr-2 flex items-center text-gray-600 hover:text-purple-400 transition-colors">
                                    <svg id="e2" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Terms --}}
                    <div class="flex items-start gap-2.5">
                        <input type="checkbox" id="terms" required
                               class="w-4 h-4 mt-0.5 rounded border-gray-600 bg-gray-800/60 text-purple-500 focus:ring-purple-500 focus:ring-offset-0 shrink-0">
                        <label for="terms" class="text-xs text-gray-400 leading-relaxed">
                            I agree to the
                            <a href="#" class="text-purple-400 hover:text-cyan-400 transition-colors">Terms</a>
                            and
                            <a href="#" class="text-purple-400 hover:text-cyan-400 transition-colors">Privacy Policy</a>
                        </label>
                    </div>

                    {{-- CTA --}}
                    <button type="submit"
                            class="btn-nexus w-full text-white py-3 rounded-xl font-gaming font-bold text-sm tracking-widest">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            JOIN PLAYNEXUS
                        </span>
                    </button>
                </form>
            </div>

            {{-- Login link --}}
            <p class="text-center text-gray-600 text-sm mt-4">
                Already have an account?
                <a href="{{ route('login') }}" class="text-purple-400 hover:text-cyan-400 font-bold transition-colors ml-1">Sign In →</a>
            </p>
        </div>
    </div>
</div>

<script>
function togglePwd(f, i) {
    const field = document.getElementById(f);
    const icon  = document.getElementById(i);
    const hide  = field.type === 'password';
    field.type  = hide ? 'text' : 'password';
    icon.innerHTML = hide
        ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`
        : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
}
</script>
@endsection