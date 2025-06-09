<?php

/* Template Name: Book Page */

get_header();

$book_image = get_field('book_image');
$buy_link = get_field('buy_link');
$heading = get_field('heading');
$copy = get_field('copy');
$quotes = get_field('quotes');
$details = get_field('details');
$library_of_congress = get_field('library_of_congress');
?>


	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<?php if( !empty(get_field('heading')) ):?>
				<div class="section-title ">
					<h1><b><?php the_field('heading');?></b></h1>
				</div>
				<?php endif;?>
			</div>
			<div class="cell small-12 tablet-8">
				<?php the_content();?>
			</div>

			<div class="details-wrap cell small-12 tablet-4">
				<?php if( !empty( $book_image ) ) {
					$imgID = $book_image['ID'];
					$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
					$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
					echo '<div class="img-wrap book-img desktop-img d-none d-lg-block">';
					echo $img;
					echo '</div>';
				}?>

				<?php
				$link = $buy_link;
				if( $link ):
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
				<div class="link-wrap">
					<a class="button"  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
						<span><?php echo esc_html( $link_title ); ?></span>

					</a>
				</div>
				<?php endif; ?>

				<div class="details">
					<?php echo $details;?>
				</div>

				<div class="library-of-congress">
					<?php echo $library_of_congress;?>
				</div>

				<?php
				$link = $buy_link;
				if( $link ):
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
				<div class="link-wrap">
					<a class="button"  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
						<span><?php echo esc_html( $link_title ); ?></span>
				
					</a>
				</div>
				<?php endif; ?>

			</div>

		</div>



	</div>

<?php
get_footer(); ?>
