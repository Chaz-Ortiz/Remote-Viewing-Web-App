<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ESP Remote Viewing Experiment</title>

<!-- Bootstrap and other CSS -->
<link href="../assets/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/owl.carousel.css">
<link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
<link rel="stylesheet" href="../assets/css/templatemo-style.css">

<!-- Occult-style fonts -->
<link href="https://fonts.googleapis.com/css2?family=Pirata+One&family=MedievalSharp&display=swap" rel="stylesheet">

<style>
body {
  background-color: #0b0b0b;
  color: #e8e6d9;
  font-family: 'MedievalSharp', cursive;
  text-align: center;
  margin: 0;
  padding-top: 100px;  /* offset for fixed header */
  padding-bottom: 70px; /* offset for fixed footer */
}

/* ===== Header ===== */
header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  background: rgba(11, 11, 11, 0.9);
  border-bottom: 1px solid #333;
  box-shadow: 0 0 15px rgba(255,117,24,0.15);
  padding: 1rem 0;
}

header h1 {
  font-family: 'Pirata One', cursive;
  color: #ffb347;
  text-shadow: 0 0 10px #ff7518, 0 0 20px rgba(255,117,24,0.5);
  letter-spacing: 3px;
  text-transform: uppercase;
  margin: 0;
}

/* ===== Footer ===== */
footer {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  background: rgba(11, 11, 11, 0.9);
  border-top: 1px solid #333;
  box-shadow: 0 0 15px rgba(255,117,24,0.15);
  padding: 0.7rem 0;
  font-size: 1rem;
  color: #ffb347;
  text-shadow: 0 0 8px #ff7518;
  font-family: 'Pirata One', cursive;
  letter-spacing: 1px;
}

/* ===== Card and aura effects ===== */
.glow-green {
  color: #39FF14;
  text-shadow: 0 0 10px #39FF14, 0 0 20px #39FF14, 0 0 30px #32CD32;
  animation: auraPulse 2s infinite alternate;
}

.glow-purple {
  color: #B026FF;
  text-shadow: 0 0 10px #B026FF, 0 0 20px #B026FF, 0 0 30px #8A2BE2;
  animation: auraPulse 2s infinite alternate;
}

.glow-orange {
  color: #FF7518;
  text-shadow: 0 0 10px #FF7518, 0 0 20px #FF8C00, 0 0 30px #FFA500;
  animation: auraPulse 2s infinite alternate;
}

@keyframes auraPulse {
  from { opacity: 0.8; text-shadow: 0 0 10px currentColor, 0 0 20px currentColor; }
  to { opacity: 1; text-shadow: 0 0 20px currentColor, 0 0 40px currentColor; }
}

/* Inputs and buttons */
input[type="number"] {
  background-color: #1a1a1a;
  color: #ffb347;
  border: 2px solid #444;
  font-size: 1.2rem;
  text-align: center;
}

input[type="number"]:focus {
  outline: none;
  border-color: #ff7518;
  box-shadow: 0 0 10px #ff7518;
}

button {
  font-family: 'MedievalSharp', cursive;
  font-size: 1.1rem;
}

.btn-outline-warning {
  border-color: #ff7518;
  color: #ffb347;
}

.btn-outline-warning:hover {
  background-color: #ff7518;
  color: #0b0b0b;
  box-shadow: 0 0 15px #ff7518;
}

.card {
  background: radial-gradient(circle at center, #161616 0%, #0b0b0b 80%);
  border: 1px solid #333;
  box-shadow: 0 0 20px rgba(255,117,24,0.15);
}
</style>
</head>

<body>
<!-- 🔮 HEADER -->
<header>
  <h1>ESP Remote Viewing Experiment</h1>
</header>

<!-- MAIN CONTENT -->
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card text-light rounded-4 p-5">
        <div class="card-body">

          <h2 class="mb-4" style="font-family:'Pirata One', cursive; color:#ffb347;">The Second Sight</h2>
          <p class="lead mb-4 text-muted">
            Focus your consciousness... a hidden number between <strong>1 and 99</strong> awaits beyond the veil.<br>
            Trust your intuition — let the number come to you.
          </p>

          <div class="input-group mb-4">
            <input type="number" id="userGuess" class="form-control" min="1" max="99" placeholder="Enter what you perceive...">
            <button class="btn btn-outline-warning" onclick="checkGuess()">
              <i class="fa fa-eye"></i> Reveal the Vision
            </button>
          </div>

          <p id="feedback" class="fs-5 fw-bold mb-3"></p>
          <p id="numberDisplay" class="fs-6 fw-semibold text-secondary"></p>

          <button class="btn btn-outline-light mt-3" onclick="resetGame()">
            <i class="fa fa-refresh"></i> Clear the Mind
          </button>

          <p class="mt-4 text-secondary fst-italic">
            The ether whispers... can you discern its message?
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 🕯️ FOOTER -->
<footer>
  This is not a game — it’s a test of your intuition.
</footer>

<script>
let randomNumber;

function generateRandomNumber() {
  randomNumber = Math.floor(Math.random() * 99) + 1;
  console.log("Hidden number (debug):", randomNumber);
}

function checkGuess() {
  const input = document.getElementById('userGuess').value;
  const guess = parseInt(input);
  const feedback = document.getElementById('feedback');
  const numberDisplay = document.getElementById('numberDisplay');

  feedback.className = "fs-5 fw-bold mb-3";

  if (isNaN(guess) || guess < 1 || guess > 99) {
    feedback.textContent = "🌀 The vision blurs... focus your mind and try again.";
    feedback.classList.add("glow-orange");
    numberDisplay.textContent = "";
    return;
  }

  const difference = Math.abs(randomNumber - guess);

  if (guess === randomNumber) {
    feedback.textContent = "✨ You have pierced the veil — your sight is true.";
    feedback.classList.add("glow-green");
  } else if (guess < randomNumber) {
    feedback.textContent = "🔮 The unseen number vibrates at a higher frequency...";
    feedback.classList.add("glow-purple");
  } else {
    feedback.textContent = "🔮 The hidden energy hums below your perception...";
    feedback.classList.add("glow-purple");
  }

  numberDisplay.textContent =
    `Your vision: ${guess} | Hidden number: ${randomNumber} | Difference: ${difference}`;
}

function resetGame() {
  document.getElementById('userGuess').value = '';
  document.getElementById('feedback').textContent = '';
  document.getElementById('feedback').className = 'fs-5 fw-bold mb-3';
  document.getElementById('numberDisplay').textContent = '';
  generateRandomNumber();
}

window.onload = generateRandomNumber;
</script>
</body>
</html>

