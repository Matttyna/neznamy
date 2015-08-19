<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Category
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Category {

    private $table;
    private $imagePath = 'www/images/';

    function __construct($table) {
      $this->table = $table;
    }
    
    function getIdByRewrite($language, $rewrite) {
      $table = $this->table;
      
      $result = dibi::query("SELECT id FROM $table WHERE %and", array(array('language = %s', $language), array('rewrite = %s', $rewrite)));
      foreach ($result as $row) {
        $var = $row[id];
      }
      
      unset($result);
      return $var;
      
    }    
    
    function isExist($rewrite) {
      $table = $this->table;
      
      $result = dibi::query("SELECT * FROM $table WHERE %and", array(array('rewrite = %s', $rewrite)));
      if (count($result) == 1) {
        unset($result);
        return TRUE;
      }
      else {
        unset($result);
        return FALSE;
      }
      
    }
    
    function isExistExt($rewrite) {
      $table = 'wm_sections_sports';
      
      $result = dibi::query("SELECT * FROM $table WHERE %and", array(array('rewrite = %s', $rewrite)));
      if (count($result) == 1) {
        unset($result);
        return TRUE;
      }
      else {
        unset($result);
        return FALSE;
      }
      
    }
    
    function view() {
      $table = $this->table;
      $imagePath = $this->imagePath;
      
      $result = dibi::query("SELECT name, rewrite FROM $table WHERE %and ORDER BY %by", array(array('visibility = %i', 1)), array('rank' => 'asc'));
      
      foreach ($result as $row) {
        echo "<li class=\"item\">\n<a href=\"$row[rewrite]/\">\n";
        echo "<img src=\"$imagePath" . "ilustrated_img.jpg\">\n";
        echo "<span>$row[name]</span>\n</a>\n</li>\n";
      }
      
      unset($result);
    }
    
    function viewTop($language) {
      $table = $this->table;
      $imagePath = $this->imagePath;

      $result = dibi::query("SELECT name, rewrite FROM $table WHERE %and", array(array('language = %s', $language), array('top = %i', 1)));
      foreach ($result as $row) {
        echo "<div class=\"span50\">\n<a href=\"$row[rewrite]\">";
        echo "<div class=\"h2small\"><h2>$row[name]</h2></div>\n";
        echo "<img src=\"$imagePath$row[rewrite].jpg\" alt=\"$row[name]\" /></a>\n";
        echo "</div>\n";
      }
      
      unset($result);
    }    

  }