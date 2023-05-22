<?php

/**
 * Main Banner Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'main-banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$tagline = get_field('tagline');
$heading = get_field('heading');
$content_max_width = get_field('content_max_width') ? 'style="max-width: ' . get_field('content_max_width') . 'px;"' : '';
$video = get_field('video');
$background_image = studioscience_get_attachment(get_field('background_image'));
$bg_image = $background_image['src'] ? 'style="background-image: url(' . $background_image['src'] . ');"' : '';

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>" <?php echo $bg_image; ?>>

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>
    <?php if($video) : ?>
         <video class="main-banner__video" autoplay muted loop playsinline>
            <source src="<?php echo $video; ?>" type='video/mp4' />
            <?php if($background_image['src']) : ?>
                <img src="<?php echo $background_image['src']; ?>" title="Your browser does not support the <video> tag">
            <?php endif; ?>
        </video>
    <?php endif; ?>
    
    <div class="container">
        <div class="main-banner__content">
            <div class="main-banner__content__text sr-reveal" <?php echo $content_max_width; ?>>
                <?php get_template_part( 'inc/partials/heading', '', array('heading' => $tagline ) ); ?>
                <?php get_template_part( 'inc/partials/heading', '', array('heading' => $heading ) ); ?>
            </div>
        </div>
    </div>
   
</section>