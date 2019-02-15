<?php

require_once('app'.DS.'Views'.DS.'View.php');
require_once('app'.DS.'Models'.DS.'SysManager.php');



class HomeController {
    private $_sysManager ;
    private $_view ;

    public function __construct($url){

        if(isset($url) && count($url)>1)
          throw new Exception('Page introuvable !!');
        else
          $this->HomePage();
    }

    private function HomePage(){
      $this->_sysManager = new SysManager();
      //$users = $this->_sysManager->getUsers();
      $this->_view = new View('Home');
      //$this->_view->generate($users);
      $this->_view->generate(array());

    }

}



?>
