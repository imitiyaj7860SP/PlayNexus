@extends('layouts.auth')
@section('title', 'Login')

@section('content')
<style>
@keyframes aurora  { 0%,100%{transform:translate(-20%,-20%) scale(1.2)} 50%{transform:translate(20%,10%) scale(1.4)} }
@keyframes aurora2 { 0%,100%{transform:translate(20%,20%) scale(1.3)} 50%{transform:translate(-20%,-10%) scale(1.1)} }
@keyframes floatUp { 0%,100%{transform:translateY(0px)} 50%{transform:translateY(-10px)} }
@keyframes spinSlow { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }
@keyframes spinRev  { from{transform:rotate(360deg)} to{transform:rotate(0deg)} }
@keyframes shimmer  { 0%{left:-75%} 100%{left:150%} }
@keyframes borderPulse {
    0%,100%{border-color:rgba(124,58,237,0.35);box-shadow:0 0 20px rgba(124,58,237,0.1)}
    50%    {border-color:rgba(6,182,212,0.35); box-shadow:0 0 30px rgba(6,182,212,0.15)}
}
@keyframes scanMove { 0%{top:-2px} 100%{top:100%} }

.aurora-1   { animation: aurora   20s ease-in-out infinite; }
.aurora-2   { animation: aurora2  25s ease-in-out infinite; }
.float-a    { animation: floatUp  5s ease-in-out infinite; }
.float-a2   { animation: floatUp  7s ease-in-out infinite; animation-delay:1s; }
.float-a3   { animation: floatUp  6s ease-in-out infinite; animation-delay:2s; }
.spin-cw    { animation: spinSlow 18s linear infinite; }
.spin-ccw   { animation: spinRev  12s linear infinite; }

.glass-form {
    background: linear-gradient(135deg,rgba(17,24,39,0.92),rgba(30,27,75,0.88));
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
    box-shadow: 0 0 0 3px rgba(124,58,237,0.12),0 0 20px rgba(124,58,237,0.15);
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
.btn-nexus:hover { transform:translateY(-2px); box-shadow:0 16px 40px rgba(109,40,217,0.45); }
.btn-nexus:active { transform:translateY(0) scale(0.98); }

.social-btn {
    background: rgba(15,23,42,0.6);
    border: 1px solid rgba(124,58,237,0.15);
    transition: all 0.25s ease;
}
.social-btn:hover {
    background: rgba(124,58,237,0.12);
    border-color: rgba(124,58,237,0.4);
    transform: translateY(-2px);
}
.stat-card {
    background: rgba(15,23,42,0.75);
    border: 1px solid rgba(124,58,237,0.18);
    backdrop-filter: blur(16px);
    transition: all 0.3s ease;
}
.stat-card:hover { border-color:rgba(124,58,237,0.45); }
.game-pill {
    background: rgba(124,58,237,0.08);
    border: 1px solid rgba(124,58,237,0.18);
}
.reg-btn {
    border: 1px solid rgba(124,58,237,0.35);
    transition: all 0.3s ease;
}
.reg-btn:hover {
    background: rgba(124,58,237,0.15);
    border-color: rgba(124,58,237,0.6);
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(124,58,237,0.2);
}
</style>

<div class="w-full h-screen flex overflow-hidden">

    {{-- ══ LEFT — LOGIN FORM ══ --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6 relative z-10 overflow-y-auto py-4">

        <div class="aurora-1 absolute w-[500px] h-[500px] rounded-full pointer-events-none"
             style="background:radial-gradient(circle,rgba(109,40,217,0.18) 0%,transparent 70%);top:-10%;left:-20%"></div>

        <div class="w-full max-w-[400px]">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 group mb-5">
                <div class="relative shrink-0">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-cyan-400 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/30 group-hover:scale-110 transition-transform">
                        <span class="font-gaming text-white font-black text-sm">P</span>
                    </div>
                    <div class="absolute inset-0 rounded-xl bg-purple-500/20 animate-ping"></div>
                </div>
                <div>
                    <div class="font-gaming text-lg font-black leading-none">
                        <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">PLAY</span><span class="text-white">NEXUS</span>
                    </div>
                    <div class="text-gray-500 text-xs tracking-widest uppercase">Gaming Platform</div>
                </div>
            </a>

            {{-- Heading --}}
            <div class="mb-4">
                <h1 class="font-gaming text-3xl font-black text-white leading-tight mb-1">
                    SIGN <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">IN</span>
                </h1>
                <div class="flex items-center gap-2 text-xs text-gray-500">
                    <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse shrink-0"></span>
                    Server online · 2,847 players active
                </div>
            </div>

            {{-- Form Card --}}
            <div class="glass-form rounded-2xl p-5">

                @if(session('status'))
                    <div class="bg-green-900/40 border border-green-500/30 text-green-300 text-xs px-3 py-2 rounded-xl mb-4 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-3.5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                   placeholder="player@playnexus.com"
                                   class="prem-input w-full rounded-xl pl-10 pr-4 py-2.5 text-sm">
                        </div>
                        @error('email')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-widest">Password</label>
                            @if(Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs text-purple-400 hover:text-cyan-400 transition-colors">Forgot?</a>
                            @endif
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input type="password" name="password" id="lp" required
                                   placeholder="••••••••••••"
                                   class="prem-input w-full rounded-xl pl-10 pr-10 py-2.5 text-sm">
                            <button type="button" onclick="togglePwd('lp','eye-lp')"
                                    class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-600 hover:text-purple-400 transition-colors">
                                <svg id="eye-lp" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember --}}
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember"
                                   class="w-3.5 h-3.5 rounded border-gray-600 bg-gray-800/60 text-purple-500 focus:ring-purple-500 focus:ring-offset-0">
                            <span class="text-xs text-gray-400">Remember me</span>
                        </label>
                        <div class="flex items-center gap-1.5 text-xs text-gray-600">
                            <span class="w-1.5 h-1.5 bg-green-400 rounded-full"></span>
                            Secure
                        </div>
                    </div>

                    {{-- Login CTA --}}
                    <button type="submit"
                            class="btn-nexus w-full text-white py-3 rounded-xl font-gaming font-bold text-sm tracking-widest">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            ENTER THE NEXUS
                        </span>
                    </button>

                    {{-- Divider --}}
                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-700/60 to-transparent"></div>
                        <span class="text-gray-600 text-xs">OR</span>
                        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-700/60 to-transparent"></div>
                    </div>

                    {{-- Social --}}
                    <div class="grid grid-cols-3 gap-2">
                        @foreach([
                            ['Google',  '#4285F4','M21.35 11.1h-9.17v2.73h6.51c-.33 3.81-3.5 5.44-6.5 5.44C8.36 19.27 5 16.25 5 12c0-4.1 3.2-7.27 7.2-7.27 3.09 0 4.9 1.97 4.9 1.97L19 4.72S16.56 2 12.1 2C6.42 2 2.03 6.8 2.03 12c0 5.05 4.13 10 10.22 10 5.35 0 9.25-3.67 9.25-9.09 0-1.15-.15-1.81-.15-1.81z'],
                            ['Discord', '#5865F2','M20.317 4.37a19.791 19.791 0 00-4.885-1.515.074.074 0 00-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 00-5.487 0 12.64 12.64 0 00-.617-1.25.077.077 0 00-.079-.037A19.736 19.736 0 003.677 4.37a.07.07 0 00-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 00.031.057 19.9 19.9 0 005.993 3.03.078.078 0 00.084-.028 14.09 14.09 0 001.226-1.994.076.076 0 00-.041-.106 13.107 13.107 0 01-1.872-.892.077.077 0 01-.008-.128 10.2 10.2 0 00.372-.292.074.074 0 01.077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 01.078.01c.12.098.246.198.373.292a.077.077 0 01-.006.127 12.299 12.299 0 01-1.873.892.077.077 0 00-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 00.084.028 19.839 19.839 0 006.002-3.03.077.077 0 00.032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 00-.031-.03z'],
                            ['GitHub',  '#ffffff', 'M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844a9.59 9.59 0 012.504.337c1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z'],
                        ] as [$name,$color,$path])
                        <button type="button" class="social-btn flex items-center justify-center gap-1.5 py-2 rounded-xl">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="{{ $color }}"><path d="{{ $path }}"/></svg>
                            <span class="text-xs text-gray-400 hidden sm:block">{{ $name }}</span>
                        </button>
                        @endforeach
                    </div>
                </form>
            </div>

            {{-- Register Button --}}
            <div class="mt-3 space-y-2.5">
                <div class="flex items-center gap-3">
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-700/50 to-transparent"></div>
                    <span class="text-gray-600 text-xs">New here?</span>
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-700/50 to-transparent"></div>
                </div>
                <a href="{{ route('register') }}"
                   class="reg-btn flex items-center justify-center gap-2 w-full py-2.5 rounded-xl
                          text-purple-400 font-gaming font-bold text-xs tracking-wider">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    CREATE FREE ACCOUNT
                </a>
            </div>

        </div>
    </div>

    {{-- ══ RIGHT — VISUAL PANEL ══ --}}
    <div class="hidden lg:flex w-1/2 relative items-center justify-center overflow-hidden">

        <div class="aurora-1 absolute w-[700px] h-[700px] rounded-full pointer-events-none"
             style="background:radial-gradient(circle,rgba(109,40,217,0.25) 0%,transparent 65%);top:-15%;right:-15%"></div>
        <div class="aurora-2 absolute w-[600px] h-[600px] rounded-full pointer-events-none"
             style="background:radial-gradient(circle,rgba(6,182,212,0.15) 0%,transparent 65%);bottom:-15%;left:-10%"></div>
        <div class="absolute inset-0 opacity-[0.07]"
             style="background-image:radial-gradient(rgba(124,58,237,0.8) 1px,transparent 1px);background-size:28px 28px"></div>
        <div class="absolute inset-x-0 h-0.5 pointer-events-none"
             style="background:linear-gradient(90deg,transparent,rgba(6,182,212,0.35),transparent);animation:scanMove 6s linear infinite;top:0"></div>

        <div class="relative z-10 flex flex-col items-center text-center px-8 w-full max-w-lg">

            {{-- Sphere --}}
            <div class="relative mb-5" style="width:160px;height:160px">
                <div class="spin-cw absolute inset-0 rounded-full"
                     style="border:1px solid rgba(124,58,237,0.25);background:conic-gradient(from 0deg,transparent 75%,rgba(124,58,237,0.7) 100%)"></div>
                <div class="spin-ccw absolute rounded-full"
                     style="inset:16px;border:1px solid rgba(6,182,212,0.2);background:conic-gradient(from 180deg,transparent 75%,rgba(6,182,212,0.6) 100%)"></div>
                <div class="spin-cw absolute rounded-full"
                     style="inset:32px;border:1px solid rgba(236,72,153,0.15);animation-duration:25s"></div>
                <div class="absolute rounded-full"
                     style="inset:46px;background:radial-gradient(circle,rgba(124,58,237,0.5) 0%,rgba(6,182,212,0.25) 50%,transparent 100%);box-shadow:0 0 35px rgba(124,58,237,0.5)"></div>
                <div class="absolute inset-0 flex items-center justify-center float-a">
                    <span class="font-gaming text-3xl font-black bg-gradient-to-br from-purple-300 to-cyan-300 bg-clip-text text-transparent"
                          style="filter:drop-shadow(0 0 14px rgba(124,58,237,0.9))">P</span>
                </div>
                <div style="position:absolute;inset:0;animation:spinSlow 12s linear infinite">
                    <div style="position:absolute;top:50%;left:0;width:6px;height:6px;margin-top:-3px;margin-left:-3px;background:#7c3aed;border-radius:50%;box-shadow:0 0 6px #7c3aed"></div>
                </div>
                <div style="position:absolute;inset:0;animation:spinRev 9s linear infinite">
                    <div style="position:absolute;top:0;left:50%;width:5px;height:5px;margin-left:-2.5px;margin-top:-2.5px;background:#06b6d4;border-radius:50%;box-shadow:0 0 5px #06b6d4"></div>
                </div>
            </div>

            {{-- Stat Cards --}}
            <div class="grid grid-cols-2 gap-3 w-full mb-4">
                <div class="stat-card float-a  rounded-xl p-3 text-left">
                    <div class="text-xs text-gray-500 mb-1">🏆 Top Score</div>
                    <div class="font-gaming text-lg font-black text-purple-300">48,290</div>
                    <div class="text-xs text-green-400">↑ +2,100 today</div>
                </div>
                <div class="stat-card float-a2 rounded-xl p-3 text-left">
                    <div class="text-xs text-gray-500 mb-1">🎮 Online Now</div>
                    <div class="font-gaming text-lg font-black text-cyan-300">2,847</div>
                    <div class="text-xs text-gray-500">players active</div>
                </div>
                <div class="stat-card float-a3 rounded-xl p-3 text-left">
                    <div class="text-xs text-gray-500 mb-1">⚡ Win Streak</div>
                    <div class="font-gaming text-lg font-black text-yellow-300">×12</div>
                    <div class="text-xs text-purple-400">Personal best!</div>
                </div>
                <div class="stat-card float-a  rounded-xl p-3 text-left" style="animation-delay:1.5s">
                    <div class="text-xs text-gray-500 mb-1">🎖️ Global Rank</div>
                    <div class="font-gaming text-lg font-black text-pink-300">#142</div>
                    <div class="text-xs text-gray-500">Top 5%</div>
                </div>
            </div>

            {{-- Tagline --}}
            <h2 class="font-gaming text-lg font-black text-white mb-1 leading-snug">
                YOUR GAMING
                <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">UNIVERSE AWAITS</span>
            </h2>
            <p class="text-gray-500 text-xs mb-3 max-w-xs">
                5 epic games · Real-time leaderboards · Global competition
            </p>

            {{-- Game pills --}}
            <div class="flex flex-wrap justify-center gap-1.5">
                @foreach(['⭕ Tic Tac Toe','🐍 Snake','🃏 Memory','✊ RPS','🐦 Flappy','🧠 Quiz'] as $g)
                    <span class="game-pill text-xs text-gray-400 px-2.5 py-1 rounded-full">{{ $g }}</span>
                @endforeach
            </div>
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