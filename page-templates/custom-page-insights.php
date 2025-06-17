<?php
/**
 * Template name: Insights Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$fields = get_fields();

$categories = get_categories([
	'hide_empty' => true,
	'exclude'    => get_cat_ID('Uncategorized'),
]);

?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="entry-content">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="cell small-12">
									<?php the_content();?>
								</div>
								<div class="cell small-12 tablet-8 wp-block-group no-top-spacing">
									<?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ):?>
										<hr class="m-0">
										<div class="filter grid-x grid-padding-x">
											<div class="cell small-12">
												<div class="p"><b>Categories:</b></div>
											</div>
											<div class="cell small-12">
												<div class="alm-filter-nav cell auto grid-x grid-padding-x">
													<div class="cell shrink">
														<button class="no-style" data-post-type="post" data-posts-per-page="6" data-category="" data-scroll="false" data-button-label="See More">
															All
														</button>
													</div>
													<?php foreach ( $categories as $term ):?>
														<div class="cell shrink">
															<button class="no-style" data-post-type="post" data-posts-per-page="6" data-category="<?=esc_attr($term->slug);?>" data-scroll="false" data-button-label="See More <?=esc_html( $term->name );?>">
																<?=esc_html( $term->name );?>
															</button>
														</div>
													<?php endforeach;?>										
												</div>
											</div>
										</div>
									<?php endif;?>
									<div class="cell small-12">
										<hr class="m-0">
										<?=do_shortcode('[ajax_load_more id="alm_3756513388" post_type="post" scroll="false" posts_per_page="6" container_type="div" button_label="<span>See More</span>" button_loading_label="<span>Loading More...</span>"]');?>
									</div>
								</div>
								<aside class="cell small-12 tablet-4">
									<?php dynamic_sidebar( 'insights-sidebar' ); ?>
								</aside>
							</div>
						</div>
					</div><!-- .entry-content -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();