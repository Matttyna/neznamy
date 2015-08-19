<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: Database connection
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  require 'plugins/Dibi/dibi.php';

  try {
    
    $server = strpos(__DIR__, 'xampp');

    if ($server === false) {
      dibi::connect(array(
        'driver'   => 'mysqli',
        'host'     => 'localhost',
        'username' => '35459_nogo',
        'password' => 'N0gO-SporT_2015',
        'database' => 'webmio_cz_nogo',
        'options'  => array(
          MYSQLI_OPT_CONNECT_TIMEOUT => 30
        ),
        'flags'    => MYSQLI_CLIENT_COMPRESS,
      ));
    }
    else {
      dibi::connect(array(
        'driver'   => 'mysqli',
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'db_zasportuj',
        'options'  => array(
          MYSQLI_OPT_CONNECT_TIMEOUT => 30
        ),
        'flags'    => MYSQLI_CLIENT_COMPRESS,
      ));
    }
  }
  catch (DibiException $e) {
    echo get_class($e), ': ', $e->getMessage(), "\n";
  }