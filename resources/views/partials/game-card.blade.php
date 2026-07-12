<div class="group relative bg-gray-900/60 border border-gray-800/50 rounded-3xl overflow-hidden
            hover:border-purple-500/40 transition-all duration-500 hover:-translate-y-2
            hover:shadow-2xl hover:shadow-purple-950/50 cursor-pointer"
     onclick="window.location='{{ route('games.show', $game->slug) }}'">

    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"
         style="background: radial-gradient(circle at 50% 0%, {{ $game->color_from }}18, transparent 70%)"></div>

    {{-- Header --}}
    <div class="relative h-40 flex items-center justify-center overflow-hidden"
         style="background: linear-gradient(135deg, {{ $game->color_from }}30, {{ $game->color_to }}20)">
        <div class="absolute -top-4 -right-4 w-20 h-20 rounded-full opacity-20" style="background:{{ $game->color_from }}"></div>
        <span class="text-6xl group-hover:scale-110 transition-transform duration-300">{{ $game->thumbnail }}</span>
        <span class="absolute top-3 right-3 text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm"
              style="background:{{ $game->color_from }}40; color:white; border: 1px solid {{ $game->color_from }}50">
            {{ $game->difficulty }}
        </span>
    </div>

    {{-- Body --}}
    <div class="p-5">
        <div class="flex items-center justify-between mb-2">
            <h3 class="font-gaming text-sm font-bold text-white group-hover:text-purple-300 transition-colors">{{ $game->title }}</h3>
            <span class="text-xs text-gray-500 bg-gray-800/60 px-2 py-1 rounded-full">{{ $game->category }}</span>
        </div>
        <p class="text-gray-400 text-xs leading-relaxed mb-4 line-clamp-2">{{ $game->description }}</p>
        <a href="{{ route('games.show', $game->slug) }}"
           class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl text-sm font-bold text-white transition-all"
           style="background: linear-gradient(135deg, {{ $game->color_from }}, {{ $game->color_to }})">
            ▶ Play Now
        </a>
    </div>
</div>