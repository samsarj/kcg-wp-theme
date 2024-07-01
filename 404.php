<?php
get_header(); ?>



<section class="page-container">
<div id="primary" class="page-content content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'kcg' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'This page doesn\'t appear to exist', 'kcg' ); ?></h2>
					<p><?php _e( 'As it looks like nothing was found at this location, maybe try searching instead?', 'kcg' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->
</section>

<?php get_footer(); ?>