<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */
$footer_button_link = get_field('footer_button_link', 'option') ?? null;
$address_heading = get_field('footer_address_heading', 'option') ?? null;
$address_text = get_field('footer_address_text', 'option') ?? null;
$map_image = get_field('footer_map_image', 'option') ?? null;
$subfooter_links = get_field('footer_subfooter_links', 'option') ?? null;
$footer_social_links = get_field('footer_social_links', 'option') ?? null;
$hide_footer_cta_button_link = get_field('hide_footer_cta_button_link');
?>

				<footer id="colophon" class="site-footer">
					<div class="site-info">
						<div class="grid-container">
							<?php if( $footer_button_link && !$hide_footer_cta_button_link):
								$link = $footer_button_link;
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<div class="schedule-link-wrap grid-x grid-padding-x align-center">
									<div class="cell small-12 xlarge-10">
										<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>	
									</div>
								</div>
							<?php endif;?>
							<?php if( $address_heading || $address_text || $map_image ):?>
								<div class="bordered-boxes grid-x grid-padding-x align-center">
									<?php if( $address_heading || $address_text ):?>
										<div class="cell small-12 medium-6 tablet-4">		
											<div class="bordered padded">								
												<?php if( $address_heading ):?>
													<p class="title"><b><?=wp_kses_post( $address_heading );?></b></p>
												<?php endif;?>
												<?php if( $address_text ):?>
													<p><?=wp_kses_post( $address_text );?></p>
												<?php endif;?>
											</div>
										</div>
									<?php endif;?>
									<?php if( $map_image ):?>
										<div class="cell small-12 medium-6 tablet-4">
											<div class="bordered map-wrap">
												<?=wp_get_attachment_image( $map_image['id'], 'large' );?>
											</div>
										</div>
									<?php endif;?>
									<div class="cell small-12 tablet-4">
										<div class="bordered padded">
											<p class="title"><b>Navigation</b></p>
											<?php trailhead_footer_links();?>
										</div>
									</div>
								</div>
							<?php endif;?>
							<div class="subfooter bordered padded">
								<div class="grid-x grid-padding-x">
									<div class="cell small-12 tablet-shrink p grid-x alig-middle">
										<b class="copyright">&copy; 2014-<?=date('Y');?> Propr</b>
										<?php if( $subfooter_links ):?>
											<span class="show-for-tablet">&nbsp;|&nbsp;</span>
											<ul class="menu horizontal">
												<?php 
													$i = 1; 
													$count = count($subfooter_links);
													foreach($subfooter_links as $subfooter_link):
														$link = $subfooter_link['link'] ?? null;
														if( $link ): 
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';	
												?>
													<li class="grid-x align-middle">
														<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
															<b><?php echo esc_html( $link_title ); ?></b>
														</a>
													</li>
													<?php if( $i !== $count ):?>
														<span class="show-for-tablet">&nbsp;|&nbsp;</span>
													<?php endif;?> 
												<?php endif; $i++; endforeach;?>
											</ul>
										<?php endif;?>
									</div>
									<?php if( $footer_social_links ):?>
										<div class="cell small-12 tablet-auto grid-x  align-middle align-right">
											<ul class="menu horizontal">
												<?php 
													$i = 1; 
													$count = count($footer_social_links);
													foreach($footer_social_links as $footer_social_link):
														$link = $footer_social_link['link'] ?? null;
														if( $link ): 
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';	
												?>
													<li class="grid-x align-middle">
														<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
															<b><?php echo esc_html( $link_title ); ?></b>
														</a>
													</li>
													<?php if( $i !== $count ):?>
														<span class="show-for-tablet">&nbsp;|&nbsp;</span>
													<?php endif;?> 
												<?php endif; $i++; endforeach;?>
											</ul>
										</div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
					
<?php wp_footer(); ?>

</body>
</html>
