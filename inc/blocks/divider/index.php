<?php

/**
 * Divider Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'divider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$line_color = get_field('line_color') ? 'style="background-color: ' . get_field('line_color') . ';"' : '';
$divider_text = get_field('divider_text');
$text_color = get_field('text_color') ? 'style="color: ' . get_field('text_color') . ';"' : '';

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>

    <div class="container sr-reveal">
        <div class="divider__line" <?php echo $line_color; ?>></div>
        <?php if($divider_text) : ?>
            <div class="divider__text" <?php echo $text_color; ?>><?php echo $divider_text; ?></div>
        <?php endif; ?>
    </div>

</section>