<?php

namespace MyApp;

class InvalidUsername extends \Exception {
  protected $message = '名前を入力してください。';
}
