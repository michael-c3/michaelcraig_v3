<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="apple-touch-icon" sizes="57x57" href="/fav/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/fav/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/fav/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/fav/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/fav/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/fav/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/fav/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/fav/apple-touch-icon-152x152.png">
	<link rel="icon" type="image/png" href="fav/favicon-196x196.png" sizes="196x196">
	<link rel="icon" type="image/png" href="/fav/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="/fav/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/fav/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/fav/favicon-16x16.png" sizes="16x16">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/fav/mstile-144x144.png">
	<script src="//fast.eager.io/sXpBOBz7eR.js"></script>
	<?php wp_head(); ?>
</head>
<body class="post-page">
	<header>		
		<div class="head-wrap">
			<label id="toggle-nav-label" for="toggle-nav"></label>
			<nav id="menu">
				<input type="checkbox" id="toggle-nav" class="mobile">
				<div class="box">
				<?php wp_nav_menu( array( 'theme_location' => 'sub', 'container'=> false ) ); ?>
				</div>
			</nav>
		</div>
	</header>
	
	
	
	<div id="newest-post">
			<?php $args = array( 'posts_per_page' => 1, 'category' => 1 );
				$myposts = get_posts( $args );
					foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					
					<div class="home-post">
						<div class="hp-title">
							<h4>Case studies for great<br> projects.</h4>
						</div>
						<div class="cs-block cs-info">
							<h1>SmartFlow</h1>
							<div class="cta-outline">
								<a href="<?php echo get_permalink();?>">View Case Study</a>
							</div>
							<div class="cs-tags">
								<?php the_tags( '<ul><li class="tag">', '</li><li class="tag">', '</li></ul>' ); ?>
							</div>
						</div>
						
						<div class="cs-project cs-block" >
							<?php the_post_thumbnail(array( 550, 600)); // Fullsize image for the single post ?>
						</div>
						<div style="clear: both;">
					</div>
						
				<?php endforeach; 
			wp_reset_postdata();?>
	</div>