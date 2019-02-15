<?php

require_once('Classes'.DS.'ORM.php');

abstract Class Model {

  function addObj($obj){
    return ORM::addObj($obj);
  }

  function getAll($class){
    return ORM::getAll($class);
  }

  function get($class,$value,$attribute = null){
    return ORM::get($class,$value,$attribute);
  }

  function update($obj){
    return ORM::update($obj);
  }

  function delete($obj){
    return ORM::delete($obj);
  }


}

?>
