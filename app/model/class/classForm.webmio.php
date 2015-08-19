<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Form
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Form {
    
    function getSelectBox($table, $sort, $by, $var) {
      if (empty($var)) {
        echo "<option value=\"null\"> - vyberte - </option>";
        $var = 0;
      }
      
      $sorting = array(
        $sort => $by
      );      

      $sql = dibi::query("SELECT id, name FROM $table WHERE id = %i ORDER BY %by", $var, $sorting);
      foreach ($sql as $row) {
        echo "<option value=\"$row[id]\">$row[name]</option>";
      }
      
      $sql = dibi::query("SELECT id, name FROM $table WHERE NOT id = %i ORDER BY %by LIMIT", $var, $sorting, 10);
      foreach ($sql as $row) {
        echo "<option value=\"$row[id]\">$row[name]</option>";
      }      
      
      unset($sql);

    }
    
    function getSelectBoxHour($var) {
      echo "<option value=\"$var\">$var</option>";
      for ($i = 0; $i <= 23; $i++) {
        $number = str_pad($i, 2, "0", STR_PAD_LEFT);
        if ($i != $var) {
          echo "<option value=\"$number\">$number</option>";
        }
      }
    }
    
    function getSelectBoxMinute($var) {
      echo "<option value=\"$var\">$var</option>";
      for ($i = 0; $i <= 59; $i++) {
        $number = str_pad($i, 2, "0", STR_PAD_LEFT);
        if ($i != $var) {
          echo "<option value=\"$number\">$number</option>";
        }
      }
    }   

    function isFilled($get, $post) {
      if ($get) { 
        echo $post;
      }
    }
    
    function isValidEmail($email) {
      if (preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i', $email)) {
        return TRUE;
      }
      else {
        return FALSE;
      }
      
    }    
    
  }