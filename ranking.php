<?php

require_once(__DIR__.'/config.php');

$app = new MyApp\Model();

$nameScore = $app->getScoreAll();
 ?>

 <!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="utf-8">
   <title>Soccer Quiz</title>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
 <h1>ランキング トップ10</h1>
     <table border="1">
        <tr>
          <th>ユーザーネーム</th>
          <th>スコア</th>
        </tr>
        <?php foreach($nameScore as $ns): ?>
          <tr>
            <td><?= h($ns['username']); ?></td>
            <td><?= h($ns['score']); ?></td>
          </tr>
        <?php endforeach; ?>
     </table>
     <a href="index.php"><div id="btn">Replay<div></a>
  <hr>
</body>
</html>
