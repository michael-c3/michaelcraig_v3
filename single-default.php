<?php get_header();?>
<div class="content">
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="post-head" >
		<div class="thumbnail-bg"<?php

    if ( $thumbnail_id = get_post_thumbnail_id() ) {
        if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'full-bg' ) )
            printf( ' style="background-image: url(%s);"', $image_src[0] );     
    }

?>>
		<div class="head-wrap post-title">
			<h1 title="<?php the_title(); ?>"><?php the_title(); ?></h1>
		</div>
	</div>
	</div>
	<div class="page-content">
		<?php the_content(); // Dynamic Content ?>
	</div>
	<?php endwhile; ?>
			<?php else: ?>
				<article>
					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
				</article>
			<?php endif; ?>
</div>
<?php get_footer();?>

