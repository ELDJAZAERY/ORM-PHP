<?php
require_once('app'.DS.'Views'.DS.'View.php');


class Router {

    private $_ctr;
    private $_view;


  // Route une requête entrante : exécute l'action associée
  public function routerRequete() {
    try {

        $url= '';

        if(isset($_GET['url'])){
            $url = explode('/',filter_var($_GET['url'],FILTER_SANITIZE_URL));

            if(isset($url[0]) && strtolower($url[0]) == 'src') {
              echo("<script>history.replaceState({},'src','404');</script>");
            }


            $controller =  ($url[0]!=='') ?  ucfirst(strtolower($url[0])) : 'Home' ;
            $controllerClass = $controller.'Controller';
            $controllerFile = 'app'.DS.'Controllers'.DS.$controllerClass.'.php';


            if(file_exists($controllerFile)){
                require_once($controllerFile);
                $this->_ctr = new $controllerClass($url);
            }else throw new Exception('Page introuvable !! ');
        }else{
            require_once('Controllers'.DS.'HomeController.php');
            $this->_ctr = new HomeController($url);
        }
    }
    catch (Exception $e) {
      $this->_view = new View('404');
      $this->_view->generate(array('errorMessage' => $e->getmessage()));
      echo $e;
    }
  }


  private function allowAccess($url){
      print_r($url);
  }




}
?>
