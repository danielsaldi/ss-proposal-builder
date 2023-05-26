<?php

/**
 * Text Editor Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-editor';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading = get_field('heading');
$content = get_field('content');
$cta = get_field('cta');
$title_color = get_field('title_color') ? 'style="color: ' . get_field('title_color') . ';"' : '';
$text_color = get_field('text_color') ? 'style="color: ' . get_field('text_color') . ';"' : '';
$content_max_width = get_field('content_max_width') ? 'style="max-width: ' . get_field('content_max_width') . 'px;"' : '';

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>" <?php echo $text_color; ?>>

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>

    <div class="container">
        <div class="text-editor__content sr-reveal" <?php echo $content_max_width; ?>>
            <?php if($heading['heading_text']) : ?>
                <div class="text-editor__heading" <?php echo $title_color; ?>>
                    <?php get_template_part( 'inc/partials/heading', '', array('heading' => $heading ) ); ?>
                </div>
            <?php endif; ?>
            <?php if($content) : ?>
                <?php echo $content;  ?>
            <?php endif; ?>
            <?php get_template_part( 'inc/partials/link', '', array('link' => $cta, 'classes' => 'btn' ) ); ?>
        </div>
    </div>

</section>