<?php
/**
 * Template name: Client Stories Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$fields = get_fields();

$args = array(  
	'post_type' => 'client-story',
	'post_status' => 'publish',
	'posts_per_page' => 99999,
);

$loop = new WP_Query( $args ); 
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="entry-content wp-block-group no-top-spacing">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="cell small-12">
									<?php the_content();?>
								</div>
								<div class="cell small-12 tablet-8 wp-block-group no-top-spacing">
									<?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ):?>
										<hr class="m-0">
										<div class="filter grid-x grid-padding-x">
											<div class="cell shrink">
												<div class="p"><b>Categories:</b></div>
											</div>
											<div class="alm-filter-nav cell auto grid-x grid-padding-x align-right">
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
									<?php endif;?>
									<div class="cell small-12">
										<?php			

										if ( $loop->have_posts() ) : ?>
											<div class="stories-list">
												<hr>
												<?php while ( $loop->have_posts() ) : $loop->the_post();?>
												
													<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
														<a  href="<?=get_the_permalink();?>" rel="bookmark">
															<div class="inner grid-x grid-padding-x ps-40 pe-40">
																<div class="text cell auto weight-medium">
																	<div class="inner">
																		<h2 class="h2-hover-underline"><b><?php the_title();?></b></h2>
																	</div>
																</div>
																<div class="svg-wrap cell shrink">
																	<svg xmlns="http://www.w3.org/2000/svg" width="40" height="27.596" viewBox="0 0 40 27.596"><path data-name="Path 25" d="m17.3 0 10.695 10.574H0v6.448h28L17.3 27.6h8.981L40 13.787 26.285 0Z"/></svg>
																</div>
															</div>
														</a>
													</article>
													
												<?php
												endwhile;?>
											</div>
										<?php
										endif;
										wp_reset_postdata(); 
										?>

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