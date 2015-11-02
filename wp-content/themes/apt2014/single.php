<?php get_header('basic'); ?>

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();

/*$meta = get_post_meta($post->ID);
$price = $meta['price'][0];
$description = $meta['description'][0];*/

?>
<div id="content">
	<div class="biobox2">		
		
		<div class="teamname"><?php the_title(); ?></div></br>
			<?php the_content(); ?>
		</div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>