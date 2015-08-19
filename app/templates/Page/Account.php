<?php $data = $user->getData(USER_ID); ?>
<div class="container_12 clearfix" id="add_new_item_info">
  <form action="#">
    <div class="bigger_margin">
      <div class="box clearfix">
        <h3><?php echo $page->getParameterById($lng, $page->getIdByRewrite($lng, $lvl1), 'name'); ?></h3>
        <div class="box-content clearfix">             
          <div class="half left">   
            <fieldset>
              <p><strong>Jméno subjektu: </strong><?php echo $data['name']; ?></p>
              <p><strong>Registrace: </strong><?php echo $option->toDateLong($data['created']); ?></p>
              <p><strong>Tarif: </strong><?php echo $user->getTariffById($lng, $data['id_tariff']); ?></p>              
            </fieldset>
          </div>
        </div>          
      </div>
    </div>
  </form>
</div>