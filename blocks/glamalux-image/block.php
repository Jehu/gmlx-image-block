<?php
add_filter( 'rwmb_meta_boxes', 'glamalux_image' );

function glamalux_image_image_sizes() {
    $all_sizes = wp_get_registered_image_subsizes();
    $keyed_sizes =  array_keys($all_sizes);
    $keyed_sizes['full'] = 'full';
    return array_combine($keyed_sizes, $keyed_sizes);
}

function glamalux_image( $meta_boxes ) {
    $prefix = 'glamalux-image_';

    $meta_boxes[] = [
        'title'           => __( 'glamalux Image', 'mwe-starter' ),
        'id'              => 'glamalux-image',
        'icon'            => 'camera-alt',
        'category'        => 'media',
        'keywords'        => ['image', 'bild'],
        'supports'        => [],
        'render_template' => plugin_dir_path( __FILE__ ) . 'template.php',
        'enqueue_style'   => plugin_dir_url( __FILE__ ) . 'style.css',
        //'enqueue_script'  => plugin_dir_url( __FILE__ ) . 'script.js',
        /* 'enqueue_assets' => function() {
          wp_enqueue_style( 'aos-css', '//unpkg.com/aos@2.3.1/dist/aos.css', [], '2.3.1' );
          wp_enqueue_script( 'aos-js', '//unpkg.com/aos@2.3.1/dist/aos.js', [], '2.3.1', true );
          wp_enqueue_script( 'glamalux-image', plugin_dir_url( __FILE__ ) . 'script.js', ['aos-js'], '', true );
        }, */
        'type'            => 'block',
        'context'         => 'side',
        'fields'          => [
            [
                'name' => __( 'Image', 'mwe-starter' ),
                'id'   => $prefix . 'single_image',
                'type' => 'single_image'
            ],
            [
                'name'    => __( 'Image Size', 'mwe-starter' ),
                'id'      => $prefix . 'image_size',
                'type'    => 'select',
                'options' => glamalux_image_image_sizes(),
                'std'     => 'medium',
            ],
            [
                'name'    => __( 'Hover effect', 'mwe-starter' ),
                'id'      => $prefix . 'image_hover_effect',
                'type'    => 'checkbox',
                'std'     => true
            ],
            [
                'name'    => __( 'Entry animation', 'mwe-starter' ),
                'id'      => $prefix . 'image_animation',
                'type'    => 'checkbox',
                'std'     => true
            ],
            [
                'name'    => __( 'Caption Type', 'mwe-starter' ),
                'id'      => $prefix . 'caption_type',
                'type'    => 'select',
                'options' => [
                    'inside' => __( 'inside', 'mwe-starter' ),
                    'below'  => __( 'below', 'mwe-starter' ),
                ],
                'std'     => 'inside',
            ],
            [
                'name' => __( 'Caption', 'mwe-starter' ),
                'id'   => $prefix . 'caption',
                'type' => 'text',
            ],
            [
                'name' => __( 'Caption Subtitle', 'mwe-starter' ),
                'id'   => $prefix . 'caption_subtitle',
                'type' => 'text',
                'visible'    => [
                    'when'     => [['caption_type', '!=', 'below']],
                    'relation' => 'or',
                ],
            ],
            [
                'name'    => __('Caption alignment', 'mwe-starter'),
                'id'      => $prefix . 'caption_alignment',
                'type'    => 'radio',
                'options' => [
                    'left' => __('Left', 'mwe-starter'),
                    'right' => __('Right', 'mwe-starter')
                ],
                'std'     => 'left',
            ],
            [
                'name'    => __( 'Caption Font', 'mwe-starter' ),
                'id'      => $prefix . 'caption_font',
                'type'    => 'select',
                'options' => [
                    'script' => __( 'Julietta Messie', 'mwe-starter' ),
                    'sans'   => __( 'Lato', 'mwe-starter' ),
                ],
                'std'     => 'sans',
            ],
            [
                'name'    => __( 'Lightbox', 'mwe-starter' ),
                'id'      => $prefix . 'lightbox',
                'type'    => 'radio',
                'options' => [__( 'No','mwe-starter'), __( 'Yes', 'mwe-starter' )],
                'std'     => 0,
            ],
            [
                'name'       => __( 'Internal Link', 'mwe-starter' ),
                'id'         => $prefix . 'internal_link',
                'type'       => 'post',
                'post_type'  => ['post', 'page'],
                'field_type' => 'select_advanced',
                'visible'    => [
                    'when'     => [['lightbox', '=', 0]],
                    'relation' => 'or',
                ],
            ],
        ],
    ];

    return $meta_boxes;
}