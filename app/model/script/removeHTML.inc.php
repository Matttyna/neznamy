<?php

  function remove_HTML($s , $keep = '' , $expand = 'script|style|noframes|select|option') {
    
    $k = '';
    $s = ' ' . $s;

    if(strlen($keep) > 0){
      $k = explode('|',$keep);
      for($i=0;$i<count($k);$i++){
        $s = str_replace('<' . $k[$i],'[{(' . $k[$i],$s);
        $s = str_replace('</' . $k[$i],'[{(/' . $k[$i],$s);
      }
    }

    while(stripos($s,'<!--') > 0){
      $pos[1] = stripos($s,'<!--');
      $pos[2] = stripos($s,'-->', $pos[1]);
      $len[1] = $pos[2] - $pos[1] + 3;
      $x = substr($s,$pos[1],$len[1]);
      $s = str_replace($x,'',$s);
    }

    if(strlen($expand) > 0){
      $e = explode('|',$expand);
      for($i=0;$i<count($e);$i++){
        while(stripos($s,'<' . $e[$i]) > 0){
          $len[1] = strlen('<' . $e[$i]);
          $pos[1] = stripos($s,'<' . $e[$i]);
          $pos[2] = stripos($s,$e[$i] . '>', $pos[1] + $len[1]);
          $len[2] = $pos[2] - $pos[1] + $len[1];
          $x = substr($s,$pos[1],$len[2]);
          $s = str_replace($x,'',$s);
        }
      }
    }

    while(stripos($s,'<') > 0){
      $pos[1] = stripos($s,'<');
      $pos[2] = stripos($s,'>', $pos[1]);
      $len[1] = $pos[2] - $pos[1] + 1;
      $x = substr($s,$pos[1],$len[1]);
      $s = str_replace($x,'',$s);
    }

    for($i=0;$i<count($k);$i++){
      $s = str_replace('[{(' . $k[$i],'<' . $k[$i],$s);
      $s = str_replace('[{(/' . $k[$i],'</' . $k[$i],$s);
    }

    return trim($s);
  }