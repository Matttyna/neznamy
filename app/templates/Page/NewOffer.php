<div class="container_12 clearfix" id="add_new_item_info">
  <form action="?addDemand=true" enctype="application/x-www-form-urlencoded" method="post">
    <div class=" bigger_margin">
      <div class="box clearfix">
        <h3><?php echo $page->getParameterById($lng, $page->getIdByRewrite($lng, $lvl1), 'name'); ?></h3>
        <div class="box-content clearfix">
          <div class="half left">
            <label for="cargo" class="dropdown_label">Typ přívěsu</label>
            <fieldset class="cfs_select">                
              <select name="cargo" id="cargo" class="">
                <?php
                  if (isset($_GET['addDemand'])) {
                    $form->getSelectBox('wm_sections_cargo', 'name', 'ASC', $_POST['cargo']);
                  }
                  else {
                    $form->getSelectBox('wm_sections_cargo', 'name', 'ASC', NULL);
                  }
                ?>
              </select>
            </fieldset>            
          </div>
          <div class="half right">
            <label for="size" class="dropdown_label">Přidejte jiný</label>                
            <fieldset>
              <input id="size" class="input" type="text" name="size" value="">
            </fieldset>    
          </div>
        </div>

        <div class="box-content clearfix">
          <div class="half left">
            <label for="type" class="dropdown_label">Typ nákladu</label>
            <fieldset class="cfs_select">                
              <select name="type" id="type" class="">
                <?php
                  if (isset($_GET['addDemand'])) {
                    $form->getSelectBox('wm_sections_types', 'name', 'ASC', $_POST['type']);
                  }
                  else {
                    $form->getSelectBox('wm_sections_types', 'name', 'ASC', NULL);
                  }
                ?>
              </select>
            </fieldset>            
          </div>
          <div class="half right">
            <label for="size" class="dropdown_label">Přidejte jiný</label>                
            <fieldset>
              <input id="size" class="input" type="text" name="size" value="">
            </fieldset>    
          </div>
        </div>          

        <div class="box-content clearfix bordered_under">
          <div class="half left">
            <fieldset>
              <label for="size" class="dropdown_label">Šířka či váha</label>
              <input id="size" class="input" type="text" name="size" value="">
            </fieldset>
          </div>
          <div class="half right">
             <fieldset>
              <label for="price" class="dropdown_label">Cena</label>
              <input id="price" class="input" type="text" name="price" value="">
            </fieldset>
          </div>
        </div>

        <div class="box-content bordered_under clearfix">  
          <div class="half left">
            <fieldset>
              <div class="map_canvas"></div>

              <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
              <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

              <script src="http://ubilabs.github.io/geocomplete/jquery.geocomplete.js"></script>
              <script src="http://ubilabs.github.io/geocomplete/examples/logger.js"></script>

              <script>
                $(function(){
                  var options = {
                    map: ".map_canvas"
                  };

                  $("#placeStart").geocomplete(options)
                    .bind("geocode:result", function(event, result){
                      $.log("Result: " + result.formatted_address);
                    })
                    .bind("geocode:error", function(event, status){
                      $.log("ERROR: " + status);
                    })
                    .bind("geocode:multiple", function(event, results){
                      $.log("Multiple: " + results.length + " results found");
                    });

                  $("#find").click(function(){
                    $("#placeStart").trigger("geocode");
                  });

                  $("#examples a").click(function(){
                    $("#placeStart").val($(this).text()).trigger("geocode");
                    return false;
                  });
                  
                  $("#placeEnd").geocomplete(options)
                    .bind("geocode:result", function(event, result){
                      $.log("Result: " + result.formatted_address);
                    })
                    .bind("geocode:error", function(event, status){
                      $.log("ERROR: " + status);
                    })
                    .bind("geocode:multiple", function(event, results){
                      $.log("Multiple: " + results.length + " results found");
                    });

                  $("#find").click(function(){
                    $("#placeEnd").trigger("geocode");
                  });

                  $("#examples a").click(function(){
                    $("#placeEnd").val($(this).text()).trigger("geocode");
                    return false;
                  });
                  
                });
              </script>
              <label for="placeStart" class="dropdown_label">Místo naložení</label>
              <input id="placeStart" class="input" type="text" name="placeStart" value="">
            </fieldset>
          </div>
          <div class="half right">
            <fieldset>
              <label for="placeEnd" class="dropdown_label">Místo vyložení</label>
              <input id="placeEnd" class="input" type="text" name="placeEnd" value="">
            </fieldset>
          </div>
        </div>

        <div class="box-content clearfix">
          <div class="half left">
            <fieldset>
              <label for="dateStart" class="dropdown_label">Datum naložení</label>
              <input id="dateStart" class="input" type="text" name="dateStart" value="">
            </fieldset>
          </div>
          <div class="half right">
            <label for="hourStart" class="dropdown_label">Čas naložení</label>              
            <fieldset class="cfs_select">
              <select name="hourStart" id="hourStart" class="range">
                <option value="">07</option>
              </select>
            </fieldset>  
            <span class="range_delimiter">-</span>
            <fieldset class="cfs_select">
              <select name="minuteStart" id="minuteStart" class="range">
                <option value="">00</option>
              </select>
            </fieldset>
          </div>
        </div>

        <div class="box-content clearfix">
          <div class="half left">
            <fieldset>
              <label for="dateEnd" class="dropdown_label">Datum dovozu</label>
              <input id="dateEnd" class="input" type="text" name="dateEnd" value="">
            </fieldset>
          </div>
          <div class="half right">
            <label for="hourEnd" class="dropdown_label">Čas dovozu</label>              
            <fieldset class="cfs_select">
              <select name="hourEnd" id="hourEnd" class="range">
                <option value="">07</option>
              </select>
            </fieldset>  
            <span class="range_delimiter">-</span>
            <fieldset class="cfs_select">
              <select name="minuteEnd" id="minuteEnd" class="range">
                <option value="">00</option>
              </select>
            </fieldset>
          </div>
        </div>
        
        <div class="box-content clearfix">
          <div class="half left">
            <fieldset class="smaller_margin">
              <label for="tarif0" class="dropdown_label">ADR (nebezpečný náklad)</label>
              <?php if ((isset($_GET['addDemand'])) && ($_POST['adr'] == 0)) { ?>
              <label for="adr0" class="custom_radio">
                <input type="radio" name="adr" id="adr0" value="0" checked>Ano
              </label>
              <?php } else { ?>
              <label for="adr0" class="custom_radio">
                <input type="radio" name="adr" id="adr0" value="0">Ano
              </label>              
              <?php } ?>
              <?php if ((isset($_GET['addDemand'])) && ($_POST['adr'] == 1)) { ?>
              <label for="adr1" class="custom_radio">
                <input type="radio" name="adr" id="adr1" value="1" checked>Ne
              </label>
              <?php } else { ?>
              <label for="adr1" class="custom_radio">
                <input type="radio" name="adr" id="adr1" value="1">Ne
              </label>
              <?php } ?>
            </fieldset>
          </div>              
          <div class="half right">   
            <fieldset class="smaller_margin">
              <label for="tarif0" class="dropdown_label">Hydraulika</label>
              <?php if ((isset($_GET['addDemand'])) && ($_POST['hdr'] == 0)) { ?>
              <label for="hdr0" class="custom_radio">
                <input type="radio" name="hdr" id="hdr0" value="0" checked>Ano
              </label>
              <?php } else { ?>
              <label for="hdr0" class="custom_radio">
                <input type="radio" name="hdr" id="hdr0" value="0">Ano
              </label>              
              <?php } ?>
              <?php if ((isset($_GET['addDemand'])) && ($_POST['hdr'] == 1)) { ?>
              <label for="hdr1" class="custom_radio">
                <input type="radio" name="hdr" id="hdr1" value="1" checked>Ne
              </label>
              <?php } else { ?>
              <label for="hdr1" class="custom_radio">
                <input type="radio" name="hdr" id="hdr1" value="1">Ne
              </label>
              <?php } ?>
            </fieldset>
          </div>
        </div>        

      </div>
      <div class="box">
        <h3>Další upřesnění</h3>
        <div class="box-content">
          <label for="description" class="dropdown_label">Detailní popis</label>
          <textarea name="description" id="description"></textarea>
        </div>
      </div>
      <a class="button submit green" type="submit"><?php echo $content->getTitle($lng, 12); ?></a>
    </div>
  </form>
</div>