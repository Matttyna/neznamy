<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: script resetPassword.inc.php
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  if ($_GET['resetPassword']) {

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
    $record = new Record();
    $user = new User('wm_users');

    $email = remove_HTML($_POST["email"]);
    $stp = $user->getTimestamp();
    $token = $user->getToken();

    $data = array(
      'time' => $stp,
      'token' => $token
    );

    if ($form->isValidEmail($email)) {
      if ($record->isExist('wm_users', array(array('email = %s', $email)))) {
        $record->edit('wm_users', $data, array(array('email = %s', $email)));
        if ($record->isExist('wm_users', array(array('email = %s', $email), array('time = %i', $stp), array('token = %s', $token)))) {

          $subject = "změna hesla, BlaBlaTruck.cz";
          $subject = "=?utf-8?Q?" . imap_8bit($subject) . "?=";
          
          $link = $option->getValue(1) . $lng . '/' . $page->getRewriteById($lng, 13) . "?email=$email&token=$token&time=$stp";
          
          $emailContent = "Vážený uživateli,<br><br>přijali jsme žádost ohledně změny hesla na portálu BlaBlaTruck.cz<br><br>"
          . "Z důvodu bezpečnosti, Vás žádáme o ověření tohoto požadavku pomocí odkazu: $link"
          . "<br><br>Odkaz k ověření požadavku je aktivní 30 minut. Poté budete muset provést registraci znovu."
          . "Děkujeme za využití služeb a přejeme Vám hezký den.<br><br>S pozdravem<br><br>portál BlaBlaTruck.cz<br>www.blablatruck.cz";

          $sender = "From: " . $option->getValue(8) . "\r\n";
          $sender .= "MIME-Version: 1.0\r\nContent-Type: text/html; charset=utf-8\r\nContent-Transfer-Encoding: 8bit\r\n";

          mail($email, $subject, $emailContent, $sender);
          return 13001;
        }
        else {
          return 13002;
        }
      }
      else {
        return 13003;
      }
    }
    else {
      return 13004;
    }

  }