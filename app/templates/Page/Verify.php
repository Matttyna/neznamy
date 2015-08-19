<div class="container_12 clearfix" id="add_new_item_info">
  <form action="#">
    <div class="bigger_margin">
      <div class="box clearfix">
        <h3><?php echo $page->getParameterById($page->getIdByRewrite($lng, $lvl1), $lng, 'name'); ?></h3>
        <div class="box-content clearfix">             
          <div class="half left">   
            <fieldset>
              <?php
                if ((!empty($_GET['email'])) && (!empty($_GET['time'])) && (!empty($_GET['token']))) {
                  $var = $user->verify($_GET['email'], $_GET['time'], $_GET['token']);
                  $alert->view($lng, $var);
                  if (($var == 19001) || ($var == 19003)) {
                    echo "<script type=\"text/javascript\">setTimeout(function(){ location.href='" . $page->getRewriteById($lng, 4) . "'; }, 3000);</script>";
                  }
                }
                else {
                  $alert->view($lng, 19004);
                }
              ?>                            
            </fieldset>
          </div>
        </div>          
      </div>
    </div>
  </form>
</div>