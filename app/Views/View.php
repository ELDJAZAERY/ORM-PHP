<?php

class View {

  private $_file;
  private $_t;

  public function __construct($action){
      $this->_file = 'app'.DS.'Views'.DS.$action.'.php';
  }

  public function generate($data = null){
    $content = $this->generateFile($this->_file,$data);

    $view = $this->generateFile('app'.DS.'Views'.DS.'template.php',array(
      't' => $this->_t,
      'content' => $content
    ));

    echo $view;
  }

// generate file vue
  private function generateFile($file,$data = null){
    if(file_exists($file)){
      if($data !== null) extract($data);

      ob_start();
      require $file;
      return ob_get_clean();
    }else throw new Exception('File '.$file.' not Found ');

  }


}


?>
