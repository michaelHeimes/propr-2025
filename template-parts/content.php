<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */
$global_more_insights_heading = get_field('global_more_insights_heading', 'option') ?? null;
$source = get_field('source') ?? 'recent';
$number_of_insights_to_show = get_field('number_of_insights_to_show') ?? 3;
if( $source == 'picker' ) {
	$posts = get_field('more_insights') ?? null;
} else {
	$posts_query = new WP_Query([
		'post_type' => 'post',
		'posts_per_page' => $number_of_insights_to_show,
		'post_status' => 'publish',
		'post__not_in'   => [ get_the_ID() ],
	]);
	$posts = $posts_query->have_posts() ? $posts_query->posts : [];
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="grid-container wp-block-group no-top-spacing">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-12 tablet-10">
				<div class="entry-container">
					<header class="entry-header"> 
						<div class="grid-x grid-padding-x">
							<?php
							$prev_post = get_previous_post();
							$next_post = get_next_post();
							?>
							
							<div class="post-navigation cell shrink grid-x p">
								<?php if ( $prev_post ) : ?>
									<div class="cell shrink">
										<a class="prev-post" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
											prev
										</a>
									</div>
								<?php endif; ?>
								<?php if ( $prev_post &&  $next_post  ) : ?>
									<div class="cell shrink">
										<div class="pipe">|</div>
									</div>
								<?php endif; ?>
								<?php if ( $next_post ) : ?>
									<div class="cell shrink">
										<a class="next-post" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
											next
										</a>
									</div>
								<?php endif; ?>
							</div>
							<div class="cell auto">
								<?php
									$post_id = get_the_ID();
									$tags = get_the_tags($post_id);
									if ($tags && !is_wp_error($tags)):
								?>
									<div class="tags grid-x grid-padding-x align-right">
										<?php foreach ($tags as $tag):?>
											<div class="cell shrink p weight-medium">
												<?='#' . esc_html($tag->name);?>
											</div>
										<?php endforeach;?>
									</div>
								<?php endif;?>
							</div>
						</div>
						<hr>
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;
				
						?>
					</header><!-- .entry-header -->
	
					<div class="entry-content">
						<?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'trailhead' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);
				
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'trailhead' ),
								'after'  => '</div>',
							)
						);
						?>
					</div><!-- .entry-content -->
				
					<?php if( !empty($global_more_insights_heading ) || $posts ):?>
						<footer class="entry-footer ps-40 pe-40">
							<?php if( !empty($global_more_insights_heading ) ):?>
								<h2><b><?=esc_html($global_more_insights_heading );?></b></h2>
							<?php endif;?>
							<ul class="no-bullet posts-wrap posts-title-list">
								<?php $i = 1; foreach($posts as $post):
									setup_postdata($post);    
									$link = get_the_permalink($post);
									$title = $post->post_title;
								?>
									<li>
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<a href="<?=esc_url($link);?>" rel="bookmark">
												<?php if( $i == 1 ):?>
													<div class="cell small-12">
														<hr class="m-0">
													</div>
												<?php endif;?>
												<div class="grid-x align-middle">
													<div class="cell small-3">
														<b>POST:</b>
													</div>
													<div class="cell auto weight-medium title">
														<?=$title;?>
													</div>
													<div class="cell shrink">
														<svg xmlns="http://www.w3.org/2000/svg" width="40" height="27.596" viewBox="0 0 40 27.596"><path data-name="Path 25" d="m17.3 0 10.695 10.574H0v6.448h28L17.3 27.6h8.981L40 13.787 26.285 0Z"/></svg>
													</div>
												</div>
												<div class="cell small-12">
													<hr class="m-0">
												</div>
											</a>
										</article>
									</li>
								<?php $i++; endforeach;
									wp_reset_postdata();
								?>
							</ul>
						</footer><!-- .entry-footer -->
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
