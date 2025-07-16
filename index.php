<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>🎮 Arena Game</title>
  <style>
  * { box-sizing: border-box; }
  body {
    font-family: sans-serif;
    margin: 0;
    padding: 20px;
    background: #1a1a1a;
    color: white;
  }

  h1 {
    text-align: center;
    font-size: 2rem;
  }

  .tabs {
    text-align: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }

  .tabs button {
    margin: 5px;
    padding: 10px 20px;
    background: #444;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    font-size: 16px;
  }

  .tabs button:hover {
    background: #666;
  }

  .tabs button.active {
    background: #4CAF50;
  }

  .tab-content {
    display: none;
  }

  .tab-content.active {
    display: block;
  }

  iframe {
    width: 100%;
    max-width: 1000px;
    height: 800px;
    display: block;
    margin: 0 auto;
    border: none;
    border-radius: 10px;
  }

  /* 📱 Responsive untuk HP */
  @media (max-width: 768px) {
    body {
      padding: 12px;
    }

    h1 {
      font-size: 1.5rem;
    }

    .tabs button {
      padding: 10px;
      font-size: 14px;
    }

    iframe {
      height: 500px;
    }
  }

  @media (max-width: 480px) {
    h1 {
      font-size: 1.2rem;
    }

    .tabs {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .tabs button {
      width: 90%;
      font-size: 14px;
    }

    iframe {
      height: 420px;
    }
  }
</style>

  </style>
</head>
<body>

  <h1>🎮 Arena Game</h1>

  <div class="tabs">
    <button onclick="openTab(event, 'beranda')" class="active">🏠 Beranda</button>
    <button onclick="openTab(event, 'game1')">✨ Starlight Tumble</button>
    <button onclick="openTab(event, 'game2')">🚀 SpaceBurst</button>
  </div>

  <!-- BERANDA -->
  <div id="beranda" class="tab-content active">
    <p style="text-align:center">Silakan pilih game yang ingin dimainkan.</p>
  </div>

  <!-- GAME 1 -->
  <div id="game1" class="tab-content">
    <iframe src="game1.php"></iframe>
  </div>

  <!-- GAME 2 -->
  <div id="game2" class="tab-content">
    <iframe src="game2.php"></iframe>
  </div>

  <script>
    function openTab(evt, tabId) {
      const contents = document.querySelectorAll('.tab-content');
      const buttons = document.querySelectorAll('.tabs button');
      contents.forEach(div => div.classList.remove('active'));
      buttons.forEach(btn => btn.classList.remove('active'));

      document.getElementById(tabId).classList.add('active');
      evt.target.classList.add('active');
    }
  </script>

</body>
</html>
