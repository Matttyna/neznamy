<?php

/*
 * @package: Framework for Web Applications
 * 
 * part: Autoload classes and objects
 *  
 * @author David Musil &alias Webmio, internetová agentura
 *
 * @contact www.david-musil.cz, info@david-musil.cz
 * 
 */

  require 'app/model/class/classAlert.webmio.php';
  require 'app/model/class/classCategory.webmio.php';
  require 'app/model/class/classContent.webmio.php';
  require 'app/model/class/classGallery.webmio.php';
  require 'app/model/class/classForm.webmio.php';
  require 'app/model/class/classLanguage.webmio.php';
  require 'app/model/class/classObject.webmio.php';  
  require 'app/model/class/classOption.webmio.php';
  require 'app/model/class/classPage.webmio.php';
  require 'app/model/class/classRecord.webmio.php';
  require 'app/model/class/classTemplate.webmio.php';
  require 'app/model/class/classUser.webmio.php';

  $alert = new Alert('wm_alerts');
  $category = new Category('wm_sections_sports');
  $content = new Content('wm_texts');
  $gallery = new Gallery();
  $language = new Language('wm_languages');
  $option = new Option('wm_options');
  $object = new Object('wm_objects');
  $page = new Page('wm_pages');
  $template = new Template('wm_pages');
  $user = new User('wm_users');
  
  $form = new Form();
  $record = new Record();