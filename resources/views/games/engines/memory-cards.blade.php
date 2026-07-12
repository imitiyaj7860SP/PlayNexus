<div class="flex flex-col items-center gap-6 w-full" data-game-id="{{ $game->id }}">
    <div class="flex gap-10">
        <div class="text-center"><div class="text-xs text-gray-500 uppercase tracking-widest mb-1">Moves</div><div id="m-moves" class="font-gaming text-3xl font-black text-pink-400">0</div></div>
        <div class="text-center"><div class="text-xs text-gray-500 uppercase tracking-widest mb-1">Pairs</div><div id="m-pairs" class="font-gaming text-3xl font-black text-purple-400">0/8</div></div>
        <div class="text-center"><div class="text-xs text-gray-500 uppercase tracking-widest mb-1">Time</div><div id="m-time" class="font-gaming text-3xl font-black text-cyan-400">0s</div></div>
    </div>
    <div id="m-board" class="grid grid-cols-4 gap-3"></div>
    <button onclick="memInit()" class="bg-gradient-to-r from-pink-600 to-purple-600 text-white px-8 py-3 rounded-xl font-bold text-sm hover:-translate-y-0.5 transition-all">🔄 New Game</button>
</div>
<script>
const EMOJIS=['🎮','🏆','⚡','🎯','💎','🔥','🚀','⭐'];
let flipped=[],matched=[],moves=0,pairs=0,timer,seconds=0,cards;
function memInit(){
    clearInterval(timer);flipped=[];matched=[];moves=0;pairs=0;seconds=0;
    ['m-moves','m-pairs','m-time'].forEach((id,i)=>document.getElementById(id).textContent=i===1?'0/8':i===2?'0s':'0');
    cards=[...EMOJIS,...EMOJIS].sort(()=>Math.random()-0.5);
    const board=document.getElementById('m-board');board.innerHTML='';
    cards.forEach((e,i)=>{
        const c=document.createElement('button');
        c.className='mem-card w-16 h-16 md:w-20 md:h-20 bg-gray-800 border-2 border-gray-700/50 rounded-2xl text-3xl flex items-center justify-center transition-all duration-300';
        c.dataset.index=i;c.dataset.emoji=e;c.textContent='?';c.style.color='#374151';
        c.onclick=()=>memFlip(c,i);board.appendChild(c);
    });
    timer=setInterval(()=>{seconds++;document.getElementById('m-time').textContent=seconds+'s';},1000);
}
function memFlip(card,i){
    if(flipped.length===2||matched.includes(i)||flipped.includes(i))return;
    card.textContent=card.dataset.emoji;card.style.color='';
    card.classList.add('bg-pink-900/40','border-pink-500/50','scale-105');
    flipped.push(i);
    if(flipped.length===2){
        moves++;document.getElementById('m-moves').textContent=moves;
        const[a,b]=flipped,ca=document.querySelector(`[data-index="${a}"]`),cb=document.querySelector(`[data-index="${b}"]`);
        if(cards[a]===cards[b]){
            matched.push(a,b);pairs++;document.getElementById('m-pairs').textContent=`${pairs}/8`;flipped=[];
            [ca,cb].forEach(c=>{c.classList.replace('bg-pink-900/40','bg-green-900/40');c.classList.replace('border-pink-500/50','border-green-500/50');});
            if(pairs===8){
                clearInterval(timer);
                const sc=Math.max(0,200-moves*5-seconds);
                @auth fetch('/scores',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content},body:JSON.stringify({game_id:{{ $game->id }},score:sc,result:'win'})}); @endauth
                setTimeout(()=>alert(`🎉 You won! Moves: ${moves}, Time: ${seconds}s, Score: ${sc}`),300);
            }
        } else {
            setTimeout(()=>{
                [ca,cb].forEach(c=>{c.textContent='?';c.style.color='#374151';c.className='mem-card w-16 h-16 md:w-20 md:h-20 bg-gray-800 border-2 border-gray-700/50 rounded-2xl text-3xl flex items-center justify-center transition-all duration-300';});
                flipped=[];
            },900);
        }
    }
}
memInit();
</script>