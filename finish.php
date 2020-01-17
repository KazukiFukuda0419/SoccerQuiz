<?php

require_once(__DIR__.'/config.php');


$quiz = new MyApp\Quiz();
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="utf-8">
   <title>Soccer Quiz</title>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div id="result">
            Your score is ...
            <div><?= h($quiz->getScore());?>点</div>
            <a href="index.php"><div id="btn">Replay<div></a>
            <a href="ranking.php"><div id="btn">ランキングを見る<div></a>
        </div>
    </div>
</body>
</html>
