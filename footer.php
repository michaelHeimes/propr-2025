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
$address_heading = get_field('footer_address_heading', 'option') ?? null;
$address_text = get_field('footer_address_text', 'option') ?? null;
$map_image = get_field('footer_map_image', 'option') ?? null;
$subfooter_links = get_field('footer_subfooter_links', 'option') ?? null;
?>

				<footer id="colophon" class="site-footer">
					<div class="site-info">
						<div class="grid-container">
							<div class="schedule-link-wrap grid-x grid-padding-x align-center">
								<div class="cell small-12 xlarge-10">
									<a class="button" href="https://savvycal.com/propr/CS" data-savvycal-embed=""><span>Shedule A Call</span></a>
								</div>
							</div>
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
									<div class="cell shrink p">
										<b>&copy; 2014-<?=date('Y');?> Propr</b>
									</div>
									<?php if( $subfooter_links ):?>
										<div class="cell auto grid-x  align-middle align-right">
											<ul class="menu horizontal">
												<?php foreach($subfooter_links as $subfooter_link):
													$link = $subfooter_link['link'] ?? null;
													if( $link ): 
														$link_url = $link['url'];
														$link_title = $link['title'];
														$link_target = $link['target'] ? $link['target'] : '_self';	
												?>
													<li>
														<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
															<b><?php echo esc_html( $link_title ); ?></b>
														</a>
													</li>
												<?php endif; endforeach;?>
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
