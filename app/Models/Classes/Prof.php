<?php

require_once('Person.php');
require_once('ORM.php');

class Prof extends Person {

  private $_cv;

  function __construct( $person = null ){
    if($person==null) { $this->_courses = new SplObjectStorage; return; }
      $this->id          =  $person->id;
      $this->_firstName  =  $person->_firstName;
      $this->_lastName   =  $person->_lastName;
      $this->_cv         =  $person->_cv;
      $this->_birthDate  =  new DateTime($person->_birthDate);

      if(ORM::is_serialized($person->_courses))
        $this->_courses    =  unserialize($person->_courses);
      else
        $this->_courses    =  $person->_courses;
  }


  public function ORMobj(){

    if($this->id) $obj = ORM::getORMobj('prof',$this->id);
    else  $obj = ORM::newORMobj('prof');

    $obj->_firstName   =  $this->_firstName ;
    $obj->_lastName    =  $this->_lastName  ;
    $obj->_birthDate   =  $this->_birthDate ;
    $obj->_cv          =  $this->_cv        ;

    $obj->_courses     =  serialize($this->_courses);

    return $obj;
  }


  // SETTERS
  public function setCV($cv){$this->_cv = $cv;}


  // GETTERS
  public function getCV(){return $this->_cv ;}


}


?>
