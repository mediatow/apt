<?php 
/* 
* Template Name: Interior 
*/
get_header('basic'); 
?>

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<div id="content" class="maincopy">
	
			<div id="pagetitlebar">
				<a href="<?php the_permalink(); ?>" class="pagetitle"><?php the_title(); ?></a>
			</div></br>
						<?php the_content(); ?>

					
</div>
<?php endwhile; endif; ?>	
		

<?php get_footer(); ?>