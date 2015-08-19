<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Language
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Language {
    
    private $table;

    function __construct($table) {
      $this->table = $table;
    }

    function isExist($language) {
      $table = $this->table;
      
      $result = dibi::query("SELECT * FROM $table WHERE [language] = %s", $language);

      if (count($result) == 1) {
        return TRUE;
      }
      else {
        return FALSE;
      }

      unset($result); 
    }   
  }