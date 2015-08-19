<?php

/*
 * @package: Framework for Web Applications
 * 
 * part: Definition constants and options
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  ini_set("display_errors", 1);
  error_reporting(E_ERROR | E_WARNING);

  $server = strpos(__DIR__, 'xampp');

  if ($server === false) {
    define('DIR', 'http://' . $_SERVER[HTTP_HOST] . '/zasportuj/');
  }
  else {
    define('DIR', 'http://localhost/server00/ZASPORTUJ/');  
  }
  
  define('AVAILABLE', 1);
  define('MULTILANGUAGE', FALSE);
  define('PATH_CSS', DIR . 'www/css/');
  define('PATH_IMAGE', DIR . 'www/images/');
  define('PATH_JS', DIR . 'www/js/');
  define('PATH_PLUGIN', DIR . 'plugins/');  