<div class="w-full max-w-2xl mx-auto" id="quiz-app" data-game-id="{{ $game->id }}">

    {{-- Subject Selection Screen --}}
    <div id="quiz-subjects" class="flex flex-col items-center gap-6">
        <div class="text-center">
            <div class="text-5xl mb-3">🧠</div>
            <h2 class="font-gaming text-2xl font-black text-white mb-2">QUIZ CHALLENGE</h2>
            <p class="text-gray-400 text-sm">Choose a subject to begin</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 w-full">
            @foreach([
                ['Science',    '🔬', '#0ea5e9', '#06b6d4'],
                ['History',    '📜', '#f59e0b', '#ef4444'],
                ['Sports',     '⚽', '#10b981', '#0d9488'],
                ['Technology', '💻', '#8b5cf6', '#6366f1'],
                ['Geography',  '🌍', '#f97316', '#ef4444'],
                ['Random',     '🎲', '#ec4899', '#8b5cf6'],
            ] as [$subject, $icon, $from, $to])
            <button onclick="startQuiz('{{ $subject }}')"
                    class="flex flex-col items-center gap-3 p-5 rounded-2xl border-2 border-gray-700/50
                           hover:border-transparent transition-all duration-300 hover:-translate-y-1
                           hover:shadow-xl group bg-gray-800/50"
                    style="--from:{{ $from }}; --to:{{ $to }}"
                    onmouseover="this.style.background='linear-gradient(135deg,{{ $from }}30,{{ $to }}20)'; this.style.borderColor='{{ $from }}60'"
                    onmouseout="this.style.background=''; this.style.borderColor=''">
                <span class="text-4xl group-hover:scale-110 transition-transform">{{ $icon }}</span>
                <span class="font-gaming text-xs font-bold text-gray-300 group-hover:text-white transition-colors">{{ strtoupper($subject) }}</span>
            </button>
            @endforeach
        </div>
    </div>

    {{-- Quiz Game Screen --}}
    <div id="quiz-game" class="hidden flex-col gap-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span id="q-subject-icon" class="text-2xl"></span>
                <span id="q-subject-name" class="font-gaming text-sm font-bold text-white"></span>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-center">
                    <div class="text-xs text-gray-500 mb-0.5">Score</div>
                    <div id="q-score" class="font-gaming text-lg font-black text-cyan-400">0</div>
                </div>
                <div class="text-center">
                    <div class="text-xs text-gray-500 mb-0.5">Q</div>
                    <div id="q-num" class="font-gaming text-lg font-black text-purple-400">1/10</div>
                </div>
                <div class="w-10 h-10 rounded-full border-4 border-gray-700 flex items-center justify-center relative" id="q-timer-ring">
                    <span id="q-timer" class="font-gaming text-sm font-black text-white">15</span>
                </div>
            </div>
        </div>

        {{-- Progress Bar --}}
        <div class="w-full h-1.5 bg-gray-800 rounded-full overflow-hidden">
            <div id="q-progress" class="h-full bg-gradient-to-r from-purple-500 to-cyan-400 rounded-full transition-all duration-500" style="width:10%"></div>
        </div>

        {{-- Question --}}
        <div class="bg-gray-800/50 border border-gray-700/50 rounded-2xl p-6 min-h-24 flex items-center">
            <p id="q-question" class="text-white text-base font-semibold leading-relaxed text-center w-full"></p>
        </div>

        {{-- Options --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" id="q-options">
            @foreach(['a','b','c','d'] as $opt)
            <button id="opt-{{ $opt }}" onclick="selectAnswer('{{ $opt }}')"
                    class="quiz-option text-left px-5 py-4 rounded-xl border-2 border-gray-700/50 bg-gray-800/40
                           hover:border-cyan-500/50 hover:bg-cyan-900/20 transition-all duration-200
                           text-sm text-gray-200 font-medium group">
                <span class="font-gaming text-xs text-gray-500 mr-2 group-hover:text-cyan-400 transition-colors uppercase">{{ $opt }}.</span>
                <span id="opt-{{ $opt }}-text"></span>
            </button>
            @endforeach
        </div>

        {{-- Feedback --}}
        <div id="q-feedback" class="hidden text-center py-3 rounded-xl font-gaming text-sm font-bold"></div>
    </div>

    {{-- Results Screen --}}
    <div id="quiz-results" class="hidden flex-col items-center gap-6 text-center">
        <div id="q-trophy" class="text-7xl"></div>
        <div>
            <h2 class="font-gaming text-3xl font-black text-white mb-2" id="q-result-title"></h2>
            <p class="text-gray-400 text-sm" id="q-result-sub"></p>
        </div>
        <div class="grid grid-cols-3 gap-6 w-full max-w-sm">
            <div class="bg-gray-800/50 rounded-2xl p-4">
                <div class="font-gaming text-3xl font-black text-cyan-400" id="q-final-score"></div>
                <div class="text-xs text-gray-500 mt-1">Score</div>
            </div>
            <div class="bg-gray-800/50 rounded-2xl p-4">
                <div class="font-gaming text-3xl font-black text-green-400" id="q-correct-count"></div>
                <div class="text-xs text-gray-500 mt-1">Correct</div>
            </div>
            <div class="bg-gray-800/50 rounded-2xl p-4">
                <div class="font-gaming text-3xl font-black text-purple-400" id="q-accuracy"></div>
                <div class="text-xs text-gray-500 mt-1">Accuracy</div>
            </div>
        </div>
        <div class="flex gap-4">
            <button onclick="retryQuiz()" class="bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-500 hover:to-blue-500 text-white px-8 py-3 rounded-xl font-bold text-sm transition-all hover:-translate-y-0.5">
                🔄 Play Again
            </button>
            <button onclick="showSubjects()" class="border border-gray-700 hover:border-gray-500 text-gray-300 hover:text-white px-8 py-3 rounded-xl font-bold text-sm transition-all">
                Change Subject
            </button>
        </div>
    </div>

</div>

<script>
// ── State ──────────────────────────────────────────────
const SUBJECTS = {
    'Science':    { icon:'🔬', from:'#0ea5e9' },
    'History':    { icon:'📜', from:'#f59e0b' },
    'Sports':     { icon:'⚽', from:'#10b981' },
    'Technology': { icon:'💻', from:'#8b5cf6' },
    'Geography':  { icon:'🌍', from:'#f97316' },
    'Random':     { icon:'🎲', from:'#ec4899' },
};

let questions = [], current = 0, score = 0, correct = 0;
let timerInterval, timeLeft = 15, answered = false;
let currentSubject = '';

// ── Start Quiz ─────────────────────────────────────────
async function startQuiz(subject) {
    currentSubject = subject;
    document.getElementById('quiz-subjects').classList.add('hidden');
    document.getElementById('quiz-results').classList.add('hidden');
    document.getElementById('quiz-game').classList.remove('hidden');
    document.getElementById('quiz-game').classList.add('flex');

    // Set subject display
    const s = SUBJECTS[subject] || SUBJECTS['Random'];
    document.getElementById('q-subject-icon').textContent = s.icon;
    document.getElementById('q-subject-name').textContent = subject.toUpperCase();

    // Fetch questions
    try {
        const url = subject === 'Random'
            ? '/quiz/questions'
            : `/quiz/questions?subject=${encodeURIComponent(subject)}`;
        const res = await fetch(url);
        const data = await res.json();
        questions = data;
        current = 0; score = 0; correct = 0;
        document.getElementById('q-score').textContent = 0;
        showQuestion();
    } catch(e) {
        alert('Failed to load questions. Please try again.');
        showSubjects();
    }
}

// ── Show Question ──────────────────────────────────────
function showQuestion() {
    if (current >= questions.length) { showResults(); return; }

    const q = questions[current];
    answered = false;

    // Update UI
    document.getElementById('q-question').textContent = q.question;
    document.getElementById('q-num').textContent = `${current + 1}/${questions.length}`;
    document.getElementById('q-progress').style.width = `${((current + 1) / questions.length) * 100}%`;
    document.getElementById('q-feedback').classList.add('hidden');

    // Set options
    ['a','b','c','d'].forEach(opt => {
        const btn = document.getElementById(`opt-${opt}`);
        const txt = document.getElementById(`opt-${opt}-text`);
        txt.textContent = q[`option_${opt}`];
        btn.className = 'quiz-option text-left px-5 py-4 rounded-xl border-2 border-gray-700/50 bg-gray-800/40 hover:border-cyan-500/50 hover:bg-cyan-900/20 transition-all duration-200 text-sm text-gray-200 font-medium group';
        btn.disabled = false;
    });

    // Start timer
    clearInterval(timerInterval);
    timeLeft = 15;
    document.getElementById('q-timer').textContent = timeLeft;
    timerInterval = setInterval(() => {
        timeLeft--;
        document.getElementById('q-timer').textContent = timeLeft;
        // Color warning
        if (timeLeft <= 5) document.getElementById('q-timer').style.color = '#f87171';
        else document.getElementById('q-timer').style.color = 'white';

        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            if (!answered) timeUp();
        }
    }, 1000);
}

// ── Select Answer ──────────────────────────────────────
function selectAnswer(selected) {
    if (answered) return;
    answered = true;
    clearInterval(timerInterval);

    const q = questions[current];
    const isCorrect = selected === q.correct_answer;

    // Highlight correct / wrong
    ['a','b','c','d'].forEach(opt => {
        const btn = document.getElementById(`opt-${opt}`);
        btn.disabled = true;
        if (opt === q.correct_answer) {
            btn.classList.add('border-green-500', 'bg-green-900/40', 'text-green-300');
            btn.classList.remove('border-gray-700/50', 'bg-gray-800/40');
        } else if (opt === selected && !isCorrect) {
            btn.classList.add('border-red-500', 'bg-red-900/40', 'text-red-300');
            btn.classList.remove('border-gray-700/50', 'bg-gray-800/40');
        }
    });

    // Feedback
    const fb = document.getElementById('q-feedback');
    fb.classList.remove('hidden');
    if (isCorrect) {
        const bonus = Math.ceil(timeLeft / 3);
        const pts = 10 + bonus;
        score += pts;
        correct++;
        document.getElementById('q-score').textContent = score;
        fb.textContent = `✅ Correct! +${pts} points (${bonus} time bonus)`;
        fb.className = 'text-center py-3 rounded-xl font-gaming text-sm font-bold bg-green-900/40 text-green-300';
    } else {
        fb.textContent = `❌ Wrong! Correct answer: ${q[`option_${q.correct_answer}`].toUpperCase()}`;
        fb.className = 'text-center py-3 rounded-xl font-gaming text-sm font-bold bg-red-900/40 text-red-300';
    }

    setTimeout(() => { current++; showQuestion(); }, 1800);
}

// ── Time Up ────────────────────────────────────────────
function timeUp() {
    answered = true;
    const q = questions[current];
    const fb = document.getElementById('q-feedback');
    fb.classList.remove('hidden');
    fb.textContent = `⏰ Time's up! Answer: ${q[`option_${q.correct_answer}`]}`;
    fb.className = 'text-center py-3 rounded-xl font-gaming text-sm font-bold bg-yellow-900/40 text-yellow-300';

    // Show correct answer
    const btn = document.getElementById(`opt-${q.correct_answer}`);
    btn.classList.add('border-green-500', 'bg-green-900/40');

    ['a','b','c','d'].forEach(opt => document.getElementById(`opt-${opt}`).disabled = true);
    setTimeout(() => { current++; showQuestion(); }, 1800);
}

// ── Show Results ───────────────────────────────────────
function showResults() {
    document.getElementById('quiz-game').classList.add('hidden');
    document.getElementById('quiz-game').classList.remove('flex');
    document.getElementById('quiz-results').classList.remove('hidden');
    document.getElementById('quiz-results').classList.add('flex');

    const accuracy = Math.round((correct / questions.length) * 100);
    document.getElementById('q-final-score').textContent = score;
    document.getElementById('q-correct-count').textContent = `${correct}/${questions.length}`;
    document.getElementById('q-accuracy').textContent = `${accuracy}%`;

    let trophy, title, sub;
    if (accuracy >= 90)      { trophy='🏆'; title='BRILLIANT!'; sub='You are a quiz master!'; }
    else if (accuracy >= 70) { trophy='🥇'; title='GREAT JOB!'; sub='Excellent performance!'; }
    else if (accuracy >= 50) { trophy='🥈'; title='GOOD TRY!'; sub='Keep practicing!'; }
    else                     { trophy='📚'; title='KEEP LEARNING!'; sub='Study more and try again!'; }

    document.getElementById('q-trophy').textContent = trophy;
    document.getElementById('q-result-title').textContent = title;
    document.getElementById('q-result-sub').textContent = sub;

    // Save score
    @auth
    fetch('/scores', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            game_id: {{ $game->id }},
            score: score,
            result: accuracy >= 50 ? 'win' : 'loss'
        })
    });
    @endauth
}

// ── Navigation ─────────────────────────────────────────
function retryQuiz()  { startQuiz(currentSubject); }
function showSubjects() {
    document.getElementById('quiz-game').classList.add('hidden');
    document.getElementById('quiz-results').classList.add('hidden');
    document.getElementById('quiz-game').classList.remove('flex');
    document.getElementById('quiz-results').classList.remove('flex');
    document.getElementById('quiz-subjects').classList.remove('hidden');
}
</script>