<?php $data = $object->getData($lvl1); ?>

<div id="content">
    <div class="container wider">
        <div id="content_w_sidebar">
            <h3><?php echo $data['name']; ?></h3>
            <span class="under_h"><?php echo $data['address']; ?></span>
            <div class="contacts">
                <span class="phone"><?php echo $data['phone']; ?></span>
                <span class="web"><a href="<?php echo $data['www']; ?>" target="_blank"><?php echo $data['www']; ?></a></span>
                <span class="mail"><a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a></span>
            </div>
            <div class="gallery">  
                <div id="sync1" class="owl-carousel">
                  <?php $gallery->view($lvl1); ?>
                </div>
                <div id="sync2" class="owl-carousel">
                  <?php $gallery->view($lvl1); ?>
                </div>
            </div>
            <div class="feautures">
                <div class="sport">
                    <span>Sporty</span>
                    <ul>
                      <?php $object->getListSports($data['id']); ?>
                    </ul>
                </div>
                <div class="additional_services">
                    <span>Doplňkové služby</span>
                    <ul>
                      <?php $object->getListServices($data['id']); ?>
                    </ul>
                </div>
                <div class="acessories">
                    <span>Vybavení</span>
                    <ul>
                      <?php $object->getListEquipment($data['id']); ?>
                    </ul>
                </div>
            </div>
            <div id="about">
              <span>Popis</span>
              <div>
                <?php echo htmlspecialchars_decode($data['content']); ?>
              </div>
            </div>
            <div id="reviews">
                    <h3>Recenze</h3>
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Nunc tincidunt</a></li>
                            <li><a href="#tabs-2">Proin dolor</a></li>
                            <li><a href="#tabs-3">Aenean lacinia</a></li>
                        </ul>
                        <div id="tabs-1">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs-2">
                            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                        </div>
                        <div id="tabs-3">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                    <div id="comments_others">
                        <ul>
                            <li><a href="#tabs-all">Všechny názory</a></li>
                            <li><a href="#tabs-positive">Pozitivní názory</a></li>
                            <li><a href="#tabs-neutral">Neutrální názory</a></li>
                            <li><a href="#tabs-negative">Negativní názory</a></li>
                        </ul>
                        <div id="tabs-all">
                            <div class="comment">
                                <div class="comment_body">
                                    
                                    <div class="comment_text">
                                        <h5>Kuryioka</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam sed tellus id magna elementum tincidunt.
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nulla non arcu lacinia neque faucibus fringilla. In convallis.</p>
                                    </div>

                                    <div class="rating">
                                        <div class="rating_star">
                                            <small class="rate_txt">velmi dobré</small> 
                                            <span class="full">☆</span><span class="full">☆</span><span class="full">☆</span><span class="full">☆</span><span>☆</span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="delete right">
                                    smazat
                                </div>
                            </div>
                            <div class="comment">
                                <div class="comment_body">
                                    <div class="comment_text">
                                        <h5>Kuryioka</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam sed tellus id magna elementum tincidunt.
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nulla non arcu lacinia neque faucibus fringilla. In convallis.</p>
                                    </div>

                                    <div class="rating">
                                        <div class="rating_star">
                                            <small class="rate_txt">velmi dobré</small> 
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="delete right">
                                    smazat
                                </div>
                            </div>
                        </div>
                        <div id="tabs-positive">
                            <div class="comment">
                                <div class="comment_body">
                                    <div class="comment_text">
                                        <h5>Kuryioka</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam sed tellus id magna elementum tincidunt.
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nulla non arcu lacinia neque faucibus fringilla. In convallis.</p>
                                    </div>

                                    <div class="rating">
                                        <div class="rating_star">
                                            <small class="rate_txt">velmi dobré</small> 
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="delete right">
                                    smazat
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div id="sidebar">
            <div id="map"></div>
            <div id="opening">
                <span>Otevírací doba</span>
                <table>
                <tr><td>Pondělí</td><td>11:00-21:00</td></tr>
                <tr><td>Úterý</td><td>11:00-21:00</td></tr>
                <tr><td>Středa</td><td>11:00-21:00</td></tr>
                <tr><td>Čtvrtek</td><td>11:00-21:00</td></tr>
                <tr><td>Pátek</td><td>11:00-21:00</td></tr>
                <tr><td>Sobota</td><td>11:00-21:00</td></tr>
                <tr><td>Neděle</td><td>11:00-21:00</td></tr>
                </table>
                
            </div>
            <div id="prices">
                <span>Ceny</span>
                <ul id="accordion">
                    <?php $object->getPrices($data['id']); ?>
                </ul>
            </div>
            <div id="ads">
                <div style="background:black;width:100%;height: 300px;">
                    reklamy
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
  li div table { border-style: none !important; font-size: 12px !important; width: 100% !important;}
  li div table td {border-collapse: separate !important; border-spacing: 0px !important; font-size: 12px !important; padding: 0px !important;}
  li div table td:first-child {font-weight: bold !important; width: 55px;}
  li div table td strong {font-weight: bold !important;}
  li div table p, li div table strong {font-size: 12px !important; font-weight: normal !important;}
</style>
