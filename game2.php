<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🚀 SpaceBurst</title>
 <style>
  * {
    box-sizing: border-box;
  }

  html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    height: 100%;
  }

  body {
    font-family: sans-serif;
    background: linear-gradient(to bottom, #020024, #090979, #00d4ff);
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 12px;
  }

  h1 {
    margin-bottom: 20px;
    font-size: 2rem;
    text-align: center;
  }

  #gameArea {
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid #fff;
    border-radius: 20px;
    padding: 25px;
    text-align: center;
    max-width: 400px;
    width: 100%;
    box-shadow: 0 0 12px rgba(255,255,255,0.2);
  }

  #multiplierDisplay {
    font-size: 48px;
    margin: 20px 0;
    transition: color 0.2s;
  }

  button {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    margin: 5px;
    width: 100%;
    max-width: 180px;
  }

  #startBtn {
    background-color: #4caf50;
    color: white;
  }

  #cashoutBtn {
    background-color: #ff5722;
    color: white;
  }

  input[type="number"] {
    width: 100px;
    padding: 6px;
    font-size: 16px;
    border-radius: 6px;
    border: none;
    background: #222;
    color: #fff;
  }

  p {
    margin: 8px 0;
    font-size: 16px;
  }

  #result {
    margin-top: 12px;
    font-weight: bold;
  }

  /* 📱 Responsive untuk HP */
  @media (max-width: 480px) {
    h1 {
      font-size: 1.5rem;
    }

    #multiplierDisplay {
      font-size: 36px;
    }

    input[type="number"] {
      width: 80px;
      font-size: 14px;
    }

    button {
      font-size: 14px;
      padding: 8px 14px;
    }

    p {
      font-size: 14px;
    }

    #gameArea {
      padding: 20px;
    }
  }
</style>

</head>
<body>
  <h1>🚀 SpaceBurst</h1>
  <div id="gameArea">
    <p>Kredit: <span id="kredit">10000</span></p>
    <p>Taruhan: <input type="number" id="betInput" value="500" min="100" step="100"></p>
    <div id="multiplierDisplay">x0.00</div>
    <button id="startBtn">Mulai</button>
    <button id="cashoutBtn" disabled>Ambil Uang</button>
    <p id="result"></p>
  </div>

  <script>
    let kredit = 10000;
    let multiplier = 0.00;
    let interval;
    let running = false;
    let cashedOut = false;
    let crashAt = 0;

    const kreditEl = document.getElementById("kredit");
    const multiplierEl = document.getElementById("multiplierDisplay");
    const resultEl = document.getElementById("result");
    const betInput = document.getElementById("betInput");
    const startBtn = document.getElementById("startBtn");
    const cashoutBtn = document.getElementById("cashoutBtn");

    function updateKredit() {
      kreditEl.textContent = kredit;
    }

    function startGame() {
      if (running) return;
      let bet = parseInt(betInput.value);
      if (kredit < bet || bet <= 0) {
        alert("Kredit tidak cukup!");
        return;
      }

      kredit -= bet;
      updateKredit();
      multiplier = 0.00;
      multiplierEl.textContent = `x${multiplier.toFixed(2)}`;
      multiplierEl.style.color = "white";
      resultEl.textContent = "";
      cashoutBtn.disabled = false;
      running = true;
      cashedOut = false;
      startBtn.disabled = true;

      crashAt = parseFloat((Math.random() * 4 + 1.5).toFixed(2)); // antara 1.5x - 5.5x

      interval = setInterval(() => {
        multiplier += 0.05;
        multiplierEl.textContent = `x${multiplier.toFixed(2)}`;

        if (multiplier.toFixed(2) >= crashAt) {
          clearInterval(interval);
          multiplierEl.style.color = "red";
          if (!cashedOut) {
            resultEl.textContent = `❌ Meledak di x${crashAt}! Uang hangus.`;
          } else {
            resultEl.textContent += ` | 💥 Meledak di x${crashAt}`;
          }
          cashoutBtn.disabled = true;
          startBtn.disabled = false;
          running = false;
        }
      }, 100);
    }

    function cashOut() {
      if (!running || cashedOut) return;

      let bet = parseInt(betInput.value);
      const hasil = Math.floor(bet * multiplier);
      kredit += hasil;
      updateKredit();
      resultEl.textContent = `🎉 Uang berhasil diambil: Rp ${hasil}`;
      cashedOut = true;
      cashoutBtn.disabled = true;
    }

    startBtn.addEventListener("click", startGame);
    cashoutBtn.addEventListener("click", cashOut);
  </script>
</body>
</html>
