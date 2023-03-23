<nav class="navbar navbar-dark navbar-expand-md">
	<div class="container">
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="/"><?php echo get_bloginfo('name'); ?> </a>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav mr-auto">
				<?php
				$pages = get_pages();
				foreach ($pages as $page) {
				?>
					<li class="nav-item"><a href="<?php echo $page->guid; ?>" class="nav-link <?php if (get_the_title() == $page->post_title) {
																									echo 'active';
																								} ?>"><?php echo $page->post_title; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>