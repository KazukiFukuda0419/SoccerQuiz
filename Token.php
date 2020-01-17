<?php

namespace MyApp;

class Token{
  static public function createNameToken(){
    if(empty($_SESSION['nameToken'])){
      $_SESSION['nameToken'] = bin2hex(openssl_random_pseudo_bytes(16));
      // 32桁の推測されにくい文字列をトークンに代入する
      // index.phpで名前入力の際のトークン生成
    }
  }

  static public function create(){
    if(empty($_SESSION['token'])){
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
      // 32桁の推測されにくい文字列をトークンに代入する
    }
  }
  static public function validate($tokenKey){
     if(
        !isset($_SESSION[$tokenKey])||
        !isset($_POST[$tokenKey])||
        $_SESSION[$tokenKey] !== $_POST[$tokenKey]
      ){
        throw new \Exception('invalid token!');
      }
  }
}
