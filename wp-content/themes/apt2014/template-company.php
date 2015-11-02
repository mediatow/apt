<?php 
/* 
* Template Name: Company
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
				<div id="company">
					<ul id="membercompany">
						<?php
							$query_a = new WP_Query('post_type=companies&order=asc');
							if ( $query_a->have_posts() ) : while ( $query_a->have_posts() ) : $query_a->the_post();
							
						?>
						<li>
							<div class="companylogo">
								<?php 
									if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		  								the_post_thumbnail('full', array(
		  									//'width' => '363px',
		  									//'height'=> '200px'	
		  								));
									} 

									else {
										echo "<img src='".BASE_URL."/images/default.png'>";
									}
								?>
							</div>	
							<div>
								<div class="teamname"><?php the_title(); ?>
									
								</div>
								
									<div class="entry_meta">
										<div class="bioboxcompany">
											<div class="bio"><?php the_excerpt(); ?></div>											
											<a href="<?php echo get_post_meta(get_the_ID(), '_url', true); ?>" class="readbtn" target="_blank">Visit Site</a>											
											<div class="titlehighlights"><?php echo get_post_meta(get_the_ID(), '_title_highlights', true); ?></div>	
											<div class="highlights"><?php echo get_post_meta(get_the_ID(), '_highlights', true); ?></div>
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