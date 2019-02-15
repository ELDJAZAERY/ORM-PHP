<?php

require_once('app'.DS.'Views'.DS.'View.php');
require_once('app'.DS.'Models'.DS.'SysManager.php');
require_once('app'.DS.'Models'.DS.'Classes'.DS.'ORM.php');
require_once('app'.DS.'Models'.DS.'Classes'.DS.'Prof.php'  );
require_once('app'.DS.'Models'.DS.'Classes'.DS.'Admin.php' );
require_once('app'.DS.'Models'.DS.'Classes'.DS.'Course.php');
require_once('app'.DS.'Models'.DS.'Classes'.DS.'Place.php' );


class AdminController {

    private $_sysManager ;
    private $_view ;
    private $_session;


    public function __construct($url){
      $this->_sysManager = new SysManager();
      $this->execut($url);
    }

    private function execut($url){

      if(isset($url[1]) && strtolower($url[1]) == 'login'){
        return $this->login();
      }

      if(isset($url[1]) && strtolower($url[1]) == 'logout'){
        return $this->logout();
      }

      if(isset($url[1]) && strtolower($url[1]) == 'add-course'){
        return $this->add_course();
      }

      if(isset($url[1]) && strtolower($url[1]) == 'delete-course'){
        return $this->delete_course();
      }

      if(isset($url[1]) && strtolower($url[1]) == 'add-prof'){
        return $this->add_prof();
      }

      if(isset($url[1]) && strtolower($url[1]) == 'delete-prof'){
        return $this->delete_prof();
      }


      if(isset($url[1]) && strtolower($url[1]) == 'add-admin'){
        return $this->add_admin();
      }

      if(isset($url[1]) && strtolower($url[1]) == 'delete-admin'){
        return $this->delete_admin();
      }

      // default
      $this->control();

    }


    private function sessionValide($superAdmin = null){
      $this->_view = new View('Login');
      $this->_view->generate(array());
      return false;
    }

    private function Control(){
      if(!$this->sessionValide()) return;
      $this->_view = new View('Control');
      $this->_view->generate(array());
    }

    private function login(){
      $this->_view = new View('Control');
      $this->_view->generate(array());

      /*
      // laissons le salt initialisé par PHP
      $hashed_password = crypt('mypassword');

      /*
        Il vaut mieux passer le résultat complet de crypt() comme salt nécessaire
        pour le chiffrement du mot de passe, pour éviter les problèmes entre les
        algorithmes utilisés (comme nous le disons ci-dessus, le chiffrement
        standard DES utilise un salt de 2 caractères, mais un chiffrement
        MD5 utilise un salt de 12).

      if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
         echo "Mot de passe correct !";
      }


      */



    }

    private function logout(){
      if(!$this->sessionValide()) return;
      $this->_view = new View('Control');
      $this->_view->generate(array());
    }

    private function add_course(){
      /*

      if(isset($_POST['myCheckbox']) && $_POST['myCheckbox'] == 'Yes')
      {
      $myboxes = $_POST['myCheckbox'];
        if(empty($myboxes))
        {
          echo("You didn't select any boxes.");
        }
        else
        {
          $i = count($myboxes);
          echo("You selected $i box(es): <br>");
          for($j = 0; $j < $i; $j++)
          {
            echo $myboxes[$j] . "<br>";
          }
        }
      }

      */
      if(!$this->sessionValide()) return;
      $this->_view = new View('Control');
      $this->_view->generate(array());
    }

    private function delete_course(){
      if(!$this->sessionValide()) return;
      $this->_view = new View('Control');
      $this->_view->generate(array());
    }

    private function add_prof(){
      if(!$this->sessionValide()) return;


      $firstname = $this->getData($_POST['firstname']);
      $lasname   = $this->getData($_POST['lastname']);
      $birthdate = date('Y-m-d', strtotime($this->getData($_POST['birthdate'])));
      $cv        = $this->getData($_POST['cv']);

      $prof = new Prof();
      $prof->setFirstName($firstname);
      $prof->setLastName($lasname);
      $prof->setBirthDate($birthdate);
      $prof->setCV($cv);

      $this->_sysManager->addProf($prof);

      $this->_view = new View('Control');
      $this->_view->generate(array());
    }

    private function delete_prof(){
      if(!$this->sessionValide()) return;
      $this->_view = new View('Control');
      $this->_view->generate(array());
    }

    private function add_admin(){
      if(!$this->sessionValide(true)) return;


      $firstname = $this->getData($_POST['firstname']);
      $lasname   = $this->getData($_POST['lastname']);
      $birthdate = new dateTime($this->getData($_POST['birthdate']));
      $username  = $this->getData($_POST['username']);
      $password  = crypt($this->getData($_POST['password']),CRYPT_BLOWFISH);

      // if(isset($_POST['myCheckbox']) && $_POST['myCheckbox'] == 'Yes')

      $admin = new Admin();
      $admin->setFirstName($firstname);
      $admin->setLastName($lasname);
      $admin->setBirthDate($birthdate);
      $admin->setLoginName($username);
      $admin->setPassword($password);
      //$admin->superAdmin(true);

      echo '<pre>';
      print_r($admin);

      echo $this->_sysManager->addAdmin($admin);


      $this->_view = new View('Control');
      $this->_view->generate(array());
    }

    private function delete_admin(){
      // session of Supper Admin sessionValide(true)
      if(!$this->sessionValide(true)) return;

      $username  = $this->getData($_POST['username']);
      if( isset($username) && $this->_sysManager->getAdmin($username,'_login_name') ){
        $this->_view = new View('Control');
        $this->_view->generate(array());
      }else{

      }
    }


  function getData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


}



?>
