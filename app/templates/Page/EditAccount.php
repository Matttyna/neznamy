<?php $data = $user->getData(USER_ID); ?>
<div class="container_12 clearfix" id="add_new_item_info">
  <form action="?editUser=true" enctype="application/x-www-form-urlencoded" method="post">
    <div class="bigger_margin">
      <div class="box clearfix">
        <h3><?php echo $page->getParameterById($lng, $page->getIdByRewrite($lng, $lvl1), 'name'); ?></h3>
        <?php
          if ((isset($_GET['editUser'])) && ($_GET['editUser'])) {
            $alert->view($lng, require_once 'app/model/script/editUser.inc.php');
          }
        ?>
        <div class="box-content clearfix">             
          <div class="half left">   
            <fieldset>
              <label for="name" class="dropdown_label">Jméno subjektu</label>
              <input id="name" class="input" type="text" name="name" value="<?php if (isset($_GET['editUser'])) { $form->isFilled($_GET['editUser'], $_POST['name']); } else { echo $data['name'];} ?>">
            </fieldset>
          </div>
        </div>
        <div class="box-content clearfix">
          <div class="half left">   
            <fieldset>
              <label for="vatid" class="dropdown_label">IČ</label>                
              <input id="vatid" class="input" type="text" name="vatid" value="<?php if (isset($_GET['editUser'])) { $form->isFilled($_GET['editUser'], $_POST['vatid']); } else { echo $data['vatid'];} ?>">
            </fieldset>
          </div>
          <div class="half right">   
            <fieldset>
              <label for="taxid" class="dropdown_label">DIČ</label>                
              <input id="taxid" class="input" type="text" name="taxid" value="<?php if (isset($_GET['editUser'])) { $form->isFilled($_GET['editUser'], $_POST['taxid']); } else { echo $data['taxid'];} ?>">
            </fieldset>
          </div>
        </div>
        <div class="box-content clearfix">
          <div class="half left">   
            <fieldset>
              <label for="street" class="dropdown_label">Ulice</label>                
              <input id="street" class="input" type="text" name="street" value="<?php if (isset($_GET['editUser'])) { $form->isFilled($_GET['editUser'], $_POST['street']); } else { echo $data['street'];} ?>">
            </fieldset>
          </div>
          <div class="half right">   
            <fieldset>
              <label for="city" class="dropdown_label">Město</label>                
              <input id="city" class="input" type="text" name="city" value="<?php if (isset($_GET['editUser'])) { $form->isFilled($_GET['editUser'], $_POST['city']); } else { echo $data['city'];} ?>">
            </fieldset>
          </div>
        </div>
        <div class="box-content clearfix">
          <div class="half left">   
            <fieldset>
              <label for="zip" class="dropdown_label">PSČ</label>                
              <input id="zip" class="input" type="text" name="zip" value="<?php if (isset($_GET['editUser'])) { $form->isFilled($_GET['editUser'], $_POST['zip']); } else { echo $data['zip'];} ?>">
            </fieldset>
          </div>
          <div class="half right">   
            <fieldset>
              <label for="country" class="dropdown_label">Stát</label>
              <select id="country" class="input" name="country">
                <?php
                  if (isset($_GET['editUser'])) {
                    $form->getSelectBox('wm_countries', 'name', 'ASC', $_POST['country']);
                  }
                  else {
                    $form->getSelectBox('wm_countries', 'name', 'ASC', $data['id_country']);
                  }
                ?>
              </select>
            </fieldset>
          </div>
        </div>
        <div class="box-content clearfix">
          <div class="half left">   
            <fieldset>
              <label for="email" class="dropdown_label">Email</label>                
              <input id="email" class="input" type="text" name="email" value="<?php if (isset($_GET['editUser'])) { $form->isFilled($_GET['editUser'], $_POST['email']); } else { echo $data['email'];} ?>">
            </fieldset>
          </div>
          <div class="half right">   
            <fieldset>
              <label for="phone" class="dropdown_label">Telefon</label>                
              <input id="phone" class="input" type="text" name="phone" value="<?php if (isset($_GET['editUser'])) { $form->isFilled($_GET['editUser'], $_POST['phone']); } else { echo $data['phone'];} ?>">
            </fieldset>
          </div>
        </div>          
      </div>
      <a class="button submit green" type="submit"><?php echo $content->getTitle($lng, 8); ?></a>
    </div>
  </form>
  <form action="?editPassword=true" enctype="application/x-www-form-urlencoded" method="post">
    <div class="bigger_margin">
      <div class="box clearfix">
        <h3><?php echo $content->getTitle($lng, 7); ?></h3>
        <?php
          if ((isset($_GET['editPassword'])) && ($_GET['editPassword'])) {
            $alert->view($lng, require_once 'app/model/script/editPassword.inc.php');
          }
        ?>
        <div class="box-content clearfix">
          <div class="half left">   
            <fieldset>
              <label for="passOld" class="dropdown_label">Heslo</label>
              <input id="passOld" class="input" type="password" name="passOld" value="">
            </fieldset>
          </div>
        </div>        
        <div class="box-content clearfix">
          <div class="half left">   
            <fieldset>
              <label for="passNew" class="dropdown_label">Nové heslo (alespoň 6 znaků)</label>
              <input id="passNew" class="input" type="password" name="passNew" value="">
            </fieldset>
          </div>
          <div class="half right">   
            <fieldset>
              <label for="passRetype" class="dropdown_label">Nové heslo znovu</label>
              <input id="passRetype" class="input" type="password" name="passRetype" value="">
            </fieldset>
          </div>
        </div>
      </div>
      <a class="button submit green" type="submit"><?php echo $content->getTitle($lng, 7); ?></a>
    </div>
  </form>
</div>