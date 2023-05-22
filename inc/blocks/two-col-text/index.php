<?php

/**
 * Two Col Text Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'two-col-text';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading = get_field('heading');
$text_color = get_field('text_color') ? 'style="color: ' . get_field('text_color') . ';"' : '';
$content = get_field('content');
$cta = get_field('cta');

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>
    <div class="container" <?php echo $text_color; ?>>
        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-3">
                <?php get_template_part( 'inc/partials/heading', '', array('heading' => $heading ) ); ?>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-9">
                <?php if($content) : ?>
                    <div class="two-col-text__text sr-reveal">
                        <?php echo $content;  ?>
                    </div>
                <?php endif; ?>
                <?php get_template_part( 'inc/partials/link', '', array('link' => $cta, 'classes' => 'btn' ) ); ?>
            </div>
        </div>
    </div>

</section>