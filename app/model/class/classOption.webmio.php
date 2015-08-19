<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Option
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Option {
    
    private $table;

    function __construct($table) {
      $this->table = $table;
    }
    
    function getBodyId($var) {
      if ($var == 'home') {
        return 'homepage';
      }
      else if (Object::isExistExt($var)) {
        return 'detail';
      }
      else if (Category::isExistExt($var)) {
        return 'search';
      }
      
    }
    
    function getBoolean($lng, $var) {
      if ($var == 0) {
        return Content::getTitleExt($lng, 35);
      }
      else {
        return Content::getTitleExt($lng, 36);
      }
    }
    
    function getCountryName($id) {
      $table = 'wm_countries';
      
      $sql = dibi::query("SELECT name FROM $table WHERE %and", array(array('id = %i', $id)));
      foreach ($sql as $row) {
        $var = $row[name];
      }
      
      unset($sql);
      return $var;
    }    
    
    function getCurrency($language) {
      $table = 'wm_languages';
      
      $sql = dibi::query("SELECT currency FROM $table WHERE %and", array(array('language = %s', $language)));
      foreach ($sql as $row) {
        $var = $row[currency];
      }
      
      unset($sql);
      return $var;
    }    
    
    function getValue($id) {
      $table = $this->table;
      
      $sql = dibi::query("SELECT value FROM $table WHERE [id] = %i", $id);
      foreach ($sql as $row) {
        $var = $row[value];
      }
      
      unset($sql);
      return $var;
    }
    
    function toPrice($var, $currency) {
      return number_format($var, 0, ',', ' ') . ' ' . $currency;
    }
    
    function toDateLong($var) {
      return date('d.m.Y H:i:s', $var);
    }
    
    function toDateShort($var) {
      return date('d.m.Y', $var);
    }
    
  }