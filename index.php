<?php
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="ja" onClick="counter(this)">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no" />
  <script src="../js/index.js" async></script>
  <script src="script.js"></script>
  <script src="../js/select.js"></script>
  <script src="../js/filter.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <link rel="stylesheet" type="text/css" href="../css/filter.css">
  <link rel="stylesheet" type="text/css" href="../css/log.css">
</head>
<body onLoad="timer()">
  <input type="button" id="backBtn" onclick="changeHidden()" value="?">

  <main id="main">
    <details id="filter">
      <summary id="result"></summary>
      <select name="categories">
        <option value="all">カテゴリー</option>
      </select>
      <select name="status">
        <option value="all">状態</option>
      </select>
    </details>

    <section id="log">
      <ul class="list">
        <?php require('log.php');?>
      </ul>
      <nav>
        <p id="description"></p>
        <p id="click">
          <u>CLICK</u>
          <b>0</b>
        </p>
        <p id="timer">
          <u>SESSION TIME</u>
          <time></time>
        </p>
        <p id="lastModified">
          <u>LAST MODIFIED</u>
          <time></time>
        </p>
      </nav>
    </section>
  </main>

  <main hidden>
    <article id="readme"></article>
    <nav>
      <p>
        Author <b id="author"></b><br/>
        Email <a id="email"></a>
      </p>
      <p id="links"></p>
    </nav>
  </main>

  <script type="text/javascript">
  function changeHidden() {
    const mainAll = document.querySelectorAll('main');
    mainAll.forEach(main => {
      if (main.hidden == false) {
        document.querySelector('#backBtn').value = "?";
        main.hidden = true;
      } else {
        document.querySelector('#backBtn').value = "×";
        main.hidden = false;
      }
    })
  }

  async function mainSection() {
    fetch('readme.md')
    .then(response => response.text())
    .then(innerText => {
      document.querySelector('#readme').innerText = innerText
    });
  }
  mainSection();

  let lastModified = document.querySelector('#lastModified time');
  lastModified.innerText = document.lastModified;
  </script>

  <script src="../js/click.js"></script>
  <script src="../js/timer.js"></script>
</body>
</html>
