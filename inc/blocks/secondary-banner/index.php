<?php

/**
 * Secondary Banner Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'secondary-banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$tagline = get_field('tagline');
$heading = get_field('heading');
$text_color = get_field('text_color') ? 'style="color: ' . get_field('text_color') . ';"' : '';
$content_max_width = get_field('content_max_width') ? 'style="max-width: ' . get_field('content_max_width') . 'px;"' : '';
$image = studioscience_get_attachment(get_field('image'));
$image_max_width = get_field('image_max_width') ? 'style="max-width: ' . get_field('image_max_width') . 'px;"' : '';

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>" <?php echo $text_color; ?>>

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>
    
    <div class="container">
        <div class="secondary-banner__content sr-reveal" <?php echo $content_max_width; ?>>
            <?php if($tagline['heading_text']) : ?>
                <div class="secondary-banner__tagline">
                    <?php get_template_part( 'inc/partials/heading', '', array('heading' => $tagline ) ); ?>
                </div>
            <?php endif; ?>
            <?php if($heading['heading_text']) : ?>
                <div class="secondary-banner__heading">
                    <?php get_template_part( 'inc/partials/heading', '', array('heading' => $heading ) ); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if($image) : ?>
            <div class="secondary-banner__image">
                <img src="<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>" <?php echo $image_max_width; ?>>
            </div>
        <?php endif; ?>
    </div>
   
</section>