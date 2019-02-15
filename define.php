<?php

define('DS', DIRECTORY_SEPARATOR);
define('URL', str_replace("index.php","",
  (isset($_SERVER['HTTPS']) ? "https" : "http"  ) . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]" )
);

define('REMEMBER_COOKIE_EXPIRY',900000);

// Time Zone Damascus
date_default_timezone_set('Asia/Damascus');


?>
