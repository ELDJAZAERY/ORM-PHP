<?php

class Cookie {

  public static function exists($name){
    return isset($_COOKIE[$name]);
  }

  public static function get($name){
    return $_COOKIE[$name];
  }

  public static function set($name,$value,$expiry){
      return setcookie($name,$value,time()+$expiray,'/');
  }

  public static function delete($name){
    self::set($name,'',-1);
  }


}


?>
