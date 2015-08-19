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

  if ($_GET['editUser']) {

    $class = 'app/model/class/';
    $script = 'app/model/script/';

    require_once 'app/config/Database.webmio.php';
    
    require_once $class . 'classForm.webmio.php';
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
    $email = remove_HTML($_POST['email']);
    $stp = $user->getTimestamp();

    $data = array(
      'name' => remove_HTML($_POST['name']),
      'vatid' => remove_HTML($_POST['vatid']),
      'taxid' => remove_HTML($_POST['taxid']),
      'email' => $email,
      'phone' => remove_HTML($_POST['phone']),
      'city' => remove_HTML($_POST['city']),
      'street' => remove_HTML($_POST['street']),
      'zip' => remove_HTML($_POST['zip']),
      'id_country' => $_POST['country'],
      'edited' => $stp
    );
    
    if ($form->isValidEmail($email)) {
      if ($record->isExist('wm_users', array(array('id = %i', $id), array('token = %s', $_SESSION['web_user_token'])))) {
        $record->edit('wm_users', $data, array(array('id = %i', $id), array('token = %s', $_SESSION['web_user_token'])));
        if ($record->isExist('wm_users', array(array('id = %i', $id), array('token = %s', $_SESSION['web_user_token'])))) {
          return 12001;
        }
        else {
          return 12002;
        }
      }
      else {
        return 12003;
      }
    }
    else {
      return 12004;
    }
  }