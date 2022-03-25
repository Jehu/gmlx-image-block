<?php
add_filter( 'rwmb_meta_boxes', 'mwe_blocks' );

function mwe_blocks( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'           => __( 'Block Starter', 'mwe-blocks' ),
        'id'              => 'block-starter',
        'category'        => 'kadence-blocks',
        'supports'        => [
            'align'           => [ 'left', 'right', 'wide', 'full' ],
            'customClassName' => true,
            'anchor'          => false,
            'mode'            => 'preview',
        ],
        'render_template' => plugin_dir_path( __FILE__ ) . 'template.php',
        'enqueue_style'   => plugin_dir_url( __FILE__ ) . 'style.css',
        'enqueue_script'  => plugin_dir_url( __FILE__ ) . 'script.js',
        'type'            => 'block',
        'context'         => 'content',
        'fields'          => [
            [
                'name' => __( 'My Text', 'mwe-blocks' ),
                'id'   => $prefix . 'my_text',
                'type' => 'text',
            ],
            [
                'name' => __( 'My URL', 'mwe-blocks' ),
                'id'   => $prefix . 'my_url',
                'type' => 'url',
            ],
        ],
    ];

    return $meta_boxes;
}