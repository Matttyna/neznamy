<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: script registerUser.inc.php
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  if ($_GET['editPassword']) {

    $class = 'app/model/class/';
    $script = 'app/model/script/';

    require_once 'app/config/Database.webmio.php';
    
    require_once $class . 'classForm.webmio.php';
    require_once $class . 'classOption.webmio.php';
    require_once $class . 'classRecord.webmio.php';
    require_once $class . 'classUser.webmio.php';
    require_once $script . 'removeHTML.inc.php';

    $form = new Form();
    $record = new Record();
    $user = new User('wm_users');
    
    $empty = 0;
    $noFilled = array();
    foreach ($_POST as $key => $value) {    
      if ((!in_array($key, $noFilled)) && (empty($value)) || ($value == 'null')) {
        $empty++;
      }
    }
    
    $id = $_SESSION['web_user_id'];
    $stp = $user->getTimestamp();
    
    $passOld = sha1(remove_HTML($_POST['passOld'] . md5('Bl@B1A-TruCK_2o15')));
    $passNew = remove_HTML($_POST['passNew']);
    $passRetype = remove_HTML($_POST['passRetype']);
    
    $data = array(
      'password' => sha1($passNew . md5('Bl@B1A-TruCK_2o15')),
      'edited' => $stp
    );
    
    if ($empty == 0) {
      if (strlen($passNew) >= 6) {
        if ($passNew == $passRetype) {
          if ($record->isExist('wm_users', array(array('id = %i', $id), array('password = %s', $passOld)))) {
            $record->edit('wm_users', $data, array(array('id = %i', $id), array('token = %s', $_SESSION['web_user_token'])));
            $passRetype = sha1($passRetype . md5('Bl@B1A-TruCK_2o15'));
            if ($record->isExist('wm_users', array(array('id = %i', $id), array('password = %s', $passRetype)))) {
              return 18001;
            }
            else {
              return 18002;
            }
          }
          else {
            return 18003;
          }
        }
        else {
          return 18005;
        }
      }
      else {
        return 18006;
      }
    }
    else {
      return 18004;
    }
  }