<?php if ($lvl1 == 'home') { ?>
  <div id="header">
    <div id="top_bar">
        <div class="container wider">
            <div class="right">
              <a href="<?php echo DIR . $page->getRewriteById($lng, 10); ?>/">
                <?php echo $page->getParameterById($lng, 10, 'name'); ?>
              </a>
              <a href="<?php echo DIR . $page->getRewriteById($lng, 9); ?>/">
                <?php echo $page->getParameterById($lng, 9, 'name'); ?>
              </a>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Najděte si sportovní centrum <br />ve vašem okolí</h1>
        <form>
            <select id="vyber_sport" name="sport" multiple="multiple">
              <?php $form->getSelectBox('wm_sections_sports', 'name', 'asc', $_GET['sport']); ?>
            </select>
            <input type="text"  id="vyber_misto" placeholder="Praha" name="vyber_misto"/>
            <input type="submit" name="vyhledat" id="vyhledat" value="Hledat" />
            <div style="clear: both"></div>
        </form>
    </div>
    <div id="filtering_down">
        <div class="container wider">
            <h3>Hledejte sportovní centra ve vašem městě</h3>
            <div class="per-row-7">
                <div class="item"><h5>Praha <a href="">(28)</a></h5></div>
                <div class="item"><h5>Brno <a href="">(28)</a></h5></div>
                <div class="item"><h5>Ostrava <a href="">(28)</a></h5></div>
                <div class="item"><h5>Plzeň <a href="">(28)</a></h5></div>
                <div class="item"><h5>Liberec <a href="">(28)</a></h5></div>
                <div class="item"><h5>Olomouc <a href="">(28)</a></h5></div>
                <div class="item"><h5>Pardubice <a href="">(28)</a></h5></div>
                <a class="span-24" href="">Zobrazit všechny města</a>
            </div>
        </div>
    </div>
  </div>
<?php } else { ?>
  <div id="header">
      <div id="top_bar">
          <div class="container wider">
              <div class="right">
                  <a href="<?php echo DIR . $page->getRewriteById($lng, 10); ?>/">
                    <?php echo $page->getParameterById($lng, 10, 'name'); ?>
                  </a>
                  <a href="<?php echo DIR . $page->getRewriteById($lng, 9); ?>/">
                    <?php echo $page->getParameterById($lng, 9, 'name'); ?>
                  </a>
              </div>
          </div>
      </div>
  </div>
<?php } ?>