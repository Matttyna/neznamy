
	<div class="container_12 clearfix">
    <div class="grid_8 content">

      <h2 class="page_title with_filter">
        <?php echo $page->getParameterById($page->getId($lng, $var1), $lng, 'name'); ?>
      </h2>
			<div class="results_filter">
				<label for="sort" class="dropdown_label">Sort by:</label>
				<fieldset class="cfs_select"><select name="sort" id="sort" class="">
					<option value="">Price</option>
					<option value="">Age</option>
					<option value="">Mileage</option>
				</select></fieldset>
				<a class="sort_list current"></a><a href="results_grid.html" class="sort_grid"></a>
			</div>

			<ul class='pagination'>
				<li><a class="button pagination-previous" href="#">Previous</a></li>
				<li><a class='button pagination-number' href='#'>1</a></li>
				<li><a class='button pagination-number' href='#'>2</a></li>
				<li><a class='button pagination-number' href='#'>3</a></li>
				<li><a class='button pagination-number current'>4</a></li>
				<li><a class='button pagination-number' href='#'>5</a></li>
				<li><a class='pagination-dots'> ... </a></li>
				<li><a class='button pagination-number' href='#'>10</a></li>
				<li><a class="button pagination-next" href="#">Next</a></li>
			</ul>

			<article class="box clearfix list_item">
				<div class="half left">
					<div class="overlayed">
						<img src="<?php echo PATH_IMAGE; ?>smart.jpg" alt="">
						<div class="overlay">
							<span class="overlay-icon-left"><a href="item.html"><i class="icomoon-link"></i></a></span>
							<span class="overlay-icon-right"><a href="<?php echo PATH_IMAGE; ?>smart.jpg" class="fancybox" data-fancybox-group="group1"><i class="icomoon-expand-2"></i></a></span>
						</div>
					</div>
				</div>
				<div class="half right">
					<div class="item_heading">
						<h4>Smart <a href="item.html">Fortwo</a></h4>
						<p class="location">
							New York, <strong>NY</strong>
							<span class="vendor">Harry Roberts</span>
						</p>
					</div>
					<div class="item_info clearfix">
						<p class="half left">
							<span class="item_year">2006</span>
							<span class="item_type">City Car</span>
							<span class="item_drive">RWD</span>
							<span class="item_engine">0.9</span>
						</p>
						<p class="half right">
							<span class="item_transimition">Automatic</span>
							<span class="item_fuel">Petrol</span>
							<span class="item_mileage">16,000 miles</span>
						</p>
					</div>
					<div class="item_footer">
						<span class="item_price">$6,000</span>
						<span class="item_date">25 March, 2013</span>
						<span class="item_rating">4.3</span>
					</div>
				</div>
			</article>


			<article class="box clearfix list_item">
				<div class="half left">
					<div class="overlayed">
						<img src="<?php echo PATH_IMAGE; ?>sls.jpg" alt="">
						<div class="overlay">
							<span class="overlay-icon-left"><a href="item.html"><i class="icomoon-link"></i></a></span>
							<span class="overlay-icon-right"><a href="<?php echo PATH_IMAGE; ?>sls.jpg" class="fancybox" data-fancybox-group="group1"><i class="icomoon-expand-2"></i></a></span>
						</div>
					</div>
				</div>
				<div class="half right">
					<div class="item_heading">
						<h4>Mercedes <a href="item.html">SLS AMG</a></h4>
						<p class="location">
							San Francisco, <strong>CA</strong>
							<span class="vendor">Tom Harris</span>
						</p>
					</div>
					<div class="item_info clearfix">
						<p class="half left">
							<span class="item_year">2012</span>
							<span class="item_type">Grand Tourer</span>
							<span class="item_drive">RWD</span>
							<span class="item_engine">6.2</span>
						</p>
						<p class="half right">
							<span class="item_transimition">Automatic</span>
							<span class="item_fuel">Petrol</span>
							<span class="item_mileage">1,000 miles</span>
						</p>
					</div>
					<div class="item_footer">
						<span class="item_price">$215,000</span>
						<span class="item_date">25 March, 2013</span>
						<span class="item_rating">4.9</span>
					</div>
				</div>
			</article>


			<article class="box clearfix list_item">
				<div class="half left">
					<div class="overlayed">
						<img src="<?php echo PATH_IMAGE; ?>granturismo.jpg" alt="">
						<div class="overlay">
							<span class="overlay-icon-left"><a href="item.html"><i class="icomoon-link"></i></a></span>
							<span class="overlay-icon-right"><a href="<?php echo PATH_IMAGE; ?>granturismo.jpg" class="fancybox" data-fancybox-group="group1"><i class="icomoon-expand-2"></i></a></span>
						</div>
					</div>
				</div>
				<div class="half right">
					<div class="item_heading">
						<h4>Maserati <a href="item.html">Granturismo</a></h4>
						<p class="location">
							New York, <strong>NY</strong>
							<span class="vendor">Harry Roberts</span>
						</p>
					</div>
					<div class="item_info clearfix">
						<p class="half left">
							<span class="item_year">2008</span>
							<span class="item_type">Grand Tourer</span>
							<span class="item_drive">RWD</span>
							<span class="item_engine">4.2</span>
						</p>
						<p class="half right">
							<span class="item_transimition">Automatic</span>
							<span class="item_fuel">Petrol</span>
							<span class="item_mileage">46,000 miles</span>
						</p>
					</div>
					<div class="item_footer">
						<span class="item_price">$58,000</span>
						<span class="item_date">25 March, 2013</span>
						<span class="item_rating">4.0</span>
					</div>
				</div>
			</article>


			<article class="box clearfix list_item">
				<div class="half left">
					<div class="overlayed">
						<img src="<?php echo PATH_IMAGE; ?>a1.jpg" alt="">
						<div class="overlay">
							<span class="overlay-icon-left"><a href="item.html"><i class="icomoon-link"></i></a></span>
							<span class="overlay-icon-right"><a href="<?php echo PATH_IMAGE; ?>a1.jpg" class="fancybox" data-fancybox-group="group1"><i class="icomoon-expand-2"></i></a></span>
						</div>
					</div>
				</div>
				<div class="half right">
					<div class="item_heading">
						<h4>Audi <a href="item.html">A1</a></h4>
						<p class="location">
							New York, <strong>NY</strong>
							<span class="vendor">Phil Davis</span>
						</p>
					</div>
					<div class="item_info clearfix">
						<p class="half left">
							<span class="item_year">2013</span>
							<span class="item_type">Super-mini</span>
							<span class="item_drive">FWD</span>
							<span class="item_engine">1.4</span>
						</p>
						<p class="half right">
							<span class="item_transimition">Manual</span>
							<span class="item_fuel">Petrol</span>
							<span class="item_mileage">100 miles</span>
						</p>
					</div>
					<div class="item_footer">
						<span class="item_price">$24,000</span>
						<span class="item_date">25 March, 2013</span>
						<span class="item_rating">5.0</span>
					</div>
				</div>
			</article>


			<article class="box clearfix list_item">
				<div class="half left">
					<div class="overlayed">
						<img src="<?php echo PATH_IMAGE; ?>911.jpg" alt="">
						<div class="overlay">
							<span class="overlay-icon-left"><a href="item.html"><i class="icomoon-link"></i></a></span>
							<span class="overlay-icon-right"><a href="<?php echo PATH_IMAGE; ?>911.jpg" class="fancybox" data-fancybox-group="group1"><i class="icomoon-expand-2"></i></a></span>
						</div>
					</div>
				</div>
				<div class="half right">
					<div class="item_heading">
						<h4>Porsche <a href="item.html">911 GT2</a></h4>
						<p class="location">
							New York, <strong>NY</strong>
							<span class="vendor">Tom Harris</span>
						</p>
					</div>
					<div class="item_info clearfix">
						<p class="half left">
							<span class="item_year">1996</span>
							<span class="item_type">Sports car</span>
							<span class="item_drive">RWD</span>
							<span class="item_engine">3.6</span>
						</p>
						<p class="half right">
							<span class="item_transimition">Manual</span>
							<span class="item_fuel">Petrol</span>
							<span class="item_mileage">79,000 miles</span>
						</p>
					</div>
					<div class="item_footer">
						<span class="item_price">$104,200</span>
						<span class="item_date">25 March, 2013</span>
						<span class="item_rating">4.5</span>
					</div>
				</div>
			</article>


			<article class="box clearfix list_item">
				<div class="half left">
					<div class="overlayed">
						<img src="<?php echo PATH_IMAGE; ?>prius.jpg" alt="">
						<div class="overlay">
							<span class="overlay-icon-left"><a href="item.html"><i class="icomoon-link"></i></a></span>
							<span class="overlay-icon-right"><a href="<?php echo PATH_IMAGE; ?>prius.jpg" class="fancybox" data-fancybox-group="group1"><i class="icomoon-expand-2"></i></a></span>
						</div>
					</div>
				</div>
				<div class="half right">
					<div class="item_heading">
						<h4>Toyota <a href="item.html">Prius</a></h4>
						<p class="location">
							San Diego, <strong>CA</strong>
							<span class="vendor">Harry Roberts</span>
						</p>
					</div>
					<div class="item_info clearfix">
						<p class="half left">
							<span class="item_year">2012</span>
							<span class="item_type">Hybrid</span>
							<span class="item_drive">FWD</span>
							<span class="item_engine">1.8</span>
						</p>
						<p class="half right">
							<span class="item_transimition">Automatic</span>
							<span class="item_fuel">Petrol - Electric</span>
							<span class="item_mileage">38,000 miles</span>
						</p>
					</div>
					<div class="item_footer">
						<span class="item_price">$22,000</span>
						<span class="item_date">25 March, 2013</span>
						<span class="item_rating">4.7</span>
					</div>
				</div>
			</article>


			<article class="box clearfix list_item">
				<div class="half left">
					<div class="overlayed">
						<img src="<?php echo PATH_IMAGE; ?>corvette.jpg" alt="">
						<div class="overlay">
							<span class="overlay-icon-left"><a href="item.html"><i class="icomoon-link"></i></a></span>
							<span class="overlay-icon-right"><a href="<?php echo PATH_IMAGE; ?>corvette.jpg" class="fancybox" data-fancybox-group="group1"><i class="icomoon-expand-2"></i></a></span>
						</div>
					</div>
				</div>
				<div class="half right">
					<div class="item_heading">
						<h4>Chevrolet <a href="item.html">Corvette</a></h4>
						<p class="location">
							New York, <strong>NY</strong>
							<span class="vendor">Harry Roberts</span>
						</p>
					</div>
					<div class="item_info clearfix">
						<p class="half left">
							<span class="item_year">1969</span>
							<span class="item_type">Sports car</span>
							<span class="item_drive">RWD</span>
							<span class="item_engine">5.7</span>
						</p>
						<p class="half right">
							<span class="item_transimition">Automatic</span>
							<span class="item_fuel">Petrol</span>
							<span class="item_mileage">84,000 miles</span>
						</p>
					</div>
					<div class="item_footer">
						<span class="item_price">$45,000</span>
						<span class="item_date">25 March, 2013</span>
						<span class="item_rating">4.4</span>
					</div>
				</div>
			</article>


			<article class="box clearfix list_item">
				<div class="half left">
					<div class="overlayed">
						<img src="<?php echo PATH_IMAGE; ?>fiat.jpg" alt="">
						<div class="overlay">
							<span class="overlay-icon-left"><a href="item.html"><i class="icomoon-link"></i></a></span>
							<span class="overlay-icon-right"><a href="<?php echo PATH_IMAGE; ?>fiat.jpg" class="fancybox" data-fancybox-group="group1"><i class="icomoon-expand-2"></i></a></span>
						</div>
					</div>
				</div>
				<div class="half right">
					<div class="item_heading">
						<h4>Fiat <a href="item.html">500</a></h4>
						<p class="location">
							New York, <strong>NY</strong>
							<span class="vendor">Harry Roberts</span>
						</p>
					</div>
					<div class="item_info clearfix">
						<p class="half left">
							<span class="item_year">2010</span>
							<span class="item_type">City car</span>
							<span class="item_drive">FWD</span>
							<span class="item_engine">1.2</span>
						</p>
						<p class="half right">
							<span class="item_transimition">Manual</span>
							<span class="item_fuel">Petrol</span>
							<span class="item_mileage">14,000 miles</span>
						</p>
					</div>
					<div class="item_footer">
						<span class="item_price">$16,000</span>
						<span class="item_date">25 March, 2013</span>
						<span class="item_rating">4.8</span>
					</div>
				</div>
			</article>

			<article class="box clearfix list_item">
				<div class="half left">
					<div class="overlayed">
						<img src="<?php echo PATH_IMAGE; ?>gtr.jpg" alt="">
						<div class="overlay">
							<span class="overlay-icon-single"><a href="<?php echo PATH_IMAGE; ?>gtr.jpg" class="fancybox" data-fancybox-group="group1"><i class="icomoon-expand-2"></i></a></span>
						</div>
					</div>
				</div>
				<div class="half right">
					<div class="item_heading">
						<h4>Nissan <a href="item.html">GTR</a></h4>
						<p class="location">
							New York, <strong>NY</strong>
							<span class="vendor">Phil Davis</span>
						</p>
					</div>
					<div class="item_info clearfix">
						<p class="half left">
							<span class="item_year">2011</span>
							<span class="item_type">Sports car</span>
							<span class="item_drive">AWD</span>
							<span class="item_engine">3.8</span>
						</p>
						<p class="half right">
							<span class="item_transimition">Automatic</span>
							<span class="item_fuel">Petrol</span>
							<span class="item_mileage">42,000 miles</span>
						</p>
					</div>
					<div class="item_footer">
						<span class="item_price">$65,000</span>
						<span class="item_date">25 March, 2013</span>
						<span class="item_rating">4.9</span>
					</div>
				</div>
			</article>



	
			<ul class='pagination'>
				<li><a class="button pagination-previous" href="#">Previous</a></li>
				<li><a class='button pagination-number' href='#'>1</a></li>
				<li><a class='button pagination-number' href='#'>2</a></li>
				<li><a class='button pagination-number' href='#'>3</a></li>
				<li><a class='button pagination-number current'>4</a></li>
				<li><a class='button pagination-number' href='#'>5</a></li>
				<li><a class='pagination-dots'> ... </a></li>
				<li><a class='button pagination-number' href='#'>10</a></li>
				<li><a class="button pagination-next" href="#">Next</a></li>
			</ul>
		</div>
		<div class="grid_4 sidebar">

			<div class="box widget_search_filter">
				<h3>Search filter</h3>
				<form action="#">
					<div class="box-content">
						<fieldset>
							<label for="type" class="dropdown_label">Type</label>
							<fieldset class="cfs_select"><select name="type" id="type" class="">
								<option value="">Cars</option>
								<option value="">Motorcycles</option>
								<option value="">Trucks</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="condition_new" class="custom_radio"><input type="radio" name="condition" id="condition_new"> Used items</label>
							<label for="condition_used" class="custom_radio"><input type="radio" name="condition" id="condition_used"> New items</label>
						</fieldset>
						<fieldset>
							<label for="category" class="dropdown_label">Category</label>
							<fieldset class="cfs_select"><select name="category" id="category" class="">
								<option value="">Sedan</option>
								<option value="">Hedgeback</option>
								<option value="">Pick-up</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="with_photos" class="custom_checkbox"><input type="checkbox" name="with_photos" id="with_photos"> With photos</label>
							<label for="with_video" class="custom_checkbox"><input type="checkbox" name="with_video " id="with_video"> With video</label>
						</fieldset>
					</div>
					<div class="box-content">
						<fieldset>
							<label for="location" class="dropdown_label">Location</label>
							<fieldset class="cfs_select"><select name="location" id="location" class="">
								<option value="">New York</option>
								<option value="">Chicago</option>
								<option value="">Washington</option>
								<option value="">Boston</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="brand" class="dropdown_label">Brand</label>
							<fieldset class="cfs_select"><select name="brand" id="brand" class="">
								<option value="">All</option>
								<option value="">BMW</option>
								<option value="">Mercedes</option>
								<option value="">Audi</option>
								<option value="">Ferrari</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="model" class="dropdown_label">Model</label>
							<fieldset class="cfs_select"><select name="model" id="model" class="">
								<option value="">All</option>
								<option value="">C</option>
								<option value="">E</option>
								<option value="">S</option>
								<option value="">CLK</option>
								<option value="">SLK</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="price_from" class="dropdown_label">Price range</label>
							<fieldset class="cfs_select"><select name="price_from" id="price_from" class=" range">
								<option value="">$5.000</option>
								<option value="">$10.000</option>
								<option value="">$15.000</option>
								<option value="">$20.000</option>
							</select></fieldset>
							<span class="range_delimiter">-</span> 
							<fieldset class="cfs_select"><select name="price_to" id="price_to" class=" range">
								<option value="">$5.000</option>
								<option value="">$10.000</option>
								<option value="">$15.000</option>
								<option value="">$20.000</option>
							</select></fieldset>
						</fieldset>
					</div>
					<div class="box-content">
						<fieldset>
							<label for="transmision" class="dropdown_label">Transmision</label>
							<fieldset class="cfs_select"><select name="transmision" id="transmision" class="">
								<option value="">Manual</option>
								<option value="">Semi-automatic</option>
								<option value="">Automatic</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="engine_from" class="dropdown_label">Engine range</label>
							<fieldset class="cfs_select"><select name="engine_from" id="engine_from" class=" range">
								<option value="">0,8</option>
								<option value="">1,2</option>
								<option value="">1,6</option>
								<option value="">1,9</option>
								<option value="">2,0</option>
								<option value="">2,5</option>
								<option value="">3,0</option>
								<option value="">4,0</option>
								<option value="">5,0</option>
								<option value="">6,0</option>
							</select></fieldset>
							<span class="range_delimiter">-</span>
							<fieldset class="cfs_select"><select name="engine_to" id="engine_to" class=" range">
								<option value="">0,8</option>
								<option value="">1,2</option>
								<option value="">1,6</option>
								<option value="">1,9</option>
								<option value="">2,0</option>
								<option value="">2,5</option>
								<option value="">3,0</option>
								<option value="">4,0</option>
								<option value="">5,0</option>
								<option value="">6,0</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="fuel" class="dropdown_label">Fuel</label>
							<fieldset class="cfs_select"><select name="fuel" id="fuel" class="">
								<option value="">Gasoline</option>
								<option value="">Diesel</option>
								<option value="">LPG</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="drive" class="dropdown_label">Drive</label>
							<fieldset class="cfs_select"><select name="drive" id="drive" class="">
								<option value="">Front-wheel</option>
								<option value="">Rear-wheel</option>
								<option value="">4x4</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="milage_from" class="dropdown_label">Milage</label>
							<fieldset class="cfs_select"><select name="milage_from" id="milage_from" class=" range">
								<option value="">5.000</option>
								<option value="">10.000</option>
								<option value="">15.000</option>
								<option value="">20.000</option>
								<option value="">40.000</option>
								<option value="">60.000</option>
							</select></fieldset>
							<span class="range_delimiter">-</span>
							<fieldset class="cfs_select"><select name="milage_to" id="milage_to" class=" range">
								<option value="">5.000</option>
								<option value="">10.000</option>
								<option value="">15.000</option>
								<option value="">20.000</option>
								<option value="">40.000</option>
								<option value="">60.000</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="exterior_color" class="dropdown_label">Exterior color</label>
							<fieldset class="cfs_select"><select name="exterior_color" id="exterior_color" class="">
								<option value="">Black</option>
								<option value="">White</option>
								<option value="">Silver</option>
								<option value="">Red</option>
								<option value="">Blue</option>
							</select></fieldset>
						</fieldset>
						<fieldset>
							<label for="interior_color" class="dropdown_label">Interior color</label>
							<fieldset class="cfs_select"><select name="interior_color" id="interior_color" class="">
								<option value="">Dark grey</option>
								<option value="">Dark brown</option>
								<option value="">Light gray</option>
							</select></fieldset>
						</fieldset>
					</div>
				</form>
			</div>
			<div class="box">
				<h3>Online Support</h3>
				<div class="box-content widget_online_support">
					<div class="row">
						<img src="<?php echo PATH_IMAGE; ?>johnsdoe.jpg" alt="" class="span6">
						<div class="span6">
							<span class="online_support_title">John S. Doe</span>
							<p>Integer nisl nunc, porta id sodales et, pulvinar et risus.</p>
					</div></div>
					<a href="#" class="button blue big wide"><i class="icomoon-volume-medium"></i>+1 (555) 555 - 35 - 55</a>
					<a href="#">Contact Support Team</a><br>
					<a href="#" class="link_light_gray">Learn more about <strong>Motor</strong></a>
				</div>
			</div>
			<div class="box">
				<h3>Newsletter Signup</h3>
				<div class="box-content widget_newsletter">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, error?</p>
					<form action="#">
						<input type="text" name="name" placeholder="Name">
						<input type="text" name="email" placeholder="Email">
						<p class="newsletter_checkbox"><label for="special_offers" class="custom_checkbox"><input type="checkbox" name="special_offers" id="special_offers"> Receive special offers</label></p>
						<p class="newsletter_button"><a class="button submit red wider">Signup</a>
					</form>
				</div>
			</div>
		</div>
	</div>  