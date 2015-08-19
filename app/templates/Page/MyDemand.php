<div class="container_12 clearfix" id="add_new_item_info">
  <div class=" bigger_margin">
    <div class="box clearfix">
      <h3><?php echo $page->getParameterById($lng, $page->getIdByRewrite($lng, $lvl1), 'name'); ?></h3>
      <section id="section_mainlist" class="container_12 clearfix row clearfix">
        <div class="c_mainlist box">
          <?php $demand->viewUser($lng, USER_ID); ?>
          <div class="c_pager">
            <a href="#" class="c_active">1</a>/<a href="#">2</a>/<a href="#">3</a>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>