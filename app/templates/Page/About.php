<main>
  <section id="content" class="clearfix">
		<div class="container_12">
			<div class="grid_8">
        <h2 class="page_title with_filter">
          <?php echo $page->getParameterById($lng, $page->getIdByRewrite($lng, $lvl1), 'name'); ?>
        </h2>
        <?php echo $content->getText($lng, 2); ?>
			</div>
			<div class="grid_4 sidebar">
				<div class="box">
					<h3>Online Support</h3>
					<div class="box-content widget_online_support">
						<div class="row">
							<img src="images/johnsdoe.jpg" alt="" class="span6">
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
							<p class="newsletter_button"><a class="button submit red wider">Signup</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>