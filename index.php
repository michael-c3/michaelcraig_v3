<?php get_header('sub');?>
<section class="page-head" >
	<div id="blog-logo">
		<a><img src="<?php bloginfo('template_directory'); ?>/img/blog-logo.png"></a>
	</div>
</section>
<div class="blog-content">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="blog-post">
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					
				</a>
			
			<?php endif; ?>
			<div class="blog-wrap">
				<div class="blog-image">
					<?php the_post_thumbnail(50,50); // Fullsize image for the single post ?>
				</div>
				<div class="blog-info">
					<h1  class="blog-title" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>.</a></h1>
					<small class="blog-time"><?php the_time('F jS, Y'); ?></small>
					<small class="wp-tags"><?php the_tags(); ?></small>
				</div>
				
					<div class="excerpt">
						<?php the_excerpt('read this article'); ?>
					</div>
					<div class="cta-button" id="hire-me">
						<a href="<?php the_permalink(); ?>">Read it</a>
					</div>
			</div>
	</div>
	<br><br>

<?php endwhile; ?>
	<?php else: ?>
		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
		</article>
<?php endif; ?>

</div>
<?php get_footer('blog');?>

