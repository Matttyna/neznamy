<div id="content">
    <div class="container wider breadcrumb">
        <div class="breadcrumb_span">
            Výsledky hledání: Praha > tenis
        </div>
        <div class="sorting right">
            Řadit podle: 
            <span><a href="?">doporučeno</a></span>
            <span><a href="?">název</a></span>
            <span><a href="?">cena</a></span>
            <span><a href="?">hodnocení</a></span>
        </div>
    </div>
    <div class="container wider">
        <div id="sidebar">
            <div id="map"></div>
            <div id="address">
                <ul id="accordion_search">
                    <li>
                        <h3><a href="#">Sport</a></h3>
                        <div>
                            <?php $object->getSearchSports(); ?>
                        </div>
                    </li>
                    <li>
                        <h3><a href="#">Město</a></h3>
                        <div>
                            Content goes here
                        </div>
                    </li>
                    <li>
                        <h3><a href="#">Doplňkové služby</a></h3>
                        <div>
                          <ul>
                            <?php $object->getSearchServices(); ?>
                          </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="ads">
                <div style="background:black;width:100%;height: 300px;">
                    reklamy
                </div>
            </div>
        </div>
        <div id="content_w_sidebar">
          <?php $object->view($idCategory, $language, $page, $limit, $top); ?>
        </div>
    </div>
</div>