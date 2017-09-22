<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EduPress
 */

get_header(); ?>

	<div id="site-main" class="content-home">

		<div class="wrapper wrapper-main clearfix">
		
			<div class="wrapper-frame clearfix">

				<?php get_sidebar(); ?>

				<main id="site-content" class="site-main" role="main">
				
					<?php while ( have_posts() ) : the_post(); ?>
					
					<div class="site-content-wrapper clearfix">
	
						<?php if ( has_post_thumbnail() && 1 == get_theme_mod( 'edupress_single_featured_image', 1 ) ) { ?>
						<div class="thumbnail-post-intro">
							<?php the_post_thumbnail('edupress-large-thumbnail'); ?>
						</div><!-- .thumbnail-post-intro -->
						<?php } ?>

						<?php get_template_part( 'template-parts/content', 'single' ); ?>
						
					</div><!-- .site-content-wrapper .clearfix -->
					
					<?php endwhile; // End of the loop. ?>
				
				</main><!-- #site-content -->
				
			</div><!-- .wrapper-frame -->
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

<?php get_footer(); ?>