<?php

/*
 * @package: Framework for Web Applications
 * 
 * Part: class Gallery
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  class Gallery {

    private $imagePath = 'www/photos/objects/';
    
    function view($folder) {
      $imagePath = $this->imagePath;
      
      $path = $imagePath . $folder . '/';
      $thumbs = $path . 'thumbs/';
      
      $images = glob($thumbs . '*.jpg');

      foreach($images as $image) {
        $file = $path.basename($image);
        //$thumb = $thumbs.basename($image);

        echo "<div class=\"item\"><img src=\"../$file\" /></div>";
      }
  
    }

  }
