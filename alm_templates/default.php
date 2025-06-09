<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?=get_the_permalink();?>" rel="bookmark">
		<div class="inner grid-x">
			<div class="text cell auto weight-medium">
				<div class="inner">
					<h2 class="h2-hover-underline"><?php the_title();?></h2>
					<div class="excerpt-tags">
						<?php 
							$post_id = $post_id ?: get_the_ID();
							$excerpt = get_the_excerpt($post_id);
							$word_limit = 20;
						
							if (!empty($excerpt)) {
								// Strip anchor tags from excerpt
								$excerpt_no_links = preg_replace('#<a.*?>(.*?)</a>#i', '$1', $excerpt);
								$text = wp_strip_all_tags($excerpt_no_links);
						
								// Limit to 20 words
								$words = explode(' ', $text);
								if (count($words) > $word_limit) {
									$words = array_slice($words, 0, $word_limit);
									$text = implode(' ', $words) . '...';
								}
						
								echo '<p><b>' . esc_html($text) . '</b></p>';
								
							} else {
								$content = get_post_field('post_content', $post_id);
								$text = wp_strip_all_tags($content);
						
								$words = explode(' ', $text);
								if (count($words) > $word_limit) {
									$words = array_slice($words, 0, $word_limit);
									$text = implode(' ', $words) . '...';
								}
						
								echo '<p><b>' . esc_html($text) . '</b></p>';
							}
						?>
						<?php
							$tags = get_the_tags($post_id);
							if ($tags && !is_wp_error($tags)):
						?>
							<div class="tags grid-x grid-padding-x">
								<?php foreach ($tags as $tag):?>
									<div class="cell shrink p weight-medium">
										<?='#' . esc_html($tag->name);?>
									</div>
								<?php endforeach;?>
							</div>
						<?php endif;?>
					</div>
				</div>
			</div>
			<div class="svg-wrap cell shrink">
				<svg xmlns="http://www.w3.org/2000/svg" width="40" height="27.596" viewBox="0 0 40 27.596"><path data-name="Path 25" d="m17.3 0 10.695 10.574H0v6.448h28L17.3 27.6h8.981L40 13.787 26.285 0Z"/></svg>
			</div>
		</div>
		<div class="cell small-12">
			<hr class="m-0">
		</div>
	</a>
</article>