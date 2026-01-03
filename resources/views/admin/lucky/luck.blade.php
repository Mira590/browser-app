@extends('admin.master')
@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Name Spinner</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Confetti library -->
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

  <style>
body {
  background-image: url('pic.JPG'); /* Replace with your image URL */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

body::before {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255,255,255,0.6);
  z-index: -1;
}

#wheelCanvas {
  display: block;
  margin: 20px auto;
  border-radius: 50%;
  box-shadow: 0 0 15px rgba(0,0,0,0.3);
  background: #fff;
}
#spinBtn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 10;
  border-radius: 50%;
  font-weight: bold;
  font-size: 18px;
}
#wheelContainer {
  position: relative;
  width: 400px;
  height: 400px;
  margin: auto;
}
#pointer {
  position: absolute;
  top: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 0; 
  height: 0; 
  border-left: 15px solid transparent;
  border-right: 15px solid transparent;
  border-bottom: 20px solid red;
  z-index: 15;
}
#message {
  text-align: center;
  font-size: 1.3rem;
  font-weight: bold;
  margin-top: 15px;
  color: #d63384;
}
#winnersList {
  margin-top: 20px;
}

/* Sidebar */
#nameSidebar {
  position: fixed;
  top: 100px;
  right: 20px;
  width: 180px;
  max-height: 70vh;
  overflow-y: auto;
  background: #f8f9fa;
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 10px;
  font-size: 0.9rem;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
#nameSidebar h6 {
  text-align: center;
  margin-bottom: 10px;
  font-weight: bold;
  color: #d63384;
}
#nameSidebar ul {
  list-style: none;
  padding-left: 0;
  margin: 0;
}
#nameSidebar li {
  padding: 6px 10px;
  margin-bottom: 5px;
  background: linear-gradient(90deg, #ff85a1, #fbb1b1);
  color: #fff;
  border-radius: 8px;
  font-weight: bold;
  text-align: center;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* Winners list */
#winnerList {
  padding-left: 0;
  margin-top: 10px;
}
#winnerList li {
  list-style: none;
  margin-bottom: 5px;
  padding: 6px 10px;
  border-radius: 8px;
  font-weight: bold;
  text-align: center;
  background: linear-gradient(90deg, #28a745, #218838);
  color: #fff;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  border: none; /* remove bootstrap border */
}
  </style>
</head>
<body class="bg-light">
<div class="container py-5">
  <h1 class="mb-4 text-center">Advanced Name Spinner</h1>

  <div class="mb-3">
    <label for="nameInput" class="form-label">Enter a name:</label>
    <div class="input-group">
      <input type="text" class="form-control" id="nameInput" placeholder="Type a name">
      <button class="btn btn-primary" id="addNameBtn">Add Name</button>
    </div>
  </div>

  <div id="wheelContainer">
    <div id="pointer"></div>
    <canvas id="wheelCanvas" width="400" height="400"></canvas>
    <button id="spinBtn" class="btn btn-danger">SPIN</button>
  </div>

  <div class="d-flex justify-content-between mt-3">
    <button class="btn btn-warning" id="resetBtn">Reset</button>
    <div id="message"></div>
  </div>

  <div id="winnersList">
    <h5>Winners:</h5>
    <ul id="winnerList"></ul>
  </div>
</div>

<div id="nameSidebar">
  <h6>Names List</h6>
  <ul id="sidebarNames"></ul>
</div>

<script>
let names = JSON.parse(localStorage.getItem('names')) || [];
let winners = JSON.parse(localStorage.getItem('winners')) || [];

const nameInput = document.getElementById('nameInput');
const addNameBtn = document.getElementById('addNameBtn');
const spinBtn = document.getElementById('spinBtn');
const resetBtn = document.getElementById('resetBtn');
const message = document.getElementById('message');
const winnerList = document.getElementById('winnerList');
const sidebarNames = document.getElementById('sidebarNames');

const canvas = document.getElementById('wheelCanvas');
const ctx = canvas.getContext('2d');
const radius = canvas.width / 2;

function renderNames() {
  sidebarNames.innerHTML = '';
  names.forEach((name) => {
    const li = document.createElement('li');
    li.textContent = name;
    sidebarNames.appendChild(li);
  });
}

function renderWinners() {
  winnerList.innerHTML = '';
  winners.forEach(name => {
    const li = document.createElement('li');
    li.textContent = name;
    winnerList.appendChild(li);
  });
}

addNameBtn.addEventListener('click', () => {
  const name = nameInput.value.trim();
  if(name && !names.includes(name) && !winners.includes(name)) {
    names.push(name);
    localStorage.setItem('names', JSON.stringify(names));
    nameInput.value = '';
    renderNames();
    drawWheel();
  }
});

resetBtn.addEventListener('click', () => {
  if(confirm('Reset all names and winners?')) {
    names = [];
    winners = [];
    localStorage.setItem('names', JSON.stringify(names));
    localStorage.setItem('winners', JSON.stringify(winners));
    renderNames();
    renderWinners();
    drawWheel();
    message.textContent = '';
  }
});

function drawWheel(rotation = 0) {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  if(names.length === 0) return;

  const segmentAngle = 2 * Math.PI / names.length;

  for(let i=0;i<names.length;i++){
    const start = i * segmentAngle + rotation;
    const end = start + segmentAngle;

    ctx.fillStyle = `hsl(${i * (360/names.length)},70%,60%)`;
    ctx.beginPath();
    ctx.moveTo(radius, radius);
    ctx.arc(radius, radius, radius, start, end);
    ctx.fill();
    ctx.closePath();

    ctx.save();
    ctx.translate(radius, radius);
    ctx.rotate(start + segmentAngle/2);
    ctx.textAlign = "right";
    ctx.fillStyle = "#000";
    ctx.font = "bold 16px Arial";
    ctx.fillText(names[i], radius - 10, 0);
    ctx.restore();
  }

  ctx.beginPath();
  ctx.arc(radius, radius, 40, 0, 2*Math.PI);
  ctx.fillStyle = "#fff";
  ctx.fill();
  ctx.stroke();
}

spinBtn.addEventListener('click', () => {
  if(names.length === 0){
    message.textContent = "No names left to spin!";
    return;
  }

  let rotation = 0;
  let spinVelocity = Math.random() * 0.3 + 0.3;
  let deceleration = 0.995;

  message.textContent = "";

  function animate(){
    if(spinVelocity < 0.002){
      const segmentAngle = 2 * Math.PI / names.length;
      const selectedIndex = Math.floor(((2*Math.PI - (rotation % (2*Math.PI))) % (2*Math.PI)) / segmentAngle);
      const winner = names[selectedIndex];
      
      winners.push(winner);
      names.splice(selectedIndex,1);
      localStorage.setItem('names', JSON.stringify(names));
      localStorage.setItem('winners', JSON.stringify(winners));

      renderNames();
      renderWinners();
      drawWheel();

      message.textContent = `🎉 Congrats ${winner} won the prize! 🎉`;

      let duration = 3000;
      let end = Date.now() + duration;

      (function frame() {
        confetti({
          particleCount: 5,
          angle: Math.random() * 360,
          spread: 60,
          origin: { x: Math.random(), y: Math.random() * 0.6 },
          colors: ['#ff0a54','#ff477e','#ff85a1','#fbb1b1','#f9bec7']
        });
        if (Date.now() < end) {
          requestAnimationFrame(frame);
        }
      }());

      if(names.length === 0){
        message.textContent += " All names have won!";
      }
      return;
    }

    rotation += spinVelocity;
    spinVelocity *= deceleration;
    drawWheel(rotation);
    requestAnimationFrame(animate);
  }

  animate();
});

// Initial render
renderNames();
renderWinners();
drawWheel();
</script>
</body>
</html>
			
							
			
@endsection