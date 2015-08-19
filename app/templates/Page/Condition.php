<main>
  <section id="content" class="clearfix">
		<div class="container_12">
			<div class="grid_12">
        <h2 class="page_title with_filter">
          <?php echo $page->getParameterById($lng, $page->getIdByRewrite($lng, $lvl1), 'name'); ?>
        </h2>
        <?php echo $content->getText($lng, 1); ?>
			</div>
		</div>
	</section>
</main>