<!DOCTYPE html>
<html>
  <head>
    <?php require_once 'app/templates/Section/Meta.webmio.php'; ?>
  </head>
  <body id="<?php echo $option->getBodyId($lvl1); ?>">
    <?php require_once 'app/templates/Section/Header.webmio.php'; ?>
    <?php
      if (($page->isExist($lng, $lvl1)) || ($category->isExist($lvl1)) || ($object->isExist($lvl1)) || ($user->isExist($lvl1))) {
        if (!$page->isExpired($page->getIdByRewrite($lng, $lvl1), $_GET['time'], 30)) {
          if ($page->isAccount($page->getIdByRewrite($lng, $lvl1))) {
            if (IS_LOGGED == TRUE) {
              if ($page->isExist($lng, $lvl1)) {
                require_once 'app/templates/Page/' . $template->getTemplate($page->getIdByRewrite($lng, $lvl1)) . '.php';
              }
              else if ($category->isExist($lvl1)) {
                require_once 'app/templates/Page/' . $template->getTemplate(21) . '.php';
              }
              else if ($object->isExist($lvl1)) {
                require_once 'app/templates/Page/' . $template->getTemplate(22) . '.php';
              }              
              else if ($user->isExist($lvl1)) {
                require_once 'app/templates/Page/' . $template->getTemplate(19) . '.php';
              }
            }
            else {
              require_once 'app/templates/Page/Unlogged.php';
            }
          }
          else {
            if ($page->isExist($lng, $lvl1)) {
              require_once 'app/templates/Page/' . $template->getTemplate($page->getIdByRewrite($lng, $lvl1)) . '.php';
            }
            else if ($category->isExist($lvl1)) {              
              require_once 'app/templates/Page/' . $template->getTemplate(21) . '.php';
            }
            else if ($object->isExist($lvl1)) {
              require_once 'app/templates/Page/' . $template->getTemplate(22) . '.php';
            }            
            else if ($user->isExist($lvl1)) {
              require_once 'app/templates/Page/' . $template->getTemplate(19) . '.php';
            }
          }
        }
        else {
          require_once 'app/templates/Page/Expired.php';
        }
      }
      else {
        require_once 'app/templates/Page/404.php';
      }
     ?>
    <?php //require_once 'app/templates/Section/Sidebar.webmio.php'; ?>
    <?php require_once 'app/templates/Section/Footer.webmio.php'; ?>
  </body>
</html>