<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Record
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Record {
/*
    function getId($language, $rewrite) {

      $table = 'wm_page_parameters';
      
      $sql = dibi::test("SELECT id_page FROM $table WHERE %and", array(array('language = %s', $language), array('rewrite = %s', $rewrite)));

      foreach ($sql as $n => $row) {
        $var = $row[id_page];
      }      

      unset($sql);
      
      return $var;
      
    }
    */
    function isExist($table, $data) {
      $sql = dibi::query("SELECT * FROM $table WHERE %and", $data);
      
      if (count($sql) > 0) {
        return TRUE;
      }
      else {
        return FALSE;
      }

    }

    function add($table, $data) {
      dibi::query("INSERT INTO $table", $data);
    } 
    
    function edit($table, $data, $where) {
      dibi::query("UPDATE $table SET ", $data, "WHERE %and", $where);
    }
    
  }