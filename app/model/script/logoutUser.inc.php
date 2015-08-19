<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: script logout.inc.php
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  if ($_GET['logout']) {
    unset($_SESSION);
    session_destroy();
    echo "<script type=\"text/javascript\">setTimeout(function(){ location.href='" . $page->getRewriteById($lng, 4) . "'; }, 0);</script>";
  }