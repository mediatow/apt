<?php 
/* 
* Template Name: Contact
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
						<li>								
							
							<div>
								<div class="teamname">
									US Headquarters
								</div>									
									<div class="entry_meta">
										<div class="bioboxcompany">
											 <?php dynamic_sidebar( 'usa-widget-area' ); ?> 									
											
										</div>									
									</div>
							</div>
						</li>
						<li>								
							
							<div>
								<div class="teamname">
									EU Headquarters
								</div>									
									<div class="entry_meta">
										<div class="bioboxcompany">
											<?php dynamic_sidebar( 'eu-widget-area' ); ?> 										
											
										</div>									
									</div>
							</div>
						</li>
						<li>								
							
							<div>
								<div class="teamname">
									Details
								</div>									
									<div class="entry_meta">
										<div class="bioboxcompany">
											<?php dynamic_sidebar( 'details-widget-area' ); ?> 										
											
										</div>									
									</div>
							</div>
						</li>
						
					</ul>
					<div class="contactform">
						<?php dynamic_sidebar( 'contact-widget-area' ); ?>
					</div>	
				</div>

					
</div>
<?php endwhile; endif; ?>	
		

<?php get_footer(); ?>