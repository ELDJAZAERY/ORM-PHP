<?php


require_once('rb.php');
require_once('Prof.php');
require_once('Admin.php');
require_once('Place.php');
require_once('Course.php');

require_once('DBConfig.php');


class ORM {

  private static $_cnx = false ;

  static function init(){
    if(!self::$_cnx) R::setup("mysql:host=".DBConfig::$host.";dbname=".DBConfig::$DBName.";charset=utf8",DBConfig::$User,DBConfig::$Password);
    self::$_cnx = true;

  }

  static function addObj($obj,$att_unic =null,$vlaue = null){
    $class = get_class($obj);
    $table = strtolower($class);
    if($att_unic && $value && self::get($class,$value,$att_unic))
      throw new Exception('violonce  constraintes  SQL !! ');
    $obj->setId(R::store($obj->ORMobj()));
  }

  static function newORMobj($table){
    return R::getRedBean()->dispense($table);
  }

  static function getORMobj($table,$value,$attribute = null){
    if($attribute == null) $obj = R::load($table,$value);
    else $obj = R::findOne($table," $attribute = ? ",array($value));

    return $obj;
  }

  static function getAll($class,$attribute = null , $value = null ){
    $table = strtolower($class);
    if($attribute && $value )
      $ArrayStr = R::findAll($table," $attribute = ? ORDER BY id DESC LIMIT 1000 ",array($value));
    else
      $ArrayStr = R::findAll( $table , ' ORDER BY id DESC LIMIT 1000 ' );

    $ArrayObjs = array();

    foreach ($ArrayStr as $value) {
        $ArrayObjs[] = new $class($value);
    }

    return $ArrayObjs;
  }

  static function get($class,$value,$attribute = null){
    $table = strtolower($class);
    if($attribute == null) $str = R::load($table,$value);
    else $str = R::findOne($table," $attribute = ? ",array($value));

    $obj = new $class($str);
    return $obj;
  }


  static function update($obj){
    $table = strtolower(get_class($obj));
    $o = $obj->ORMobj();
    return R::store($o);
  }

  static function delete($obj){
    $table = strtolower(get_class($obj));
    $o = R::load($table,$obj->getId());
    return R::trash($o);
  }


  static function is_serialized($value, &$result = null) {
  	// Bit of a give away this one
  	if (!is_string($value))
  	{
  		return false;
  	}
  	// Serialized false, return true. unserialize() returns false on an
  	// invalid string or it could return false if the string is serialized
  	// false, eliminate that possibility.
  	if ($value === 'b:0;')
  	{
  		$result = false;
  		return true;
  	}
  	$length	= strlen($value);
  	$end	= '';
  	switch ($value[0])
  	{
  		case 's':
  			if ($value[$length - 2] !== '"')
  			{
  				return false;
  			}
  		case 'b':
  		case 'i':
  		case 'd':
  			// This looks odd but it is quicker than isset()ing
  			$end .= ';';
  		case 'a':
  		case 'O':
  			$end .= '}';
  			if ($value[1] !== ':')
  			{
  				return false;
  			}
  			switch ($value[2])
  			{
  				case 0:
  				case 1:
  				case 2:
  				case 3:
  				case 4:
  				case 5:
  				case 6:
  				case 7:
  				case 8:
  				case 9:
  				break;
  				default:
  					return false;
  			}
  		case 'N':
  			$end .= ';';
  			if ($value[$length - 1] !== $end[0])
  			{
  				return false;
  			}
  		break;
  		default:
  			return false;
  	}
  	if (($result = @unserialize($value)) === false)
  	{
  		$result = null;
  		return false;
  	}
  	return true;
  }




}

?>
