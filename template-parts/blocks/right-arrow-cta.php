<?php

/**
 * Large Colored Copy Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'right-arrow-cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'right-arrow-cta custom-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$link = get_field('link') ?? null;
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <?php if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="grid-x grid-padding-x align-middle" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                <div class="cell auto">
                    <h2 class="h2-hover-underline"><?php echo esc_html( $link_title ); ?></h2>
                </div>
                <div class="cell shrink">
                    <svg xmlns="http://www.w3.org/2000/svg" width="39.137" height="33.079" viewBox="0 0 39.137 33.079"><path data-name="Path 78" d="m13.25 0 13.232 13.232H0v6.616h26.482L13.25 33.079h9.35l16.54-16.54L22.6 0Z"/></svg>
                </div>
            </a>
        <?php endif; ?>
</div>