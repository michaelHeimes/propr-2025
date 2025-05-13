<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="grid-x align-middle" href="<?=get_the_permalink();?>" rel="bookmark">
		<?php if( $i == 1 ):?>
			<hr class="top">
		<?php endif;?>
		<div class="cell auto weight-medium title">
			<?php the_title();?>
		</div>
		<div class="cell shrink">
			<svg xmlns="http://www.w3.org/2000/svg" width="40" height="27.596" viewBox="0 0 40 27.596"><path data-name="Path 25" d="m17.3 0 10.695 10.574H0v6.448h28L17.3 27.6h8.981L40 13.787 26.285 0Z"/></svg>
		</div>
		<hr>
	</a>
</article>