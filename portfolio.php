<?php
/*
Template Name: Portfolio Page
*/
get_header('sub'); ?>
<div class="content">
	<div class="page-splash">
		<div class="head-wrap page-title">
			<h1><span>Selected work.</span>Thoughtfully crafted for great clients.</h1>
		</div>
	</div>

	<div class="round-post" >

			<div class="case-study-block">
				<?php query_posts('posts_per_page=2'); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<div class="cs-info cs-block">
					<h1>SmartFlow</h1>
					<div class="cta-outline">
						<a>View case study</a>
					</div>
				</div>
				<div class="cs-project cs-block" >
					<a>View case study</a>
				</div>
				<?php endwhile; endif; ?>
			</div>
			
</div>
				
</div><!--content slide-->			
<?php get_footer(); ?>


