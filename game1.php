<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>✨ Eryan King</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    html, body {
      height: 100%;
      overflow-x: hidden;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to bottom right, #1c1c2c, #3c2a70);
      color: #f5f5f5;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 12px;
    }
    h1 {
      font-size: 1.6rem;
      color: #ffd700;
      text-shadow: 0 0 10px #fff, 0 0 20px #ff0;
      margin-bottom: 4px;
    }
    .top-feedback {
      text-align: center;
      margin-bottom: 10px;
    }
    #resultText {
      font-weight: bold;
      font-size: 18px;
      color: #ffd700;
    }
    #multiplierText {
      font-weight: bold;
      font-size: 16px;
      color: #ffffff;
    }
    .betbar, .topbar, .controls {
      display: flex;
      justify-content: center;
      gap: 10px;
      flex-wrap: wrap;
    }
    .betbar input, .betbar select, .topbar button, .controls button {
      padding: 6px 10px;
      border: none;
      border-radius: 6px;
      font-size: 14px;
    }
    .betbar input, .betbar select {
      background: #333;
      color: #fff;
    }
    .topbar button, .controls button {
      background-color: #444;
      color: #fff;
      cursor: pointer;
    }
    .topbar div {
      background: rgba(255, 255, 255, 0.1);
      padding: 6px 10px;
      border-radius: 6px;
      font-weight: bold;
    }
    .grid {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 8px;
      width: 320px;
      height: 320px;
      position: relative;
      overflow: hidden;
    }
    .cell {
      width: 56px;
      height: 56px;
      background: #fff;
      border-radius: 12px;
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      line-height: 56px;
      color: #000;
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
    }
    .cell.show {
      animation: dropIn 0.5s ease forwards;
    }
    @keyframes dropIn {
      0% {
        transform: translateY(-100px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }
    .scatter {
      background: #ff4081;
      color: #fff;
      box-shadow: 0 0 10px #ff80ab;
      transition: all 0.3s ease;
      animation: scatterBlink 0.8s infinite alternate;
    }
    @keyframes scatterBlink {
      from { transform: scale(1); }
      to { transform: scale(1.1); }
    }
    .wild {
      background: #40c4ff;
      color: #000;
      box-shadow: 0 0 10px #80d8ff;
    }
    #modalOverlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.7);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 999;
    }
    #modalBox {
      background: #fff;
      color: #000;
      padding: 25px 35px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
      animation: popFade 0.4s ease-out;
    }
    @keyframes popFade {
      from { transform: scale(0.7); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }
    #modalBox h2 {
      margin-top: 0;
      color: #4caf50;
    }
    #modalBox button {
      padding: 10px 24px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      background-color: #4caf50;
      color: white;
      cursor: pointer;
      margin-top: 15px;
    }

     @media (max-width: 480px) {
  h1 {
    font-size: 1.3rem;
  }

  .grid {
    width: 90vw;
    height: 90vw;
  }
}

  </style>
</head>
<body>
  <h1>✨ Eryan King</h1>
  <div class="top-feedback">
    <p id="resultText">😲 Belum menang</p>
    <p id="multiplierText"></p>
  </div>
  <div class="betbar">
    <label>🎯 Bet:
      <input type="number" id="betAmount" value="500" min="100" step="100" />
    </label>
    <label>🌯️ Jumlah Spin:
      <select id="spinCount">
        <option value="1">1x</option>
        <option value="10">10x</option>
        <option value="25">25x</option>
        <option value="50">50x</option>
      </select>
    </label>
    <label>⚡ Turbo:
      <button onclick="toggleTurbo()" id="turboBtn">OFF</button>
    </label>
  </div>
  <div class="topbar">
    <div>💰 Kredit: <span id="kredit">10000</span></div>
    <div>🔁 Free Spin: <span id="freeSpin">0</span></div>
    <div>🔊 Suara:
      <button id="soundToggle" onclick="toggleSound()">ON</button>
    </div>
  </div>
  <div id="slotGrid" class="grid"></div>
  <div class="controls">
    <button id="spinBtn" onclick="startSpin()">🎰 SPIN</button>
    <button id="autoBtn" onclick="toggleAuto()">♾️ AUTO: <span id="autoStatus">OFF</span></button>
    <button onclick="resetGame()">🔄 RESET</button>
  </div>
  <div id="modalOverlay">
    <div id="modalBox">
      <h2>🎉 Free Spin Diperoleh!</h2>
      <p>Kamu mendapatkan 5 Free Spin dari simbol Scatter!</p>
      <button onclick="tutupModal()">OK</button>
    </div>
  </div>
  <script>
    // JavaScript interaktivitas bisa dilanjutkan di bagian ini
  </script>
</body>
</html>

  <script>
  const rowCount = 5;
  const colCount = 5;
  const symbols = ["🍒", "🍋", "🍇", "⭐", "💥"];
  let kredit = 10000;
  let freeSpin = 0;
  let turbo = false;
  let isSpinning = false;
  const slotGrid = document.getElementById("slotGrid");
  const kreditEl = document.getElementById("kredit");
  const freeSpinEl = document.getElementById("freeSpin");
  const resultText = document.getElementById("resultText");
  const multiplierText = document.getElementById("multiplierText");

  function toggleTurbo() {
    turbo = !turbo;
    document.getElementById("turboBtn").textContent = turbo ? "ON" : "OFF";
  }

  function toggleSound() {
    const btn = document.getElementById("soundToggle");
    btn.textContent = btn.textContent === "ON" ? "OFF" : "ON";
  }

  function resetGame() {
    kredit = 10000;
    freeSpin = 0;
    updateUI();
  }

  function updateUI() {
    kreditEl.textContent = kredit;
    freeSpinEl.textContent = freeSpin;
  }

  function startSpin() {
    if (isSpinning) return;
    isSpinning = true;

    const bet = parseInt(document.getElementById("betAmount").value);
    const spinCount = parseInt(document.getElementById("spinCount").value);
    let currentSpin = 0;

    function doNextSpin() {
      if (currentSpin >= spinCount || kredit < bet) {
        isSpinning = false;
        return;
      }

      kredit -= bet;
      animateSpin(bet, () => {
        currentSpin++;
        if (turbo) {
          doNextSpin();
        } else {
          setTimeout(doNextSpin, 1500); // Jeda antar spin saat turbo OFF
        }
      });
    }

    doNextSpin();
  }

  function animateSpin(bet, callback) {
    slotGrid.innerHTML = "";
    const hasil = [];
    let scatterCount = 0;
    const menangChance = Math.random();
    const menang = menangChance < 0.6;
    const symbolMenang = symbols[Math.floor(Math.random() * symbols.length)];

    for (let i = 0; i < rowCount * colCount; i++) {
      let symbol = symbols[Math.floor(Math.random() * symbols.length)];
      if (menang && i < 12) symbol = symbolMenang;
      if (symbol === "💥" && scatterCount >= 2) symbol = "🍇";
      if (symbol === "💥") scatterCount++;
      hasil.push(symbol);
    }

    hasil.forEach((symbol, index) => {
      const cell = document.createElement("div");
      cell.className = "cell";
      cell.textContent = symbol;
      const row = Math.floor(index / colCount);
      const col = index % colCount;
      cell.style.left = `${col * 65}px`;
      cell.style.top = `${row * 65}px`;
      if (symbol === "💥") cell.classList.add("scatter");
      if (symbol === "⭐") cell.classList.add("wild");
      slotGrid.appendChild(cell);
      setTimeout(() => {
        cell.classList.add("show");
      }, turbo ? 0 : 20 * index);
    });

    setTimeout(() => {
      if (menang) {
        const multiplier = Math.floor(Math.random() * 5) + 3;
        const kemenangan = bet * multiplier;
        kredit += kemenangan;
        resultText.textContent = `🎉 Menang dengan simbol ${symbolMenang}`;
        multiplierText.textContent = `💰 +Rp ${kemenangan}`;
      } else {
        resultText.textContent = "😢 Belum menang";
        multiplierText.textContent = "";
      }

      if (scatterCount >= 3) {
        freeSpin += 5;
        freeSpinEl.textContent = freeSpin;
        document.getElementById("modalOverlay").style.display = "flex";
      }

      updateUI();
      if (callback) callback();
    }, turbo ? 400 : 1300);
  }

  function tutupModal() {
    document.getElementById("modalOverlay").style.display = "none";
  }
</script>

</body>
</html>