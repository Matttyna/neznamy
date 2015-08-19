<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Page
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Page {

    private $table;
    private $imagePath = '../www/images/page/';
    
    function __construct($table) {
      $this->table = $table;      
    }

    function getIdByRewrite($language, $rewrite) {
      $table = 'wm_page_parameters';
      
      $sql = dibi::query("SELECT id_page FROM $table WHERE %and", array(array('language = %s', $language), array('rewrite = %s', $rewrite)));
      foreach ($sql as $row) {
        $var = $row[id_page];
      }
      
      unset($sql);
      return $var;
      
    }
    
    function getParameterById($language, $idPage, $parameter) {
      $table = 'wm_page_parameters';

      $sql = dibi::query("SELECT value FROM $table WHERE %and", array(array('id_page = %i', $idPage), array('language = %s', $language), array('parameter = %s', $parameter)));
      foreach ($sql as $row) {
        $var = $row[value];
      }
      
      unset($sql);
      return $var;
      
    }

    function getRewriteById($language, $idPage) {
      $table = 'wm_page_parameters';

      $sql = dibi::query("SELECT rewrite FROM $table WHERE %and", array(array('id_page = %i', $idPage), array('language = %s', $language)));
      foreach ($sql as $row) {
        $var = $row[rewrite];
      }

      unset($sql);
      return $var;
      
    }      

    function isAccount($id) {
      $table = $this->table;
      
      $sql = dibi::query("SELECT account FROM $table WHERE [id] = %i", $id);
      foreach ($sql as $row) {
        $var = $row[account];
      }

      unset($sql);
      if ($var == 1) {
        return TRUE;
      }
      else {
        return FALSE;
      }
      
    }    
    
    function isExist($language, $rewrite) {
      $table = 'wm_page_parameters';
      
      $sql = dibi::query("SELECT * FROM $table WHERE %and", array(array('language = %s', $language), array('rewrite = %s', $rewrite)));
      if (count($sql) == 4) {
        unset($sql);
        return TRUE;
      }
      else {
        unset($sql);
        return FALSE;
      }
      
    }
    
    function isExpired($id, $time, $minutes) {
      $table = $this->table;
      
      $expire = $minutes * 60;
      $stp = User::getTimestamp();

      $sql = dibi::query("SELECT expired FROM $table WHERE [id] = %i", $id);
      foreach ($sql as $row) {
        $var = $row[expired];
      }
      
      unset($sql);

      if ($var == 1) {
        if (($stp - $time) > $expire) {
          return TRUE;
        }
        else {
          return FALSE;
        }        
      }
      else {
        return FALSE;
      }      

    }
    
    function viewMenu($path, $language, $type) {
      $table = $this->table;
      $imagePath = $this->imagePath;

      $by = array(
        'rank' => 'ASC'
      );

      $sql = dibi::query("SELECT id FROM $table WHERE [nav_$type] = %i ORDER BY %by", 1, $by);
      
      foreach ($sql as $row) {
        echo "<li><a href=\"" . $this->getRewriteById($language, $row[id]) . "\">" . $this->getParameterById($language, $row[id], 'name') . "</a></li>";
      }
      
      unset($sql);
    }
    
    function viewResponsiveMenu($path, $language) {
      $table = $this->table;      

      $by = array(
        'rank' => 'ASC'
      );

      $sql = dibi::query("SELECT id FROM $table WHERE [nav_top] = %i ORDER BY %by", 1, $by);
      
      foreach ($sql as $row) {
        echo "<option value=\"" . $this->getRewriteById($language, $row[id]) . "\">" . $this->getParameterById($language, $row[id], 'name') . "</option>";
      }
      
      unset($sql);
    }    

    /*function isExpired($id, $time, $minutes) {
      $db = $this->db;
      $table = $this->table;

      $expire = $minutes * 60;
      $stp = mktime(date('H'), date('i'), date('s'), date('n'), date('j'), date('Y'));

      $sql = $db->query("SELECT expired FROM $table WHERE id = \"$id\"");
      while ($record = $sql->fetch_row()) {
        $var = $record[0];
      }

      if ($var == 1) {
        if (($stp - $time) > $expire) {
          return TRUE;
        }
        else {
          return FALSE;
        }        
      }
      else {
        return FALSE;
      }
    }

    function isPublic($id) {
      $db = $this->db;
      $table = $this->table;


      if (isset($id)) {
        $sql = $db->query("SELECT public FROM $table WHERE id = \"$id\"");
        while ($record = $sql->fetch_row()) {
          $var = $record[0];
        }

        if ($var == 1) {
          return TRUE;
        }
        else {
          return FALSE;
        }
      }
      else {
        return TRUE;
      }    

    }

    public function getMetaTags($idPage, $language, $column) {
      $db = $this->db;
      $table = 'wm_page_parameters';

      if (!isset($idPage)) {
        $idPage = 5;
      }

      $sql = $db->query("SELECT value FROM $table WHERE id_page = \"$idPage\" AND language = \"$language\" AND parameter = \"$column\"");
      while ($record = $sql->fetch_row()) {
        $var = $record[0];
      }

      return $var;
    }

    function getParameter($language, $rewrite, $column) {
      $db = $this->db;
      $table = 'wm_page_parameters';

      $sql = $db->query("SELECT value FROM $table WHERE rewrite = \"$rewrite\" AND language = \"$language\" AND parameter = \"$column\"");
      while ($record = $sql->fetch_row()) {
        $var = $record[0];
      }

      return $var;
    }

    function getParameterById($language, $column, $id) {
      $db = $this->db;
      $table = 'wm_page_parameters';

      $sql = $db->query("SELECT value FROM $table WHERE id_page = \"$id\" AND language = \"$language\" AND parameter = \"$column\"");
      while ($record = $sql->fetch_row()) {
        $var = $record[0];
      }

      return $var;
    }


    function getRewriteById($language, $id) {
      $db = $this->db;
      $table = 'wm_page_parameters';

      $sql = $db->query("SELECT rewrite FROM $table WHERE id_page = \"$id\" AND language = \"$language\"");
      while ($record = $sql->fetch_row()) {
        $var = $record[0];
      }

      return $var;
    }        

    function viewMenu($path, $language, $rewrite, $type) {
      $db = $this->db;
      $table = $this->table;      

      $sql = $db->query("SELECT id FROM $table WHERE nav_$type = \"1\" ORDER BY rank ASC");
      while ($record = $sql->fetch_row()) {
        if ($record[0] != 2) {
          echo "<li><a href=\"$path" . $this->getRewriteById($language, $record[0]) . "\">" . $this->getParameterById($language, 'name', $record[0]) . "</a></li>\n";
        }
        else {
          echo "<li><a href=\"$path" . Option::getValueExt($db, 1) . "\">" . $this->getParameterById($language, 'name', 2) . "</a></li>\n";
        }
      }
    }    

    function viewNavigation($path, $language, $rewrite) {
      $db = $this->db;

      $separator = '';
      if (!empty($rewrite)) {
        if (Record::isExistExt($db, 'wm_page_parameters', array('language' => $language, 'rewrite' => $rewrite))) {
          echo "<li>$separator <a href=\"$path$rewrite\" class=\"active\">" . Record::getColumnExt($db, 'wm_page_parameters', 'value', array('language' => $language, 'parameter' => 'name', 'rewrite' => $rewrite)) . "</a><li>\n";
        }
        else {
          echo "<li>$separator <a href=\"$path$rewrite\">" . Record::getColumnExt($db, 'wm_page_parameters', 'value', array('language' => $language, 'parameter' => 'name', 'rewrite' => 404)). "</a><li>\n"; 
        }
      }
      if (self::checkExist($rewrite, "categories")) {
        echo "> <a href=\"$rewrite\" class=\"active\">" . Category::getNameByRewrite($db, $rewrite) . "</a>\n";
      }
      if (self::checkExist($rewrite, "articles")) {
        echo "> <a href=\"" . Category::getRewriteById($db, Article::getIdCategory($db, $rewrite)) . "\">" . Category::getNameById($db, Article::getIdCategory($db, $rewrite)) . "</a>\n";
        echo "> <a href=\"$rewrite\" class=\"active\">" . Article::getName($db, $rewrite) . "</a>\n";
    }

    /*
    function getNameByRewrite($rewrite) {
      $db = $this->db;
      $sql = $db->query("SELECT name FROM pages WHERE rewrite = \"$rewrite\" LIMIT 1");
      while ($record = $sql->fetch_row()) {
        return $record[0];
      }
    }

    function viewNavigation($rewrite, $type) {
      $db = $this->db;
      $sql = $db->query("SELECT name, rewrite FROM pages WHERE nav_$type = \"1\" ORDER BY rank ASC");
      while ($record = $sql->fetch_row()) {
        if ($record[1] != $rewrite) {
          echo "<li><a href=\"$record[1]\">$record[0]</a></li>\n";
        }
        else {
          echo "<li><a href=\"$record[1]\" class=\"active\">$record[0]</a></li>\n";
        }
      }
    }

    function view($localization) {
      $db = $this->db;
      $sql = $db->query("SELECT `name_$localization`, `rewrite_$localization` FROM pages WHERE visibility = \"1\" ORDER BY rank ASC");
      while ($record = $sql->fetch_row()) {
        echo "<li><a href=\"$record[1]\">$record[0]</a></li>\n";
      }
    }

    /*function viewSitemap() {
      $db = $this->db;
      $sql = $db->query("SELECT name, rewrite FROM pages WHERE visibility = \"1\" ORDER BY rank ASC");
      while ($record = $sql->fetch_row()) {
        echo "<li><a href=\"$record[1]\">$record[0]</a></li>\n";
      }
    }*/

    /*function viewPagination($category, $page, $from) {
      $db = $this->db;
      if ($from > 0) {
        echo "<a href=\"articles?from=" . ($from - 5) . "&page=" . ($page - 1) . "#filter_top\"><span> < </span>pĹ™echozĂ­</a>";
      }
      echo "<p id=\"info_counter\">Nalezeno ÄŤlĂˇnkĹŻ: " . Article::getCount($db, $category) . "</p>";
      $numPage = 0;
      for ($i = 0; $i < Article::getCount($db, $category); $i = $i + 5) {
        $numPage++;
        if (($numPage == $page) || (($page == null) && ($numPage == 1))) {
          $css = "id = \"page\"";
        }
        else {
          $css = "";
        }
        echo "<p id=\"counter\"><a $css href=\"articles?&from=" . ($i) . "&page=" . ($i/5 + 1) . "#filter_top\" title=\"ZobrazĂ­ ÄŤlĂˇnky " . ($i + 1) . " - " . ($i + 5) . "\">" . ($i/5 + 1) . "</a></p>";
      }
      if (($from + 5) < Article::getCount($db, $category)) {
        echo "<a href=\"articles?from=" . ($from + 5) . "&page=" . ($page + 1) . "#filter_top\">dalĹˇĂ­<span> > </span></a>";
      }
    }*/


  }