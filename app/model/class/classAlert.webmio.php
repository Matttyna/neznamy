<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Alert
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Alert {
    
    private $table;

    function __construct($table) {
      $this->table = $table;
    }
    
    function getContent($language, $id) {
      $table = $this->table;
      
      $result = dibi::query("SELECT content FROM $table WHERE %and", array(array('language = %s', $language), array('id_text = %s', $id)));
      foreach ($result as $row) {
        $var = $row[content];
      }
      
      unset($result);
      return $var;
    }
    
    function getTitle($language, $id) {
      $table = $this->table;
      
      $result = dibi::query("SELECT title FROM $table WHERE %and", array(array('language = %s', $language), array('id_text = %s', $id)));
      foreach ($result as $row) {
        $var = $row[title];
      }
      
      unset($result);
      return $var;    
    }
    
    function getType($language, $id) {
      $table = $this->table;
      
      $result = dibi::query("SELECT type FROM $table WHERE %and", array(array('language = %s', $language), array('id_text = %s', $id)));
      foreach ($result as $row) {
        $var = $row[type];
      }
      
      unset($result);
      return $var;    
    }    

    function view($language, $id) {
      echo '<div class="alert_' . $this->getType($language, $id) . '">' . $this->getTitle($language, $id) . ' ' . $this->getContent($language, $id) . '</div>';
    }
    
  }