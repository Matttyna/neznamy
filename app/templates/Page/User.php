<?php $data = $user->getData($user->getId($lvl1)); ?>
<div class="container_12 clearfix">
  <section id="section_mainlist" class="row clearfix">
    <div class="c_mainlist box">
      <article class="row clearfix">
        <header class="clearfix">    
          <a href="#" class="button green left">Poptávka</a>
          <h3 class="left"><?php echo $data['name']; ?></h3>    
          <span class="span2 right">
            <a href="<?php echo $user->getRewrite($data['id_user']) ?>" class=""><?php echo $user->getName($data['id_user']) ?></a>
          </span>
        </header>
        <div class="clearfix">
          <div class="span3">
            <p><strong>Registrace: </strong><?php echo $option->toDateLong($data['created']); ?></p>
            <p><strong>Tarif: </strong><?php echo $user->getTariffById($lng, $data['id_tariff']); ?></p>
            <br><br>
            <p><strong>IČ: </strong><?php echo $data['vatid']; ?></p>
            <p><strong>DIČ: </strong><?php echo $data['taxid']; ?></p>
            <br>
            <p><strong>Ulice: </strong><?php echo $data['street']; ?></p>
            <p><strong>Město: </strong><?php echo $data['city']; ?></p>
            <p><strong>PSČ: </strong><?php echo $data['zip']; ?></p>
            <p><strong>Země: </strong><?php echo $option->getCountryName($data['id_country']); ?></p>
            <br>
            <p><strong>Telefon: </strong><?php echo $data['phone']; ?></p>
            <p><strong>Email: </strong><?php echo $data['email']; ?></p>            
          </div>
          <div class="span4 c_listitemdetails">
            <div class="clearfix">
              <div class="span6"><span class="cicon cicon_datetime"></span> <?php echo $option->toDateShort($data['date_to']); ?></div>
              <div class="span6"><span class="cicon cicon_goodstype"></span> Cokoliv</div>                 
            </div>         
            <div class="clearfix">
              <div class="span6">
                  <span class="cicon cicon_price"></span>
                  <strong class="button green"><?php echo $option->toPrice($data['price'], $option->getCurrency($lng)); ?></strong>
              </div>
              <div class="span6"><span class="cicon cicon_transport_van"></span> 3 dodávky</div> 

            </div> 
          </div> 
          <div class="span3">  
            <p><?php echo htmlspecialchars_decode($data['content']); ?></p>
          </div> 
          <div class="span2">
            <div class="cicon cicon_rating cicon_rating2"></div>   
          </div> 
        </div>
      </article>
    </div>
  </section>
</div>