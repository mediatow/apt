<?php get_header(); ?>

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<div id="content" class="maincopy">	
	
		<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a></br>
		<?php the_content(); ?>
	
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>