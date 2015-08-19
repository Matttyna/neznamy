<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Object
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Object {

    private $table;
    private $imagePath = '../www/photos/objects/';

    function __construct($table) {
      $this->table = $table;
    }
    
    function getCount() {
      $table = $this->table;
      
      $sql = dibi::query("SELECT * FROM $table WHERE visibility = %i", 1);
      return count($sql);
      
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
    
    function getData($rewrite) {
      $table = $this->table;
      
      $sql = dibi::query("SELECT * FROM $table WHERE [rewrite] = %s", $rewrite);
      $var = $sql->fetch();

      unset($sql);
      return $var;
    }
    
    function getListEquipment($id) {
      $table = 'wm_objects_equipment';
      
      $sql = dibi::query("SELECT id FROM $table WHERE %and", array(array('id_object = %i', $id)));
      foreach ($sql as $row) {
        echo "<li class=\"" . $this->getParameter('wm_sections_equipment', 'rewrite', $row[id]) . "\">" . $this->getParameter('wm_sections_equipment', 'name', $row[id]) . "</li>";
      }

      unset($sql);
    }    
    
    function getListServices($id) {
      $table = 'wm_objects_services';
      
      $sql = dibi::query("SELECT id FROM $table WHERE %and", array(array('id_object = %i', $id)));
      foreach ($sql as $row) {
        echo "<li class=\"" . $this->getParameter('wm_sections_services', 'rewrite', $row[id]) . "\">" . $this->getParameter('wm_sections_services', 'name', $row[id]) . "</li>";
      }

      unset($sql);
    }
    
    function getSearchServices() {
      $table = 'wm_sections_services';
      
      $sql = dibi::query("SELECT name, rewrite FROM $table");
      foreach ($sql as $row) {
        echo "<input type=\"checkbox\" name=\"$row[name]\"> <label>$row[name]</label><br />";
      }

      unset($sql);
    }    
    
    function getSearchSports() {
      $table = 'wm_sections_sports';
      
      $sql = dibi::query("SELECT name, rewrite FROM $table");
      foreach ($sql as $row) {
        echo "<input type=\"checkbox\" name=\"$row[name]\"> <label>$row[name]</label><br />";
      }

      unset($sql);
    }    
    
    function getListSports($id) {
      $table = 'wm_objects_sports';
      
      $sql = dibi::query("SELECT id FROM $table WHERE %and", array(array('id_object = %i', $id)));
      foreach ($sql as $row) {
        echo "<li class=\"" . $this->getParameter('wm_sections_sports', 'rewrite', $row[id]) . "\">" . $this->getParameter('wm_sections_sports', 'name', $row[id]) . "</li>";
      }

      unset($sql);
    }
    
    function getOpening($id) {
      $table = 'wm_opening';
      
      $sql = dibi::query("SELECT id FROM $table WHERE %and", array(array('id_object = %i', $id)));
      foreach ($sql as $row) {
        echo "<li class=\"" . $this->getParameter('wm_sections_sports', 'rewrite', $row[id]) . "\">" . $this->getParameter('wm_sections_sports', 'name', $row[id]) . "</li>";
      }

      unset($sql);      
    }
    
    function getParameter($table, $column, $id) {     
      $sql = dibi::query("SELECT $column FROM $table WHERE %and", array(array('id = %i', $id)));
      foreach ($sql as $row) {
        $var = $row[$column];
      }

      unset($sql);
      return $var;   
    }   
    
    function getPrices($id) {
      $table = 'wm_opening';
      
      $sql = dibi::query("SELECT id_sport, price FROM $table WHERE %and", array(array('id_object = %i', $id)));
      foreach ($sql as $row) {
        echo "<li><h3><a href=\"#\">" . $this->getParameter('wm_sections_sports', 'name', $row[id_sport]) . "</a></h3>";
        
        $find = array('border="1"', 'cellpadding="1"', 'cellspacing="1"');
        $change = array('');
        $price = str_replace($find, $change, htmlspecialchars_decode($row[price]));
        
        echo "<div>$price</div></li>";
      }

      unset($sql);
    }
    
    function isExist($rewrite) {
      $table = $this->table;
      
      $sql = dibi::query("SELECT * FROM $table WHERE %and", array(array('rewrite = %s', $rewrite)));
      if (count($sql) == 1) {
        unset($sql);
        return TRUE;
      }
      else {
        unset($sql);
        return FALSE;
      }
      
    }
    
    function isExistExt($rewrite) {
      $table = 'wm_objects';
      
      $sql = dibi::query("SELECT * FROM $table WHERE %and", array(array('rewrite = %s', $rewrite)));
      if (count($sql) == 1) {
        unset($sql);
        return TRUE;
      }
      else {
        unset($sql);
        return FALSE;
      }
      
    }    
    
    function view($idCategory, $language, $page, $limit, $top) {
      $table = $this->table;
      $imagePath = $this->imagePath;
      
      $firstRecord = ($page * $limit) - $limit; 
      
      /*if ($top == 1) {
        $sql = dibi::query("SELECT id, name, rewrite, price FROM $table WHERE %and", array(array('language = %s', $language), array('top = %i', 1)), '%ofs %lmt', $firstRecord, $limit);  
      }
      else {
        $sql = dibi::query("SELECT id, name, rewrite, price FROM $table WHERE %and", array(array('id_category = %i', $idCategory), array('language = %s', $language)), '%ofs %lmt', $firstRecord, $limit);  
      }*/
      $sql = dibi::query("SELECT id, name, rewrite, address, price FROM $table %ofs %lmt", 0, 10);  
      foreach ($sql as $row) {
        echo "<div class=\"item_search\"><div class=\"image\">";
        echo "<a href=\"$row[rewrite]\"><img src=\"$imagePath/$row[rewrite]/thumbs/00.jpg\"/></a>";
        echo "</div><div class=\"text\">";
        echo "<h4><a href=\"../$row[rewrite]\">$row[name]</a></h4>";
        echo "<span class=\"span-24\">$row[address]</span><span>tenis-kurt, tenis-hala, šipky</span>";
        echo "<div class=\"rating\"><div class=\"big_rate\">89%</div><div class=\"rating_star\">";
        echo "<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>";
        echo "</div><div class=\"rating_count\"><a href=\"$row[rewrite]\">hodnoceno 39x</a>";
        echo "</div><div class=\"price\">cena od: $row[price] " . $this->getCurrency('') . "/h";
        echo "</div></div></div></div>";
      }
      
      unset($sql);
      
    }
    
    function viewUser($language, $idUser) {
      $table = $this->table;

      $sql = dibi::query("SELECT id_user, type, cargo, rewrite, place_from, place_to, date_from, date_to, price, content FROM $table WHERE %and", array(array('id_user = %i', $idUser), array('visibility = %i', 1)));
      foreach ($sql as $row) {
        echo "<article class=\"row clearfix\"><header class=\"clearfix\">";
        echo "<a href=\"#\" class=\"button green left\">Poptávka</a>";
        echo "<h3 class=\"left\">$row[place_from] -> $row[place_to]</h3>";
        echo "<span class=\"span2 right\"><a href=\"" . User::getRewriteExt($row[id_user]) . "\" class=\"\">" . User::getNameExt($row[id_user]) . "</a></span></header>";
        echo "<div class=\"clearfix\">";
        echo "<div class=\"span3\"><div class=\"c_iframe\"><iframe src=\"http://mapy.cz/s/jeOE\"></iframe></div></div>";
        echo "<div class=\"span4 c_listitemdetails\">";
        echo "<div class=\"clearfix\">";
        echo "<div class=\"span6\"><span class=\"cicon cicon_datetime\"></span> " . Option::toDateShort($row[date_to]) . "</div>";
        echo "<div class=\"span6\"><span class=\"cicon cicon_goodstype\"></span> " . $this->getNameParameter('wm_sections_types', $row[type]) . "</div>";
        echo "</div><div class=\"clearfix\">";
        echo "<div class=\"span6\"><span class=\"cicon cicon_price\"></span> <strong class=\"button green\">" . Option::toPrice($row[price], Option::getCurrency($language)) . "</strong></div>";
        echo "<div class=\"span6\"><span class=\"cicon cicon_transport\"></span> " . $this->getNameParameter('wm_sections_cargo', $row[cargo]) . "</div>";
        echo "</div></div> <div class=\"span3\">";
        echo "<p>" . htmlspecialchars_decode($row[content]) . "</p>";
        echo "</div> <div class=\"span2\"><div class=\"cicon cicon_rating cicon_rating4\"></div>";
        echo "<a href=\"" . Page::getRewriteById($language, 23) . "?id=$row[rewrite]\" class=\"button green\">Nabídnout</a>";
        echo "<a href=\"$row[rewrite]\" class=\"ca_more\">Více informací</a>";
        echo "</div></div></article>";        
      }
      
      unset($sql);
      return $var;
      
    }
  }
