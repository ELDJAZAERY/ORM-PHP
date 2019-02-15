<?php

abstract class Person {

  protected $id;
  protected $_firstName;
  protected $_lastName;
  protected $_birthDate;

  // Courses add By Admin   OR
  // Courses prof
  protected $_courses ;


  // SETTERS
  public function setId($id){ $this->id = $id; }
  public function setFirstName($firstName){ $this->_firstName = $firstName; }
  public function setLastName($lastName){ $this->_lastName = $lastName;}
  public function setBirthDate($birthDate){ $this->_birthDate = $birthDate;}
  public function setCourses($courses){ $this->_courses = $courses; }


  // GETTERS
  public function getId(){ return $this->id;}
  public function getFirstName(){ return $this->_firstName;}
  public function getLastName() { return $this->_lastName ;}
  public function getCourses(){ return $this->_courses;}
  public function getBirthDate(){ return $this->_birthDate->format('Y/m/d');}

  // add-remove Course
  public function addCourse($course){ $this->_courses->attach($course); }
  public function removeCourse($course){$this->_courses->detach($course);}


}


?>
