<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'insights',
            'title'             => __('Insights'),
            'description'       => __('A block to display Insights.'),
            'render_template'   => 'template-parts/blocks/insights.php',
            'category'          => 'formatting',
            'mode' => 'edit',
            'keywords'          => array( 'propr', 'custom', 'insights', 'posts' ),
        ));
    }
}