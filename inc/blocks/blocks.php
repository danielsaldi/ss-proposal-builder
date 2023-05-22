<?php
/**
 * Studio Science Theme
 *
 * @package Studio Science
 * @subpackage Island_Llama
 * @since Studio Science 0.0.0
 */

class registerAcfBlock {
    function __construct($name) {
        $this->name = $name;
        add_action('init', [$this, 'onInit']);
    }

    function onInit() {
        register_block_type(  __DIR__ . "/{$this->name}/block.json");
    }
}

function studioscience_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'studio-science-blocks',
                'title' => __( 'Studio Science', 'studio-science-blocks' ),
            ),
        )
    );
}
add_filter( 'block_categories_all', 'studioscience_block_category', 10, 2);

function studioscience_allowed_block_types( $allowed_blocks ) {
    return array(
        'acf/text-editor',
        'acf/main-banner',
        'acf/two-col-text',
        'acf/links-list',
        'acf/secondary-banner',
        'acf/animated-logos',
        'acf/divider',
        'acf/two-col-list',
        'acf/team',
        'acf/testimonials',
        'acf/timeline'
    );
}
add_filter( 'allowed_block_types_all', 'studioscience_allowed_block_types' );

new registerAcfBlock('text-editor');
new registerAcfBlock('main-banner');
new registerAcfBlock('two-col-text');
new registerAcfBlock('links-list');
new registerAcfBlock('secondary-banner');
new registerAcfBlock('animated-logos');
new registerAcfBlock('divider');
new registerAcfBlock('two-col-list');
new registerAcfBlock('team');
new registerAcfBlock('testimonials');
new registerAcfBlock('timeline');

