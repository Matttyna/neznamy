<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Content
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Content {

    private $table;

    function __construct($table) {
      $this->table = $table;
    }
    
    function getText($language, $id) {
      $table = $this->table;

      $sql = dibi::query("SELECT content FROM $table WHERE %and", array(array('id_text = %i', $id), array('language = %s', $language)));
      foreach ($sql as $row) {
        $var = htmlspecialchars_decode($row[content]);
      }
      
      unset($sql);
      return $var;
      
    }    
    
    function getTitle($language, $id) {
      $table = $this->table;

      $sql = dibi::query("SELECT title FROM $table WHERE %and", array(array('id_text = %i', $id), array('language = %s', $language)));
      foreach ($sql as $row) {
        $var = $row[title];
      }
      
      unset($sql);
      return $var;
      
    }
    
    function getTitleExt($language, $id) {
      $table = 'wm_texts';

      $sql = dibi::query("SELECT title FROM $table WHERE %and", array(array('id_text = %i', $id), array('language = %s', $language)));
      foreach ($sql as $row) {
        $var = $row[title];
      }
      
      unset($sql);
      return $var;
      
    }    

  }
