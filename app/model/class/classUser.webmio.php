<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class User
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class User {

    private $table;
    private $hashString = 'Bl@B1A-TruCK_2o15';

    function __construct($table) {
      $this->table = $table;
    }
    
    function getData($id) {
      $table = $this->table;
      
      $sql = dibi::query("SELECT id_tariff, name, vatid, taxid, email, phone, street, city, zip, id_country, created FROM $table WHERE [id] = %i", $id);
      $var = $sql->fetch();

      unset($sql);
      return $var;
    }
    
    function getId($rewrite) {
      $table = $this->table;
      
      $sql = dibi::query("SELECT id FROM $table WHERE %and", array(array('rewrite = %s', $rewrite)));
      foreach ($sql as $row) {
        $var = $row[id];
      }

      unset($sql);
      return $var;   
    }    
    
    function getName($id) {
      $table = $this->table;
      
      $sql = dibi::query("SELECT name FROM $table WHERE %and", array(array('id = %i', $id)));
      foreach ($sql as $row) {
        $var = $row[name];
      }

      unset($sql);
      return $var;   
    }    
    
    function getNameExt($id) {
      $table = 'wm_users';
      
      $sql = dibi::query("SELECT name FROM $table WHERE %and", array(array('id = %i', $id)));
      foreach ($sql as $row) {
        $var = $row[name];
      }

      unset($sql);
      return $var;   
    }
    
    function getRewrite($id) {
      $table = $this->table;
      
      $sql = dibi::query("SELECT rewrite FROM $table WHERE %and", array(array('id = %i', $id)));
      foreach ($sql as $row) {
        $var = $row[rewrite];
      }

      unset($sql);
      return $var;   
    }
    
    function getRewriteExt($id) {
      $table = 'wm_users';
      
      $sql = dibi::query("SELECT rewrite FROM $table WHERE %and", array(array('id = %i', $id)));
      foreach ($sql as $row) {
        $var = $row[rewrite];
      }

      unset($sql);
      return $var;   
    }    
    
    function getTariffById($language, $id) {
      $table = 'wm_sections_tariffs';
      
      $sql = dibi::query("SELECT value FROM $table WHERE %and", array(array('id_tariff = %i', $id), array('language = %s', $language)));
      foreach ($sql as $row) {
        $var = $row[value];
      }

      unset($sql);
      return $var;   
    }
    
    function getTimestamp() {
      return mktime(date('H'), date('i'), date('s'), date('n'), date('j'), date('Y'));
    }
    
    function getToken() {
      $ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_SANITIZE_SPECIAL_CHARS);
      $string = sha1(md5(uniqid(mt_rand()) . $ip));
      return $string;
    }
    
    function getPassword() {
      $chars = "0123456789ABCDEFGHJKLMNOPQRSTUVWXYZ";
      for ($i = 0; $i < 6; $i++) {
        $char = rand(0, strlen($chars));
        $string .= substr($chars, $char, 1);
      }
      return $string;
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

    function isLogin($id, $token) {
      $table = $this->table;
      $timestamp = $this->getTimestamp();
      $timestampCheck = $timestamp - 1800;

      $sql = dibi::query("SELECT * FROM $table WHERE %and", array(array('id = %i', $id), array('token = %s', $token), array('time >= %i', ($timestampCheck))));
      if (count($sql) == 1) {
        $token = sha1($this->getToken());
        $_SESSION['web_user_token'] = $token;
        $_SESSION['web_user_time'] = $timestamp;
        
        $data = array(
            'token' => $token,
            'time'  => $timestamp,
        );
        Record::edit('wm_users', $data, array(array('id = %i', $id)));
        if (Record::isExist('wm_users', array(array('time = %i', $timestamp), array('token = %s', $token)))) {
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
    
    function login($email, $password, $language) {
      $table = $this->table;
      $hashPassword = sha1($password . md5($this->hashString));
      
      if ((!empty($email)) && (!empty($password))) {
        $sql = dibi::query("SELECT id, auth, visibility FROM $table WHERE %and", array(array('email = %s', $email), array('password = %s', $hashPassword)));
        if (count($sql) == 1) {
          foreach ($sql as $row) {
            if (($row[auth] == 1) && ($row[visibility] == 1)) {
              $token = $this->getToken();
              $_SESSION['web_user_id'] = $row[id];
              $_SESSION['web_user_token'] = $token;
              $_SESSION['web_user_time'] = $this->getTimestamp();
              $data = array(
                  'token' => $_SESSION['web_user_token'],
                  'time'  => $_SESSION['web_user_time'],
              );
              Record::edit('wm_users', $data, array(array('id = %i', $_SESSION['web_user_id'])));
              echo "<script type=\"text/javascript\">setTimeout(function(){ location.href='" . Page::getRewriteById($language, 12) . "'; }, 0);</script>";
            }
            else {
              if ($row[auth] == 0) {
                return 17002;
              }            
              if ($row[visibility] == 0) {
                return 17003;
              }
            }
          }
          unset($sql);
        }
        else {
          unset($sql);
          return 17001;
        }
      }
      else {
        return 17004;
      }
    }
    
    function verify($email, $time, $token) {
      $table = $this->table;
      
      $now = User::getTimestamp();
      if (($now - $time) < (30*60)) {
        $sql = dibi::query("SELECT id, auth FROM $table WHERE %and", array(array('email = %s', $email), array('time = %i', $time), array('token = %s', $token)));
        if (count($sql) == 1) {
          foreach ($sql as $row) {
            if ($row[auth] != 1) {
              $data = array(
                'rewrite' => 'user-' . $row[auth],
                'auth' => 1,
                'visibility' => 1
              );
              Record::edit($table, $data, array(array('email = %s', $email)));
              if (Record::isExist($table, array(array('email = %s', $email), array('auth = %i', 1), array('visibility = %i', 1)))) {
                return 19001;
              }
              else {
                return 19002;
              }
            }
            else {
              return 19003;
            }
          } 
        }
        else {
          return 19004;
        }      
      }
      else {
        return 19004;
      }
    }
    
  }
