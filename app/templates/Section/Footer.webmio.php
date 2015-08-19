<div id="footer">
  <div id="small_foot">
      <div class="container wider">
          <div class="per-row-3">
              <div class="item">
                  <strong>5652</strong> <span>Recenze <br />zákazníků</span>
              </div>
              <div class="item">
                  <strong><?php echo $object->getCount(); ?></strong> <span>Počet<br /> sportovních center</span>
              </div>
              <div class="item">
                  <strong>95 652</strong> <span>Provedených <br /> rezervací</span>
              </div>
          </div>
      </div>
  </div>
  <div class="container wider">
      <div class="per-row-4">
          <div class="item">
              <p><?php echo $content->getText($lng, 1); ?></p>
              <span class="phone"><?php echo $option->getValue(4); ?></span>
              <span class="mail"><a href="mailto:<?php echo $option->getValue(3); ?>"><?php echo $option->getValue(3); ?></a></span>
          </div>
          <div class="item">
              <h4><?php echo $content->getTitle($lng, 2); ?></h4>
              <p><?php echo $content->getText($lng, 1); ?></p>
          </div>
          <div class="item">
              <h4><?php echo $content->getTitle($lng, 3); ?></h4>
              <ul>
                  <li>text</li>
                  <li>dddd</li>
                  <li>lroem piek</li>
                  <li>life is life</li>
              </ul>
          </div>
          <div class="item">
              <h4><?php echo $content->getTitle($lng, 4); ?></h4>
              <ul>
                  <li>text</li>
                  <li>dddd</li>
                  <li>lroem piek</li>
                  <li>life is life</li>
              </ul>
          </div>
      </div>
      <hr />
      <div class="right">
          <a href=""><img src="<?php echo PATH_IMAGE; ?>icons/foot_fb.png" /></a>
          <a href=""><img src="<?php echo PATH_IMAGE; ?>icons/foot_twt.png" /></a>
          <a href=""><img src="<?php echo PATH_IMAGE; ?>icons/foot_plus.png" /></a>
      </div>
  </div>   
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS; ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS; ?>bootstrap-multiselect.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS; ?>jquery-backstretch.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS; ?>owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS; ?>script-owl.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS; ?>script.js"></script>
    
<?php
  if ((isset($_GET['logout'])) && ($_GET['logout'])) {
    require_once 'app/model/script/logoutUser.inc.php';
  }
?>