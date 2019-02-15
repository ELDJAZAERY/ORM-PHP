<?php

require_once('Model.php');

require_once('Classes'.DS.'ORM.php');
require_once('Classes'.DS.'Prof.php'  );
require_once('Classes'.DS.'Admin.php' );
require_once('Classes'.DS.'Course.php');
require_once('Classes'.DS.'Place.php' );

class SysManager extends Model {

  function __construct(){
    ORM::init();
  }


  // Admin's Manager
  public function getAdmins($attribute = null , $value = null ){
    return $this->getAll('Admin',$attribute,$value);
  }

  public function getAdmin($value,$attribute = null){
    return $this->get('Admin',$value,$attribute);
  }

  public function addAdmin($obj){
    return $this->addObj($obj);
  }

  public function updateAdmin($obj){
    return $this->update($obj);
  }

  public function deleteAdmin($obj){
    return $this->delete($obj);
  }


  // Prof's Manager
  public function getProfs($attribute = null , $value = null ){
    return $this->getAll('Prof','prof',$attribute,$value);
  }

  public function getProf($value,$attribute = null){
    return $this->get('Prof','prof',$value,$attribute);
  }

  public function addProf($obj){
    return $this->addObj($obj);
  }

  public function updateProf($obj){
    return $this->update($obj);
  }

  public function deleteProf($obj){
    return $this->delete($obj);
  }


  // Course's Manager
  public function getCourses($attribute = null , $value = null ){
    return $this->getAll('Course',$attribute,$value);
  }

  public function getCourse($value,$attribute = null){
    return $this->get('Course',$value,$attribute);
  }

  public function addCourse($obj){
    return $this->addObj($obj);
  }

  public function updateCourse($obj){
    return $this->update($obj);
  }

  public function deleteCourse($obj){
    return $this->delete($obj);
  }


  // Place's Manager
  public function getPlaces($attribute = null , $value = null ){
    return $this->getAll('Places',$attribute,$value);
  }

  public function getPlace($value,$attribute = null){
    return $this->get('Places',$value,$attribute);
  }

  public function addPlace($obj){
    return $this->addObj($obj);
  }

  public function updatePlace($obj){
    return $this->update($obj);
  }

  public function deletePlace($obj){
    return $this->delete($obj);
  }


}


?>
