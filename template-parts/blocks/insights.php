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
$id = 'insights-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'insights custom-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$source = get_field('source') ?? null;
$number_to_show = get_field('number_to_show') ?? 5;
$insights = get_field('insights') ?? null;

if($source == 'latest') {
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => $number_to_show,
        'post_status'    => 'publish',
    ];
    
    $query = new WP_Query($args);
    $posts = $query->posts;
}

if($source == 'selected') {
    $posts = $insights ?? null;
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <?php if ( $posts ) :?>
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
        <?php endif;?>
</div>