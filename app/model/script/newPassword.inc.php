<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: script newPassword.inc.php
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  if ((!empty($_GET['email'])) && (!empty($_GET['time'])) && (!empty($_GET['token']))) {

    
    $class = 'app/model/class/';
    $script = 'app/model/script/';

    require_once $class . 'classForm.webmio.php';
    require_once $class . 'classOption.webmio.php';
    require_once $class . 'classRecord.webmio.php';
    require_once $class . 'classUser.webmio.php';
    require_once $script . 'removeHTML.inc.php';

    $form = new Form();
    $option = new Option('wm_options');
    $page = new Page('wm_pages');
    $record = new Record();
    $user = new User('wm_users');

    $email = $_GET['email'];
    $time = $_GET['time'];
    $token = $_GET['token'];
    
    $password = $user->getPassword();
    $hashPassword = sha1($password . md5('Bl@B1A-TruCK_2o15'));
    
    $now = User::getTimestamp();
    
    $data = array(
      'token' => 'changeAfterNewPassword',
      'password' => $hashPassword
    );

    if (($now - $time) < (30*60)) {
      if ($record->isExist('wm_users', array(array('email = %s', $email), array('token = %s', $token), array('time >= %i', ($time))))) {
        $record->edit('wm_users', $data, array(array('email = %s', $email), array('token = %s', $token)));
        if ($record->isExist('wm_users', array(array('email = %s', $email), array('password = %s', $hashPassword)))) {

          $subject = "nové heslo, BlaBlaTruck.cz";
          $subject = "=?utf-8?Q?" . imap_8bit($subject) . "?=";

          $emailContent = "Vážený uživateli,<br><br>potvrzujeme úspěšnou změnu hesla na portálu BlaBlaTruck.cz<br><br>"
          . "Po úspěšné přihlášení ke svému účtu využijte Vaše nové heslo: $password.<br><br>"
          . "Děkujeme, že využíváte naše služby a přejeme Vám hezký den.<br><br>S pozdravem<br><br>portál BlaBlaTruck.cz<br>www.blablatruck.cz";

          $robot = $option->getValue(4);

          $sender = "From: " . $option->getValue(8) . "\r\n";
          $sender .= "MIME-Version: 1.0\r\nContent-Type: text/html; charset=utf-8\r\nContent-Transfer-Encoding: 8bit\r\n";

          mail($email, $subject, $emailContent, $sender);
          return 14001;
        }
        else {
          return 14002;
        }
      }
      else {
        return 14003;
      }
    }
    else {
      return 14004;
    }
  }
  else {
    return 14003;
  }