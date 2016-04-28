<?php 
	if (is_page('contact') ) {
		
		if(function_exists('wpcf7_enqueue_scripts')) {
		wpcf7_enqueue_scripts();
		
		get_header('page');
		
	}
	
	else {
		get_header();
	}
}
	 ?>
	
<div class="content">
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<section class="" >
		<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
		<?php the_post_thumbnail(1000, 400); // Fullsize image for the single post ?>
	</section>
<?php endif; ?>
	<div class="page-content">
		<div class="head-wrap page-title">
		<h1 title="<?php the_title(); ?>"><?php the_title(); ?></h1>
		</div>
		<?php the_content(); // Dynamic Content ?>	
	
		
						
	</div>
	<?php endwhile; ?>
			<?php else: ?>
				<article>
					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
				</article>
			<?php endif; ?>
</div>
<?php 
	
	if (is_page('contact') ) {
		
		get_footer('contact');
		
	}
	
	else {
		get_footer();
	}
	
	?>

