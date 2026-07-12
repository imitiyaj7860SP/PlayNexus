<div class="flex flex-col items-center gap-6 w-full" id="ttt-app" data-game-id="{{ $game->id }}">
    <div id="ttt-status" class="font-gaming text-lg font-bold text-purple-300">Player X's Turn</div>
    <div class="grid grid-cols-3 gap-3" id="ttt-board">
        @for($i = 0; $i < 9; $i++)
        <button onclick="tttMove({{ $i }})"
                class="ttt-cell w-24 h-24 md:w-28 md:h-28 bg-gray-800/80 border-2 border-gray-700/50 rounded-2xl text-5xl font-black transition-all duration-200 hover:border-purple-500/50 flex items-center justify-center"
                data-index="{{ $i }}"></button>
        @endfor
    </div>
    <div class="flex gap-4 items-center">
        <div class="text-center"><div class="text-xs text-gray-500 mb-1">X Wins</div><div id="ttt-xw" class="font-gaming text-xl font-black text-purple-400">0</div></div>
        <div class="text-center"><div class="text-xs text-gray-500 mb-1">Draws</div><div id="ttt-d" class="font-gaming text-xl font-black text-gray-400">0</div></div>
        <div class="text-center"><div class="text-xs text-gray-500 mb-1">O Wins</div><div id="ttt-ow" class="font-gaming text-xl font-black text-cyan-400">0</div></div>
    </div>
    <button onclick="tttReset()" class="bg-gradient-to-r from-purple-600 to-cyan-500 text-white px-8 py-3 rounded-xl font-bold text-sm transition-all hover:-translate-y-0.5">🔄 New Game</button>
</div>
<script>
let board=Array(9).fill(''),cur='X',over=false,xw=0,ow=0,d=0;
const wins=[[0,1,2],[3,4,5],[6,7,8],[0,3,6],[1,4,7],[2,5,8],[0,4,8],[2,4,6]];
function tttMove(i){
    if(board[i]||over)return;
    board[i]=cur;
    const cell=document.querySelectorAll('.ttt-cell')[i];
    cell.textContent=cur;cell.style.color=cur==='X'?'#a78bfa':'#22d3ee';
    const winner=checkWin();
    if(winner){
        document.getElementById('ttt-status').textContent=`🎉 Player ${winner} Wins!`;
        document.getElementById('ttt-status').style.color='#4ade80';
        over=true;
        if(winner==='X'){xw++;document.getElementById('ttt-xw').textContent=xw;}
        else{ow++;document.getElementById('ttt-ow').textContent=ow;}
        @auth saveScore(winner==='X'?10:0, winner==='X'?'win':'loss'); @endauth
        return;
    }
    if(board.every(c=>c)){
        document.getElementById('ttt-status').textContent="🤝 Draw!";
        over=true;d++;document.getElementById('ttt-d').textContent=d;
        @auth saveScore(2,'draw'); @endauth
        return;
    }
    cur=cur==='X'?'O':'X';
    document.getElementById('ttt-status').textContent=`Player ${cur}'s Turn`;
}
function checkWin(){
    for(const[a,b,c]of wins){
        if(board[a]&&board[a]===board[b]&&board[b]===board[c]){
            [a,b,c].forEach(i=>document.querySelectorAll('.ttt-cell')[i].classList.add('bg-purple-900/60','border-purple-400'));
            return board[a];
        }
    }return null;
}
function tttReset(){
    board=Array(9).fill('');cur='X';over=false;
    document.querySelectorAll('.ttt-cell').forEach(c=>{c.textContent='';c.style.color='';c.className='ttt-cell w-24 h-24 md:w-28 md:h-28 bg-gray-800/80 border-2 border-gray-700/50 rounded-2xl text-5xl font-black transition-all duration-200 hover:border-purple-500/50 flex items-center justify-center';});
    document.getElementById('ttt-status').textContent="Player X's Turn";
    document.getElementById('ttt-status').style.color='';
}
@auth
function saveScore(score,result){
    fetch('/scores',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content},body:JSON.stringify({game_id:{{ $game->id }},score,result})});
}
@endauth
</script>