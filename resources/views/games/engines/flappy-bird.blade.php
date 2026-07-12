<div class="flex flex-col items-center gap-5 w-full" data-game-id="{{ $game->id }}">
    <div class="flex gap-10">
        <div class="text-center"><div class="text-xs text-gray-500 uppercase tracking-widest mb-1">Score</div><div id="fb-s" class="font-gaming text-3xl font-black text-blue-400">0</div></div>
        <div class="text-center"><div class="text-xs text-gray-500 uppercase tracking-widest mb-1">Best</div><div id="fb-b" class="font-gaming text-3xl font-black text-purple-400">0</div></div>
    </div>
    <canvas id="fbC" width="380" height="440" class="rounded-2xl border-2 border-gray-700/50 cursor-pointer" style="max-width:100%"></canvas>
    <p class="text-gray-500 text-xs">SPACE or tap canvas to flap</p>
</div>
<script>
const fc=document.getElementById('fbC'),fx=fc.getContext('2d'),FW=380,FH=440;
let fState='idle',fScore=0,fBest=0,bird,pipes,frame;
function fInit(){bird={x:80,y:FH/2,vy:0,r:14};pipes=[];fScore=0;frame=0;document.getElementById('fb-s').textContent=0;fState='running';}
function fFlap(){if(fState==='idle'||fState==='dead'){fInit();return;}bird.vy=-7;}
fc.addEventListener('click',fFlap);
document.addEventListener('keydown',e=>{if(e.code==='Space'){e.preventDefault();fFlap();}});
function fLoop(){
    requestAnimationFrame(fLoop);fx.clearRect(0,0,FW,FH);
    const sky=fx.createLinearGradient(0,0,0,FH);sky.addColorStop(0,'#0c1445');sky.addColorStop(1,'#1a1060');fx.fillStyle=sky;fx.fillRect(0,0,FW,FH);
    if(fState==='idle'){fx.fillStyle='#60a5fa';fx.font='bold 15px monospace';fx.textAlign='center';fx.fillText('TAP or SPACE to Start',FW/2,FH/2);drawBird();return;}
    bird.vy+=0.35;bird.y+=bird.vy;frame++;
    if(frame%90===0){const gap=130,top=60+Math.random()*(FH-gap-120);pipes.push({x:FW,top,gap,scored:false});}
    pipes.forEach(p=>{p.x-=2.5;});pipes=pipes.filter(p=>p.x>-60);
    pipes.forEach(p=>{
        if(!p.scored&&p.x+40<bird.x){p.scored=true;fScore++;document.getElementById('fb-s').textContent=fScore;}
        fx.fillStyle='#16a34a';fx.fillRect(p.x,0,40,p.top);fx.fillRect(p.x,p.top+p.gap,40,FH);
        fx.fillStyle='#15803d';fx.fillRect(p.x-4,p.top-20,48,20);fx.fillRect(p.x-4,p.top+p.gap,48,20);
    });
    fx.fillStyle='#92400e';fx.fillRect(0,FH-30,FW,30);fx.fillStyle='#78350f';fx.fillRect(0,FH-30,FW,6);
    drawBird();
    const dead=bird.y+bird.r>FH-30||bird.y-bird.r<0||pipes.some(p=>bird.x+bird.r>p.x&&bird.x-bird.r<p.x+40&&(bird.y-bird.r<p.top||bird.y+bird.r>p.top+p.gap));
    if(dead){
        fState='dead';
        if(fScore>fBest){fBest=fScore;document.getElementById('fb-b').textContent=fBest;}
        @auth if(fScore>0)fetch('/scores',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content},body:JSON.stringify({game_id:{{ $game->id }},score:fScore,result:'played'})}); @endauth
        fx.fillStyle='rgba(239,68,68,0.3)';fx.fillRect(0,0,FW,FH);
        fx.fillStyle='#fca5a5';fx.font='bold 26px monospace';fx.textAlign='center';fx.fillText('GAME OVER',FW/2,FH/2-15);
        fx.font='13px monospace';fx.fillStyle='#94a3b8';fx.fillText(`Score: ${fScore} — Tap to restart`,FW/2,FH/2+20);
    }
}
function drawBird(){
    fx.save();fx.translate(bird.x,bird.y);fx.rotate(Math.min(Math.max(bird.vy*0.06,-0.5),0.8));
    fx.font='26px serif';fx.textAlign='center';fx.fillText('🐦',0,9);fx.restore();
}
fLoop();
</script>
