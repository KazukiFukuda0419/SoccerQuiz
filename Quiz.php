<?php
namespace MyApp;

class Quiz{

    private $_quizSet = [];
    public function __construct(){

      $this->_setup();
      Token::create();

       if(!isset($_SESSION['current_num'])){
         $this->_initSession();
       }
    }

    private function _initSession(){
      $_SESSION['current_num'] = 0;
      $_SESSION['correct_count'] = 0;
    }

    public function checkAnswer(){
      Token::validate('token');

      $correctAnswer = $this->_quizSet[$_SESSION['current_num']]['a'][0];

      if(!isset($_POST['answer'])){
        throw new \Exception('answer not set!');
      }
      if((String)$correctAnswer === (String)$_POST['answer']){
        $_SESSION['correct_count']++;
        // 正解数を一増やしている
      }
      $_SESSION['current_num']++;
      return $correctAnswer;
        // 解答した数を一増やしている
    }

    public function isFinished(){
      return count($this->_quizSet) === $_SESSION['current_num'];
    }

    public function getScore(){
       $_SESSION['score'] = $_SESSION['correct_count'] / count($this->_quizSet) * 100 ;
       // $_SESSION['score'] = round(intdiv($_SESSION['correct_count'],count($this->_quizSet)) * 100);
       $this->saveScore();
       return $_SESSION['score'];
    }
    public function isLast(){
      return count($this->_quizSet) === $_SESSION['current_num'] + 1;
    }
    public function saveScore(){
      $userModel = new \MyApp\Model();
      $userModel->save();
    }

    public function reset(){
     $this->_initSession();
    }

    public function getCurrentQuiz(){
      return $this->_quizSet[$_SESSION['current_num']];
    }

    private function _setup(){

      $this->_quizSet[] = [
        'q' => 'Who is Messi',
        'a' => ['messi','A1','A2']
      ];
      $this->_quizSet[] = [
        'q' => 'Who is C•Ronaldo',
        'a' => ['ronaldo','B1','B2']
      ];
      $this->_quizSet[] = [
        'q' => 'Who is Neymar',
        'a' => ['neymar','C1','C2']
      ];
      $this->_quizSet[] = [
        'q' => 'Who is Suarez',
        'a' => ['suarez','D1','D2']
      ];
      $this->_quizSet[] = [
        'q' => 'Who is Kagawa Shinji',
        'a' => ['kagawa','E1','E2']
      ];
      // 一番最初が正解とする。
    }
}

 ?>
