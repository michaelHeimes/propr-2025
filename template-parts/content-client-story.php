<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */
$client_story_entry_content_footer = get_field('client_story_entry_content_footer', 'option') ?? null;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="grid-container wp-block-group no-top-spacing">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-12 tablet-10">
				<div class="entry-container">
					<header class="entry-header"> 
						<h1 class="entry-title"><b>Client Stories: <?php the_title();?></b></h1>
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
				</div>
				<?php if( !empty($client_story_entry_content_footer) ):?>
					<footer class="entry-footer">
						<hr>
						<div class="cta ps-40 pe-40">
							<?=wp_kses_post($client_story_entry_content_footer);?>
						</div>
					</footer><!-- .entry-footer -->
				<?php endif;?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<div class="grid-container wp-block-group">
	<?php dynamic_sidebar( 'post-footer' ); ?>
</div>
