<?php

require_once('config.php');
require_once('InvalidUsername.php');

$username = '';
MyApp\Token::createNameToken();
MyApp\Token::create();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try{
      MyApp\Token::validate('nameToken');
    }catch(Exception $e){
      echo $e->getMessage();
      exit;
    }
    try{
          if(empty($_POST['username'])){
           $err = true;
           throw new \MyApp\InvalidUsername();
            // エラーを投げれるように改良した
           }
        }catch(Exception $e){
           echo $e->getMessage();
           exit;
        }
         //セッションusernameにユーザー名を保持しておく。
   $err = false;
   $_SESSION['username'] = $_POST['username'];
   $username = $_POST['username'];
}else{
   $_SESSION['username'] = "名無し";
}
$err = "";
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="utf-8">
   <title>Soccer Quiz</title>
   <link rel="stylesheet" href="styles.css">
   <script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
</head>
<body>
  <header>
        <ul class="menu">
            <li class="menu__single">
                <a href="#" class="init-bottom">Menu</a>
                <ul class="menu__second-level">
                    <li><a href="#">ランキング</a></li>
                    <li><a href="#">掲示板</a></li>
                    <li><a href="#">管理人自己紹介</a></li>
                </ul>
            </li>
        <!-- 他グローバルナビメニュー省略 -->
        </ul>
  </header>
      <div class="container">
        <h1>サッカークイズへようこそ</h1>
            <div id="slideshow">
                 <img src="1561389169_941230_noticia_normal.jpg" alt="画像1" class="active">
                 <img src="aflo_752518290713.jpg" alt="画像2">
                 <img src="20191031_Keisuke-Honda-Gettyimages.jpg" alt="画像3">
                 <img src="pcimage.jpg" alt="画像4">
                 <img src="GettyImages-1174626586-500x350.jpg" alt="画像5">
            </div>
        <div class="description">
          <p>サイト説明</p>
          <p>このサイトは名前よりサッカー選手の写真を選んでもらうクイズをします。<br>写真は３枚出るので
          その中から一枚選んでください。<br>問題は、5問あります。難易度は「初級」「中級」「上級」の３つの
          モードから自分で選んでください。最後には正答率も出力されます。<br>さああなたは、全問制覇できるかな？</p>
        </div>
        <?php if(!empty($username)){ echo "ようこそ、{$username}さん"; } ?>
       <div class="form">
        <form action="" method="post">
          <?php if ($err) { echo "名前を入力してください。"; } ?>
          <input type="text" name="username" placeholder="名前を入力してください" value="名無し">
          <input type="submit" value="送信">
          <input type="hidden" name="nameToken" value="<?= h($_SESSION['nameToken']); ?>">
          <!-- //トークン入れる必要あり -->
        </form>
      </div>
           <div class="btnspace">
              <div id="btn"><a href="easy.php">初級</a></div>
              <div id="btn">中級</div>
              <div id="btn">上級</div>
          </div>
      </div>
  <footer>
     <p>&lt;C&gt;Kazuki Fukuda</p>
  </footer>
<!-- ↓スライドショーのjavascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  // var $btn = $('#btn');

function slideSwitch() {
   var $active = $('#slideshow img.active');


   if ( $active.length == 0 ) $active = $('#slideshow img:last');

   var $next =  $active.next().length ? $active.next()
      : $('#slideshow img:first');

   $active.addClass('last-active');

   $next.css({opacity: 0.0})
      .addClass('active')
      .animate({opacity: 1.0}, 1000, function() {
           $active.removeClass('active last-active');
      });
}
  $btn.addEventListener("click",function(){
   this.classList.add('btnclick');
 });
 </script>
 <script>
$(function() {
   setInterval( "slideSwitch()", 3000 );

   $('#btn').on("click",function() {
                $(this).css({transform: "rotateY(360deg)"});
            });
});
</script>
</body>
</html>
