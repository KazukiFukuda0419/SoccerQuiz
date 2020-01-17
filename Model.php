<?php
namespace MyApp;

class Model{
  protected $db;

  public function __construct(){
   try{
      $this->db = new \PDO(DSN,DB_USERNAME,DB_PASSWORD);
      //DSN,DB_USERNAME,DB_PASSWORDこれらの定数を定義しなけらばならない
    }catch(\PDOException $e){
       echo $e->getMessege();
       exit;

     }
  }
  public function save(){
      $stmt = $this->db->prepare("insert into users (username,score)
      values (:username,:score)");
      $res = $stmt->execute([
        ':username' => $_SESSION['username'],
        ':score' => $_SESSION['score']
      ]);
      $_SESSION['current_num'] = 0;
      $_SESSION['correct_count'] = 0;
  }

  public function getScoreAll(){
     $stmt = $this->db->query("select * from users order by score desc limit 10");
     //スコアの大きいもの順に成績を並べる。
     $stmt->setFetchMode(\PDO::FETCH_ASSOC);
     return $stmt->fetchAll();
  }

}

 ?>
