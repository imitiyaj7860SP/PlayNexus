<div class="flex flex-col items-center gap-5 w-full" data-game-id="{{ $game->id }}">
    <div class="flex gap-10">
        <div class="text-center"><div class="text-xs text-gray-500 uppercase tracking-widest mb-1">Score</div><div id="s-score" class="font-gaming text-3xl font-black text-green-400">0</div></div>
        <div class="text-center"><div class="text-xs text-gray-500 uppercase tracking-widest mb-1">Best</div><div id="s-best" class="font-gaming text-3xl font-black text-purple-400">0</div></div>
    </div>
    <canvas id="snakeCanvas" width="400" height="400" class="rounded-2xl border-2 border-gray-700/50 bg-gray-950" style="max-width:100%"></canvas>
    <p id="s-msg" class="font-gaming text-sm text-gray-400">Press SPACE or tap Start to play</p>
    <div class="flex gap-3">
        <button onclick="snakeStart()" class="bg-gradient-to-r from-green-600 to-teal-500 text-white px-6 py-3 rounded-xl font-bold text-sm hover:-translate-y-0.5 transition-all">▶ Start</button>
    </div>
    <div class="grid grid-cols-3 gap-2">
        <div></div><button onclick="sd(0,-1)" class="bg-gray-800 hover:bg-gray-700 text-white w-12 h-12 rounded-xl text-lg">↑</button><div></div>
        <button onclick="sd(-1,0)" class="bg-gray-800 hover:bg-gray-700 text-white w-12 h-12 rounded-xl text-lg">←</button>
        <button onclick="sd(0,1)" class="bg-gray-800 hover:bg-gray-700 text-white w-12 h-12 rounded-xl text-lg">↓</button>
        <button onclick="sd(1,0)" class="bg-gray-800 hover:bg-gray-700 text-white w-12 h-12 rounded-xl text-lg">→</button>
    </div>
</div>
<script>
const sc=document.getElementById('snakeCanvas'),ctx=sc.getContext('2d'),G=20,SZ=400/G;
let snake,dir,food,score,best=0,loop,running=false;
function snakeStart(){
    snake=[{x:10,y:10},{x:9,y:10},{x:8,y:10}];dir={x:1,y:0};score=0;running=true;
    document.getElementById('s-score').textContent=0;
    document.getElementById('s-msg').textContent='Use arrow keys or buttons';
    placeFood();clearInterval(loop);loop=setInterval(tick,120);
}
function placeFood(){do{food={x:Math.floor(Math.random()*G),y:Math.floor(Math.random()*G)}}while(snake.some(s=>s.x===food.x&&s.y===food.y));}
function sd(x,y){if((x!==0&&dir.x===0)||(y!==0&&dir.y===0))dir={x,y};}
function tick(){
    const h={x:snake[0].x+dir.x,y:snake[0].y+dir.y};
    if(h.x<0||h.x>=G||h.y<0||h.y>=G||snake.some(s=>s.x===h.x&&s.y===h.y)){
        clearInterval(loop);running=false;
        if(score>best){best=score;document.getElementById('s-best').textContent=best;}
        document.getElementById('s-msg').textContent=`💀 Game Over! Score: ${score}`;
        @auth if(score>0)fetch('/scores',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content},body:JSON.stringify({game_id:{{ $game->id }},score,result:'played'})}); @endauth
        return;
    }
    snake.unshift(h);
    if(h.x===food.x&&h.y===food.y){score++;document.getElementById('s-score').textContent=score;placeFood();}
    else snake.pop();
    draw();
}
function draw(){
    ctx.fillStyle='#030712';ctx.fillRect(0,0,400,400);
    ctx.fillStyle='#1f2937';
    for(let x=0;x<G;x++)for(let y=0;y<G;y++)ctx.fillRect(x*SZ+SZ/2-1,y*SZ+SZ/2-1,2,2);
    ctx.fillStyle='#f87171';ctx.beginPath();ctx.arc(food.x*SZ+SZ/2,food.y*SZ+SZ/2,SZ/2-2,0,Math.PI*2);ctx.fill();
    snake.forEach((s,i)=>{ctx.fillStyle=i===0?'#4ade80':`hsl(${160-i*3},70%,${50-i*0.5}%)`;ctx.beginPath();ctx.roundRect(s.x*SZ+2,s.y*SZ+2,SZ-4,SZ-4,4);ctx.fill();});
}
document.addEventListener('keydown',e=>{
    const m={'ArrowUp':[0,-1],'ArrowDown':[0,1],'ArrowLeft':[-1,0],'ArrowRight':[1,0]};
    if(e.code==='Space'){e.preventDefault();snakeStart();return;}
    if(m[e.key]){e.preventDefault();sd(...m[e.key]);}
});
ctx.fillStyle='#030712';ctx.fillRect(0,0,400,400);
</script>