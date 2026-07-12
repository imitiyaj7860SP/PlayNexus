<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PlayNexus — @yield('title', 'Gaming Platform')</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Figtree:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen antialiased">

    {{-- NAVBAR --}}
    <nav class="sticky top-0 z-50 bg-gray-900/80 backdrop-blur-xl border-b border-purple-900/30 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-cyan-400 rounded-lg flex items-center justify-center shadow-lg shadow-purple-500/30 group-hover:shadow-purple-500/60 transition-all">
                        <span class="text-white font-black text-sm font-gaming">P</span>
                    </div>
                    <span class="font-gaming text-lg font-black">
                        <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">PLAY</span><span class="text-white">NEXUS</span>
                    </span>
                </a>

                {{-- Desktop Links --}}
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-gray-300 hover:text-purple-400 text-sm font-medium transition-colors">Home</a>
                    <a href="{{ route('games.index') }}" class="text-gray-300 hover:text-purple-400 text-sm font-medium transition-colors">Games</a>
                    <a href="{{ route('leaderboard') }}" class="text-gray-300 hover:text-purple-400 text-sm font-medium transition-colors">Leaderboard</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-purple-400 text-sm font-medium transition-colors">Dashboard</a>
                    @endauth
                </div>

                {{-- Right Side --}}
                <div class="hidden md:flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white text-sm font-medium transition-colors px-4 py-2">Login</a>
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-purple-600 to-cyan-500 hover:from-purple-500 hover:to-cyan-400 text-white px-5 py-2 rounded-xl text-sm font-bold transition-all shadow-lg shadow-purple-500/20 hover:shadow-purple-500/40">
                            Register
                        </a>
                    @endguest
                    @auth
                        <div class="relative group">
                            <button class="flex items-center gap-2 text-gray-300 hover:text-white transition-colors">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-500 to-cyan-400 flex items-center justify-center text-xs font-black">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-gray-900 border border-purple-900/40 rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 overflow-hidden">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm text-gray-300 hover:text-white hover:bg-purple-900/30 transition-colors">Dashboard</a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-gray-300 hover:text-white hover:bg-purple-900/30 transition-colors">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="w-full text-left px-4 py-3 text-sm text-red-400 hover:bg-red-900/20 transition-colors">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>

                {{-- Mobile menu button --}}
                <button id="mobile-btn" class="md:hidden text-gray-300 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-1 border-t border-gray-800/50 pt-3">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-300 hover:text-purple-400 rounded-lg hover:bg-purple-900/20 transition-colors text-sm">Home</a>
                <a href="{{ route('games.index') }}" class="block px-3 py-2 text-gray-300 hover:text-purple-400 rounded-lg hover:bg-purple-900/20 transition-colors text-sm">Games</a>
                <a href="{{ route('leaderboard') }}" class="block px-3 py-2 text-gray-300 hover:text-purple-400 rounded-lg hover:bg-purple-900/20 transition-colors text-sm">Leaderboard</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-300 hover:text-purple-400 rounded-lg hover:bg-purple-900/20 transition-colors text-sm">Dashboard</a>
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-gray-300 hover:text-purple-400 rounded-lg hover:bg-purple-900/20 transition-colors text-sm">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="w-full text-left px-3 py-2 text-red-400 text-sm">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-300 text-sm">Login</a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 text-white bg-gradient-to-r from-purple-600 to-cyan-500 rounded-xl text-center text-sm font-bold">Register</a>
                @endguest
            </div>
        </div>
    </nav>

    {{-- Flash Alerts --}}
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-4 pt-4">
        <div class="bg-green-900/40 border border-green-500/30 text-green-300 px-5 py-3 rounded-xl flex items-center justify-between">
            <span class="text-sm">✅ {{ session('success') }}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="text-green-400 hover:text-green-200 ml-4">✕</button>
        </div>
    </div>
    @endif

    {{-- Main Content --}}
    <main>@yield('content')</main>

    {{-- Footer --}}
    <footer class="border-t border-purple-900/20 mt-20 py-10 text-center">
        <span class="font-gaming text-lg font-black bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">PLAYNEXUS</span>
        <p class="text-gray-600 text-sm mt-2">© {{ date('Y') }} PlayNexus. Play hard. Score big.</p>
    </footer>

    <script>
        document.getElementById('mobile-btn')?.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>