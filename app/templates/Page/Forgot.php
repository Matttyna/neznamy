<div class="container_12 clearfix" id="add_new_item_info">
  <form action="?resetPassword=true" enctype="application/x-www-form-urlencoded" method="post">
    <div class="bigger_margin">
      <div class="box clearfix">
        <h3><?php echo $page->getParameterById($lng, $page->getIdByRewrite($lng, $lvl1), 'name'); ?></h3>
        <?php
          if ((isset($_GET['resetPassword'])) && ($_GET['resetPassword'])) {
            $alert->view($lng, require_once 'app/model/script/resetPassword.inc.php');
          }
        ?>
        <div class="box-content clearfix">
          <div class="half left">   
            <fieldset>
              <label for="email" class="dropdown_label">Váš email</label>                
              <input id="email" class="input" type="text" name="email" value="<?php if (isset($_GET['resetPassword'])) { $form->isFilled($_GET['resetPassword'], $_POST['email']); } ?>">
            </fieldset>
          </div>
        </div>
      </div>
      <a class="button submit green" type="submit"><?php echo $content->getTitle($lng, 6); ?></a>
    </div>
  </form>
</div>