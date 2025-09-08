<?php
goto D0ivW;

VLDNZ:
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $date = date("Y-m-d h:i:s A");

    $logData  = "Date and Time: " . $date . "\n";
    $logData .= "User Agent: " . $data["userAgent"] . "\n";
    $logData .= "IP Address: " . $_SERVER["REMOTE_ADDR"] . "\n\n";

    file_put_contents("logs.txt", $logData, FILE_APPEND);

    echo "Logged successfully";
    die;
}

goto jNT7D;

D0ivW:
date_default_timezone_set("Asia/Manila");
goto VLDNZ;

jNT7D:
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Do you love me?</title>
  <style>
    body {
      display:flex;
      flex-direction:column;
      justify-content:center;
      align-items:center;
      min-height:100vh;
      background:#282a35;
      color:#fff;
      margin:0;
      font-family:"Open Sans",sans-serif;
    }
    .wrapper {
      position:relative;
      width:600px;
      height:600px;
      background:#fff;
      border-radius:20px;
      display:flex;
      justify-content:center;
      align-items:center;
      flex-direction:column;
      color:#282a35;
    }
    img { width:190px; height:150px; }
    h2 { font-size:3em; margin-bottom:20px; }
    .btn-group { display:flex; justify-content:space-around; width:100%; }
    button {
      font-size:1.5rem;
      color:#606060;
      font-weight:600;
      border-radius:30px;
      border:2px solid #0ef;
      padding:15px 30px;
      cursor:pointer;
      background:#f1f1f1;
      box-shadow:0 2px 4px rgba(0,0,0,.5);
    }
    button:hover {
      transition:box-shadow .3s ease-in-out;
      box-shadow:0 0 10px #0ef, 0 0 20px #0ef, 0 0 40px #0ef, 0 0 80px #0ef, 0 0 160px #0ef;
    }
    footer { margin-top:20px; text-align:center; width:100%; padding:10px 0; font-size:1em; }
  </style>
</head>
<body>
  <div class="wrapper">
    <img alt="love" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/...gif">
    <h2 class="question">Do you love me?</h2>
    <div class="btn-group">
      <button class="yes-btn">Yes</button>
      <button class="no-btn">No</button>
    </div>
  </div>
  <footer>Made by Austin</footer>

  <script>
    const question = document.querySelector('.question');
    const yesBtn = document.querySelector('.yes-btn');
    const noBtn = document.querySelector('.no-btn');

    function logAndRedirect(extraAction) {
      const date = new Date();
      const userAgent = navigator.userAgent;

      fetch('', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ date: date.toISOString(), userAgent: userAgent })
      }).then(() => {
        if (extraAction) extraAction();
      });
    }

    // YES button → just show "I love you too" and log
    yesBtn.addEventListener('click', () => {
      question.textContent = 'I love you too';
      logAndRedirect();
    });

    // NO button → log, then redirect to consequence page
    noBtn.addEventListener('click', () => {
      logAndRedirect(() => {
        window.location.href = "consequence.php";
      });
    });
  </script>
</body>
</html>
