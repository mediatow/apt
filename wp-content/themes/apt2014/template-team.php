<?php 
/* 
* Template Name: Team
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
				<div id="team">
					<ul id="member">
						<?php
							$query_a = new WP_Query('post_type=leaders&order=asc');
							if ( $query_a->have_posts() ) : while ( $query_a->have_posts() ) : $query_a->the_post();
							
						?>
						<li>
								
							<?php 
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	  								the_post_thumbnail('full', array(
	  									'width' => '200px',
	  									'height'=> '200px'	
	  								));
								} 

								else {
									echo "<img src='".BASE_URL."/images/default.png'>";
								}
							?>
							
							<div>
								<div class="teamname"><?php the_title(); ?>
									<p><?php echo get_post_meta(get_the_ID(), '_title', true); ?></p>
								</div>
								
									<div class="entry_meta">
										<div class="biobox">
											<p><?php the_excerpt(); ?></p>
											<a href="<?php the_permalink(); ?>" class="readbtn">Read More</a>	
											
										</div>									
									</div>
							</div>
						</li>
						<?php 
							wp_reset_postdata();
							endwhile; endif;
						?>
					</ul>	
				</div>

					
</div>
<?php endwhile; endif; ?>	
		

<?php get_footer(); ?>