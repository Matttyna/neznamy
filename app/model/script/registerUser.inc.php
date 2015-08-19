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

  if ($_GET['signUp']) {
    
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
    $noFilled = array('tariff');
    foreach ($_POST as $key => $value) {    
      if ((!in_array($key, $noFilled)) && (empty($value)) || ($value == 'null')) {
        $empty++;
      }
    }
    
    if ($empty == 0) {
      $email = remove_HTML($_POST["email"]);
      $password = $user->getPassword();
      $stp = $user->getTimestamp();
      $token = $user->getToken();

      $data = array(
        'id_tariff' => remove_HTML($_POST['tariff']),
        'name' => remove_HTML($_POST['name']),
        'vatid' => remove_HTML($_POST['vatid']),
        'taxid' => remove_HTML($_POST['taxid']),
        'email' => $email,
        'phone' => remove_HTML($_POST['phone']),
        'city' => remove_HTML($_POST['city']),
        'street' => remove_HTML($_POST['street']),
        'zip' => remove_HTML($_POST['zip']),
        'id_country' => $_POST['country'],
        'password' => sha1($password . md5('Bl@B1A-TruCK_2o15')),
        'created' => $stp,
        'time' => $stp,
        'token' => $token,
        'auth' => 0,
        'visibility' => 0
      );

      if ($form->isValidEmail($email)) {
        if (!$record->isExist('wm_users', array(array('auth = %i', 1), array('visibility = %i', 1), array('email = %s', $email)))) {
          $record->add('wm_users', $data);
          if ($record->isExist('wm_users', array(array('auth = %i', 0), array('visibility = %i', 0), array('created = %i', $stp), array('email = %s', $email)))) {

            $subject = "registrace, BlaBlaTruck.cz";
            $subject = "=?utf-8?Q?" . imap_8bit($subject) . "?=";

            $link = $option->getValue(1) . $lng . '/' . $page->getRewriteById($lng, 14) . "?email=$email&time=$stp&token=$token";
            
            $emailContent = "Vážený uživateli,<br><br>potvrzujeme úspěšnou registraci na portálu BlaBlaTruck.cz<br><br>"
            . "Z důvodu bezpečnosti, Vás žádáme o brzké ověření nově vytvořeného účtu pomocí tohoto odkazu: $link"
            . "<br><br>Po úspěšném ověření účtu využijte k přihlášení následující přihlašující údaje:<br><br>"
            . "Email: $email<br>Heslo: $password"
            . "<br><br>Odkaz k ověření účtu je aktivní 30 minut. Poté budete muset provést registraci znovu."
            . "<br><br>Děkujeme za Vaši registraci a přejeme Vám hezký den.<br><br>S pozdravem<br><br>portál BlaBlaTruck.cz<br>www.blablatruck.cz";

            $sender = "From: " . $option->getValue(8) . "\r\n";
            $sender .= "MIME-Version: 1.0\r\nContent-Type: text/html; charset=utf-8\r\nContent-Transfer-Encoding: 8bit\r\n";

            mail($email, $subject, $emailContent, $sender);
            return 11001;
          }
          else {
            return 11002;
          }
        }
        else {
          return 11003;
        }
      }
      else {
        return 11004;
      }
    }
    else {
      return 11005;
    }
  }