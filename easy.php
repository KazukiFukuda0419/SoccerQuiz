<?php

require_once('config.php');



$quiz = new MyApp\Quiz();
// if($_SESSION['current_num'] >= 5){
//    $quiz->reset();
// }
var_dump($_SESSION['correct_count']);
var_dump($_SESSION['current_num']);

if(!$quiz->isFinished()){
  $data = $quiz->getCurrentQuiz();
  shuffle($data['a']);
}

 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="utf-8">
   <title>Soccer Quiz</title>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php if($quiz->isFinished()) :?>
      <h2>finished!</h2>
      <a href="finish.php">finished</a>
  <?php else: ?>
      <div class="container">
        <h1>Q.<?= h($data['q']); ?></h1>
        <ul>
         <?php foreach ($data['a'] as $a) :?>
           <div class="answer" data-name="<?= h($a); ?>">
             <img src="easy/<?=h($a); ?>.jpg" alt="<?= h($a); ?>の画像">
             <p></p>
           </div>
         <?php endforeach; ?>
        </ul>
        <div id="btn" class="disabled"><?=$quiz->isLast() ? 'Show Result': 'Next Question';?></div>
        <input type="hidden" id="token" value="<?= h($_SESSION['token']); ?>">
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="quiz.js"></script>
  <?php endif;?>


</body>
</html>
