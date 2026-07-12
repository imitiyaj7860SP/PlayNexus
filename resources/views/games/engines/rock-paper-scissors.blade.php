<div class="flex flex-col items-center gap-8 w-full max-w-lg mx-auto" data-game-id="{{ $game->id }}">
    <div class="flex gap-16">
        <div class="text-center"><div class="text-xs text-gray-500 uppercase tracking-widest mb-1">You</div><div id="r-ps" class="font-gaming text-4xl font-black text-orange-400">0</div></div>
        <div class="font-gaming text-gray-600 text-2xl self-center">VS</div>
        <div class="text-center"><div class="text-xs text-gray-500 uppercase tracking-widest mb-1">CPU</div><div id="r-cs" class="font-gaming text-4xl font-black text-red-400">0</div></div>
    </div>
    <div class="flex items-center justify-center gap-10 bg-gray-800/40 rounded-3xl px-10 py-8 border border-gray-700/40 w-full">
        <div class="text-center"><div class="text-7xl mb-2" id="r-pc">🤔</div><div class="text-xs text-gray-500">Your Pick</div></div>
        <div id="r-result" class="font-gaming text-xl font-black text-gray-500 text-center min-w-20">Pick!</div>
        <div class="text-center"><div class="text-7xl mb-2" id="r-cc">🤔</div><div class="text-xs text-gray-500">CPU Pick</div></div>
    </div>
    <div class="flex gap-4">
        @foreach([['✊','Rock'],['✋','Paper'],['✌️','Scissors']] as [$emoji,$label])
        <button onclick="rpsPlay('{{ $label }}')"
                class="flex flex-col items-center gap-2 bg-gray-800/60 hover:bg-orange-900/30 border-2 border-gray-700/50 hover:border-orange-500/50 px-5 py-4 rounded-2xl transition-all hover:-translate-y-1 group">
            <span class="text-4xl group-hover:scale-110 transition-transform">{{ $emoji }}</span>
            <span class="text-xs font-bold text-gray-400 group-hover:text-orange-300 transition-colors">{{ $label }}</span>
        </button>
        @endforeach
    </div>
    <button onclick="rpsReset()" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">Reset Scores</button>
</div>
<script>
let rPS=0,rCS=0;
const RPS={Rock:'✊',Paper:'✋',Scissors:'✌️'};
const beats={Rock:'Scissors',Paper:'Rock',Scissors:'Paper'};
function rpsPlay(choice){
    const cpu=Object.keys(RPS)[Math.floor(Math.random()*3)];
    document.getElementById('r-pc').textContent=RPS[choice];
    document.getElementById('r-cc').textContent='🤔';
    setTimeout(()=>{
        document.getElementById('r-cc').textContent=RPS[cpu];
        let result,color,sc=0,res='loss';
        if(choice===cpu){result='DRAW';color='#94a3b8';sc=2;res='draw';}
        else if(beats[choice]===cpu){result='WIN! 🎉';color='#4ade80';rPS++;document.getElementById('r-ps').textContent=rPS;sc=10;res='win';}
        else{result='LOSE 💀';color='#f87171';rCS++;document.getElementById('r-cs').textContent=rCS;}
        document.getElementById('r-result').textContent=result;
        document.getElementById('r-result').style.color=color;
        @auth fetch('/scores',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content},body:JSON.stringify({game_id:{{ $game->id }},score:sc,result:res})}); @endauth
    },400);
}
function rpsReset(){rPS=rCS=0;document.getElementById('r-ps').textContent=0;document.getElementById('r-cs').textContent=0;document.getElementById('r-pc').textContent='🤔';document.getElementById('r-cc').textContent='🤔';document.getElementById('r-result').textContent='Pick!';document.getElementById('r-result').style.color='';}
</script>