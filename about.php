<?php
/*
Template Name: About Page
*/

get_header('sub'); ?>

<div class="content">
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="page-splash">
		<div class="head-wrap page-title">
			<h1>About</h1>
		</div>
	</div>
	<div>
		<div class="block" id="home-i-block">
			<h2>Interfaces that solve problems.</h2>
		</div>
		<div class="block" id="home-im-block">
			<img src="<?php bloginfo('template_directory'); ?>/img/device.jpg">
		</div>
	</div>
	<div class="case-study-block">
		<div class="cs-info cs-block">
				<h1>SmartFlow</h1>
				<div class="cta-outline">
					<a>View case study</a>
				</div>
		</div>
		<div class="cs-project cs-block" >
			<a>View case study</a>
		</div>
	</div>
	<div class="case-study-block">
		<div class="cs-info cs-block">
				<h1>SmartFlow</h1>
				<div class="cta-outline">
					<a>View case study</a>
				</div>
		</div>
		<div class="cs-project cs-block" >
			<a>View case study</a>
		</div>
	</div>
	<div class="case-study-block">
		<div class="cs-info cs-block">
				<h1>SmartFlow</h1>
				<div class="cta-outline">
					<a>View case study</a>
				</div>
		</div>
		<div class="cs-project cs-block" >
			<a>View case study</a>
		</div>
	</div>
			<?php endwhile; ?>
			<?php else: ?>
				<article>
					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
				</article>
			<?php endif; ?>
</div>

<?php get_footer(); ?>