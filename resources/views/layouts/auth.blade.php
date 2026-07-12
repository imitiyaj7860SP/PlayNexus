<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>PlayNexus — @yield('title', 'Authentication')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Figtree:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .font-gaming { font-family: 'Orbitron', monospace; }

        /* Animated gradient background */
        .auth-bg {
            background: radial-gradient(ellipse at 20% 50%, #3b0764 0%, transparent 50%),
                        radial-gradient(ellipse at 80% 20%, #0c4a6e 0%, transparent 50%),
                        radial-gradient(ellipse at 50% 80%, #1e1b4b 0%, transparent 50%),
                        #030712;
        }

        /* Floating particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            animation: float linear infinite;
            pointer-events: none;
        }
        @keyframes float {
            0%   { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10%  { opacity: 1; }
            90%  { opacity: 1; }
            100% { transform: translateY(-100px) rotate(720deg); opacity: 0; }
        }

        /* Glow input effect */
        .glow-input:focus {
            box-shadow: 0 0 0 1px #7c3aed, 0 0 20px #7c3aed30;
        }

        /* Glassmorphism card */
        .glass-card {
            background: rgba(17, 24, 39, 0.80);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(124, 58, 237, 0.15);
        }

        /* Animated button shimmer */
        .btn-shimmer {
            position: relative;
            overflow: hidden;
        }
        .btn-shimmer::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -75%;
            width: 50%;
            height: 200%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transform: skewX(-20deg);
            animation: shimmer 3s infinite;
        }
        @keyframes shimmer {
            0%   { left: -75%; }
            100% { left: 150%; }
        }

        /* Neon glow text */
        .neon-text {
            text-shadow: 0 0 20px rgba(167, 139, 250, 0.5),
                         0 0 40px rgba(167, 139, 250, 0.3);
        }
    </style>
</head>
<body class="auth-bg min-h-screen flex items-center justify-center relative overflow-hidden">

    {{-- Animated Particles --}}
    <div id="particles-container" class="absolute inset-0 overflow-hidden pointer-events-none"></div>

    {{-- Grid overlay --}}
    <div class="absolute inset-0 opacity-5"
         style="background-image: linear-gradient(rgba(124,58,237,0.5) 1px, transparent 1px), linear-gradient(90deg, rgba(124,58,237,0.5) 1px, transparent 1px); background-size: 50px 50px;">
    </div>

    {{-- Glow orbs --}}
    <div class="absolute top-1/4 -left-32 w-96 h-96 bg-purple-700/20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-cyan-700/15 rounded-full blur-3xl animate-pulse" style="animation-delay:2s"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-purple-900/10 rounded-full blur-3xl"></div>

    {{-- Main Content --}}
    <div class="relative z-10 w-full flex items-center justify-center px-4 py-10">
        @yield('content')
    </div>

    <script>
        // Generate floating particles
        const container = document.getElementById('particles-container');
        const colors = ['#7c3aed', '#06b6d4', '#ec4899', '#8b5cf6', '#0ea5e9'];
        for (let i = 0; i < 25; i++) {
            const p = document.createElement('div');
            const size = Math.random() * 4 + 1;
            p.className = 'particle';
            p.style.cssText = `
                left: ${Math.random() * 100}%;
                width: ${size}px;
                height: ${size}px;
                background: ${colors[Math.floor(Math.random() * colors.length)]};
                animation-duration: ${Math.random() * 15 + 10}s;
                animation-delay: ${Math.random() * 10}s;
                opacity: 0;
            `;
            container.appendChild(p);
        }
    </script>
</body>
</html>