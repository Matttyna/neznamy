<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Template
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Template {
    
    private $table;

    function __construct($table) {
      $this->table = $table;
    }

    function getTemplate($id) {
      $table = $this->table;
      
      $sql = dibi::query("SELECT file FROM $table WHERE [id] = %i", $id);
      foreach ($sql as $row) {
        $var = $row[file];
      }      

      unset($sql);
      return $var;

    }
    
    function view($section) {
      $char = array('{{', '}}');
      $substitute = array('', '');
      require_once 'app/templates/Section/' . str_replace($char, $substitute, $section) . '.webmio.php';
    }
    
    
  }