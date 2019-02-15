<?php

require_once('ORM.php');
require_once('Prof.php');
require_once('Admin.php');
require_once('Place.php');

class Course {

  private $id;
  private $_title;
  private $_prof;
  private $_admin;
  private $_place;
  private $_desc;
  private $_date_Begin;
  private $_date_End;


  function __construct($course = null ){
    if($course == null) {return;}

    $this->id          =  $course->id;
    $this->_title      =  $course->_title;
    $this->_date_Begin =  new DateTime($course->_date_Begin);
    $this->_date_End   =  new DateTime($course->_date_End);
    $this->_desc       =  $course->_desc;

    $this->_prof       =  ORM::get('Prof','prof',$course->_prof_id);
    $this->_admin      =  ORM::get('Admin','admin',$course->_admin_id);
    $this->_place      =  ORM::get('Place','place',$course->_place_id);

  }


  public function ORMobj(){

    if($this->id) $obj = ORM::getORMobj('course',$this->id);
    else  $obj = ORM::newORMobj('course');

    $obj->_title      =  $this->_title ;
    $obj->_date_Begin =  $this->_date_Begin  ;
    $obj->_date_End   =  $this->_date_End  ;
    $obj->_desc       =  $this->_desc  ;

    $obj->_prof       =  $this->_prof->ORMobj();
    $obj->_admin      =  $this->_admin->ORMobj();
    $obj->_place      =  $this->_place->ORMobj();


    return $obj;
  }


  // SETTERS
  public function setId($id){ return $this->id = $id;}
  public function setTitle($title){ $this->_title = $title; }
  public function setProf($prof){ $this->_prof = $prof; }
  public function setAdmin($admin){ $this->_admin = $admin; }
  public function setPlace($place){ $this->_place = $place; }
  public function setDateBegin($date_Begin){ $this->_date_Begin = $date_Begin; }
  public function setDateEnd($date_End){ $this->_date_End = $date_End; }
  public function setDesc($desc){ $this->_desc = $desc; }



  // GETTERS
  public function getId(){ return $this->id;}
  public function getTitle(){ return $this->_title;}
  public function getProf(){  return $this->_prof;}
  public function getAdmin(){ return $this->_admin;}
  public function getPlace(){ return $this->_place;}
  public function getDateBegin(){ return $this->_date_Begin;}
  public function getDateEnd(){ return $this->_date_End;}
  public function getDesc(){  return $this->_desc;}


}

?>
