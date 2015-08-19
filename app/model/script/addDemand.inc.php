<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: script addDemand.inc.php
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */


  if ($_GET['addDemand']) {

    $class = 'app/model/class/';
    $script = 'app/model/script/';

    require_once 'app/config/Database.webmio.php';
    
    require_once $class . 'classForm.webmio.php';
    require_once $class . 'classOption.webmio.php';
    require_once $class . 'classPage.webmio.php';
    require_once $class . 'classRecord.webmio.php';
    require_once $class . 'classUser.webmio.php';
    require_once $script . 'removeHTML.inc.php';
    
    $form = new Form();
    $option = new Option('wm_options');
    $page = new Page('wm_pages');
    $record = new Record();
    $user = new User('wm_users');
    
    $empty = 0;
    $noFilled = array('adr', 'hdr');
    foreach ($_POST as $key => $value) {    
      if ((!in_array($key, $noFilled)) && (empty($value)) || ($value == 'null')) {
        $empty++;
      }
    }    
    
    if ($empty == 0) {
      $stp = $user->getTimestamp();
      $token = $user->getToken();
      
      $rewrite = 'ad-' . USER_ID . '-' . $stp;

      if (!empty($_POST['dateStart'])) {
        $wait = 1;
        $day = substr($datepicker, 0, 2);
        $month = substr($datepicker, 3, 2);
        $year = substr($datepicker, -4, 4);
        $dateFrom  = mktime($_POST['hourStart'], $_POST['minuteStart'], 0, $month, $day, $year);      
      }
      
      if (!empty($_POST['dateEnd'])) {
        $wait = 1;
        $day = substr($datepicker, 0, 2);
        $month = substr($datepicker, 3, 2);
        $year = substr($datepicker, -4, 4);
        $dateTo  = mktime($_POST['hourEnd'], $_POST['minuteEnd'], 0, $month, $day, $year);      
      }      

      $data = array(
        'id_user' => USER_ID,
        'type' => remove_HTML($_POST['type']),
        'rewrite' => $rewrite,
        'place_from' => remove_HTML($_POST['placeStart']),
        'place_to' => remove_HTML($_POST['placeEnd']),
        'date_from' => $dateFrom,
        'date_to' => $dateTo,
        'price' => remove_HTML($_POST['price']),
        'content' => htmlspecialchars($_POST['content']),
        'cargo' => $_POST['cargo'],
        'size' => remove_HTML($_POST['size']),
        'adr' => remove_HTML($_POST['adr']),
        'hdr' => remove_HTML($_POST['hdr']),
        'created' => $stp,
        'visibility' => 1
      );

      $record->add('wm_demand', $data);
      if ($record->isExist('wm_demand', array(array('created = %i', $stp), array('id_user = %i', USER_ID), array('rewrite = %s', $rewrite)))) {
        return 15001;
      }
      else {
        return 15002;
      }
    }
    else {
      return 15003;
    }
  }