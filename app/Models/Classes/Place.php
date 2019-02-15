<?php

require_once('ORM.php');

class Place {

  private $id ;
  private $_country ;
  private $_town;
  private $_sector ;
  private $_location ; // ex : the name of school

  // https://stackoverflow.com/questions/10053358/measuring-the-distance-between-two-coordinates-in-php
  private $_GPS_Lat;
  private $_GPS_Lon;



  public function __construct($place = null){
    if($place == null ) return ;
    $this->id        = $place->id;
    $this->_country  = $place->_country;
    $this->_town     = $place->_town;
    $this->_sector   = $place->_sector;
    $this->_location = $place->_location;
    $this->_GPS_Lat  = $place->_GPS_Lat;
    $this->_GPS_Lon  = $place->_GPS_Lon;
  }


  public function ORMobj(){

    if($this->id) $obj = ORM::getORMobj('place',$this->id);
    else  $obj = ORM::newORMobj('place');

    $obj->_country   =  $this->_country ;
    $obj->_town      =  $this->_town  ;
    $obj->_sector    =  $this->_sector  ;
    $obj->_location  =  $this->_location ;
    $obj->_GPS_Lat   =  $this->_GPS_Lat ;
    $obj->_GPS_Lon   =  $this->_GPS_Lon ;

    return $obj;
  }


  // SETTERS
  public function setId($id){ return $this->id = $id;}
  public function setCountry($country){ $this->_country = $country; }
  public function setTown($town){ $this->_town = $town; }
  public function setSector($sector){ $this->_sector = $sector; }
  public function setLocation($location){ $this->_location = $location; }
  public function setGPS_Lat($GPS_Lat){ $this->_GPS_Lat = $GPS_Lat; }
  public function setGPS_Lon($GPS_Lon){ $this->_GPS_Lon = $GPS_Lon; }


  // GETTERS
  public function getId(){ return $this->id;}
  public function getCountry(){ return $this->_country;}
  public function getTown() { return $this->_town;}
  public function getSector(){  return $this->_sector;}
  public function getLocation(){  return $this->_sector;}
  public function getGPS_Lat(){ return $this->_GPS_Lat;}
  public function getGPS_Lon(){ return $this->_GPS_Lon;}


}


?>
