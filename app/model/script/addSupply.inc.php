<?php

/*
 * class Template
 *
 * METHODS: 3
 *  
 * @author Webixo, internetová agentura
 * @contact www.webixo.cz, info@webixo.cz, +420 777 263 354
 * 
 */

  if ($_POST['addSuply']) {

    $php = '';

    require_once $php . 'classDatabase.php';
    require_once $php . 'classContact.php';
    require_once $php . 'classRecord.php';
    require_once $php . 'removeHTML.inc.php';

    require_once $php . 'Class.CfControlApi.php';
    $cfApi = new CfControlApi("https://zakaznik.puhy.net/api/web/v1", "ic94A}mz!Pf_.KW6&kL;C8pM;j>qi<");

    function getHash() {
      $string = '';
      $chars = '0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';

      for ($i = 0; $i < 5; $i++) {
        $number = rand(0, 59);
        $string .= substr($chars, $number, 1);
      }

      return $string;
    }    

    $db = new Database();
    $db->Connect();
    
    $contact = new Contact($db, 'wm_list');
    $record = new Record($db);

    $chars = array(
      'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
      'Ê'=>'E', 'Ë'=>'E', 'Ě'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
      'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ů'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
      'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
      'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ř' => 'r', 'Ř' => 'R', 'ť' => 't', 'Ť' => 'T'
    );

    $datepicker = remove_HTML($_POST['datepicker']);
    $hour = remove_HTML($_POST['hour']);
    $minute = remove_HTML($_POST['minute']);

    if (!empty($datepicker)) {
      $wait = 1;
      $day = substr($datepicker, 0, 2);
      $month = substr($datepicker, 3, 2);
      $year = substr($datepicker, -4, 4);
      $time  = mktime($hour, $minute, 0, $month, $day, $year);      
    }
    else {
      $wait = 0;
      $time  = 0;
    }

    $stp = mktime(date('H'), date('i'), date('s'), date('n'), date('j'), date('Y'));

      $idUser = remove_HTML($_POST['idUser']);
      $message = remove_HTML($_POST['prefix']) . ' ' . remove_HTML($_POST['message'] . ' - Toto cislo slouzi pouze pro SMS, prosim nevolejte.');
      $message = strtr($message, $chars);

      $contacts = $_POST['contacts'];
      $count = count($contacts);

      $idTariff = $record->getColumn('wm_customers', 'id_tariff', array('id' => $idUser));
      $payDate = $record->getColumn('wm_customers', 'paydate', array('id' => $idUser));
      $payDateEnd = $record->getColumn('wm_customers', 'paydate_end', array('id' => $idUser));
      $maxSMS = $record->getColumn('wm_tariffs', 'sms', array('id' => $idTariff));

      $sql = $db->query("SELECT * FROM wm_messages WHERE id_customer = \"$idUser\" AND created >= \"$payDate\" AND created <= \"$payDateEnd\"");
      $sentSMS = $sql->num_rows;
      
      //echo $sentSMS.";$count;"; echo $maxSMS.";";

      if (($sentSMS + $count) <= $maxSMS) {

        $data = array(
          'id_customer' => $idUser,
          'count' => $count,
          'name' => remove_HTML($_POST['name']),
          'content' => $message,
          'created' => $stp,
          'time' => $time,
          'wait' => $wait
        );

        $record->add('wm_conversations', $data);

        $idConversation = Record::getColumnExt($db, 'wm_conversations', 'id', array('id_customer' => $idUser, 'created' => $stp));

        foreach ($contacts as $key => $value) {

          $phone = Record::getColumnExt($db, 'wm_list', 'phone', array('id' => $value));

          if ($count > 100) {
            $MES = $message . '#' . getHash();
          }
          else {
           $MES = $message;
          }

          $MES = substr($MES, 0, 400);

          $data = array(
            'id_customer' => $idUser,
            'id_recipient' => $value,
            'id_conversation' => $idConversation,
            'phone' => $phone,
            'name' => remove_HTML($_POST['name']),
            'content' => $MES,
            'created' => $stp,
            'time' => $time,
            'wait' => $wait        
          );

          $record->add('wm_messages', $data);

          $MES = ''; 

        }

        echo 10034;

      }
      else {
        echo 10036;
      } 

  }