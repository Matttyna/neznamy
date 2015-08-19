<div class="container_12 clearfix" id="add_new_item_info">
  <form action="#">
    <div class="bigger_margin">
      <div class="box clearfix">
        <h3><?php echo $page->getParameterById($lng, $page->getIdByRewrite($lng, $lvl1), 'name'); ?></h3>           
        <?php $alert->view($lng, require_once 'app/model/script/newPassword.inc.php'); ?>         
      </div>
    </div>
  </form>
</div>