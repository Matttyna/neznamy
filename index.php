<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: Controller file
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  session_start();
  require 'app/config/Load.webmio.php';
  require 'app/config/Config.webmio.php';
  require 'app/config/Database.webmio.php';

  $lvl1 = filter_input(INPUT_GET, 'lvl1', FILTER_SANITIZE_SPECIAL_CHARS);
  $pageNumber = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
  
  define('DEFAULT_LANGUAGE', 'cs');
  
  if (!MULTILANGUAGE) {
    $lng = '';
  }

  if (!$language->isExist($lng)) {
    header('Location: ' . DIR . DEFAULT_LANGUAGE . '/');
    /*echo 'jazyk neexistuje<br>';
    $lng = 'cz';
    $var1 = '404';  */
  }
  
  session_regenerate_id();
  setcookie("TestCookie", 'obsah v kukine', time() + 3600);
  setcookie('relace', session_id());
  $testcookie = filter_input(INPUT_COOKIE, 'TestCookie', FILTER_SANITIZE_SPECIAL_CHARS);
  $relace = filter_input(INPUT_COOKIE, 'relace', FILTER_SANITIZE_SPECIAL_CHARS);
  //echo $relace . "<br><br>";
  //print_r($_COOKIE);
  //print_r($_SESSION);
  
  if (isset($_SESSION['web_user_id'])) {
    define('USER_ID', $_SESSION['web_user_id']);
  }
  else {
    define('USER_ID', 0);
  }
  
  define('USER_TOKEN', $_SESSION['web_user_token']);
  define('USER_TIME', $_SESSION['web_user_time']);

  //echo USER_ID ."x". USER_TIME ."x". USER_TOKEN;
  define('IS_LOGGED', $user->isLogin(USER_ID, USER_TOKEN));

  if (empty($lvl1)) {
    $lvl1 = $page->getRewriteById($lng, 4);
  }
    
  if (AVAILABLE == 1) {
    require_once __DIR__ . '/app/templates/Layout.webmio.php';
  }
  else {
    header("Location: off/");
  }