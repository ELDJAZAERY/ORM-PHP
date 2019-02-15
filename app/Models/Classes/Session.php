<?php

class Session {

  public static function exist($userName){
      return (isset($_SESSION[$userName]));
  }

  public static function get($userName){
    return $_SESSION[$userName];
  }

  public static function set($userName , $value){
     $_SESSION[$name] = $value;
  }

  public static function delete($userName){
    if(self::exist($userName)){
      unset($_SESSION[$userName]);
    }
  }


  public static function uagent_no_version(){
    $uagent = $_SESSION['HTTP_USER_AGENT'];
    $regx = '/\/[a-zA-Z0-9.]+/';
    $uagent = preg_replace($regx,'',$uagent);
    return $uagent;
  }


}

?>
