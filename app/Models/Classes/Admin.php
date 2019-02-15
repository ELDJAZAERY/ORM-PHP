<?php

require_once('Person.php');
require_once('ORM.php');

require_once('Session.php');
require_once('Cookie.php');

class Admin extends Person {

  private $_loginName;
  private $_password;
  private $_superAdmin = false;


  function __construct($person = null){
    if($person==null) {  $this->_courses = new SplObjectStorage; return;}
    $this->id          =  $person->id;
    $this->_firstName  =  $person->_firstName;
    $this->_lastName   =  $person->_lastName;
    $this->_loginName  =  $person->_loginName;
    $this->_password   =  $person->_password;
    $this->_superAdmin =  $person->_superAdmin;
    $this->_birthDate  =  new DateTime($person->_birthDate);

    if(ORM::is_serialized($person->_courses))
      $this->_courses    =  unserialize($person->_courses);
    else
      $this->_courses    =  $person->_courses;

  }


  public function ORMobj(){

    if($this->id) $obj = ORM::getORMobj('admin',$this->id);
    else  $obj = ORM::newORMobj('admin');

    $obj->_firstName   =  $this->_firstName ;
    $obj->_lastName    =  $this->_lastName  ;
    $obj->_birthDate   =  $this->_birthDate ;
    $obj->_loginName   =  $this->_loginName ;
    $obj->_password    =  $this->_password ;
    $obj->_superAdmin  =  $this->_superAdmin ;

    $obj->_courses     =  serialize($this->_courses);

    return $obj;
  }


  public function login($rememberMe = false){
      Session::set($this->$_loginName,$this->id);
      if($rememberMe){
        $hash = md5(uniqid() + rand(0,100));
        $user_agent = Session::uagent_no_version();
        Cookie::set($this->_loginName,$hash,REMEMBER_COOKIE_EXPIRY);
      }
  }

  // SETTERS
  public function setLoginName($loginName){ $this->_loginName = $loginName; }
  public function setPassword($Password){ $this->_password = $Password;}
  public function superAdmin($boolean){ $this->_superAdmin = $boolean;}

  // GETTERS
  public function getLoginName(){ return $this->_loginName;}
  public function getPassword(){ return $this->_password;}
  public function IsSuperAdmin(){ return $this->_superAdmin;}

}


?>
