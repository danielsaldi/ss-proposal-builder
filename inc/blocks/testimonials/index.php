<?php

/**
 * Testimonials Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonials';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$testimonials = get_field('testimonials');

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>" <?php echo $text_color; ?>>

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>

    <div class="container">
        <?php if($testimonials) : ?>
            <div class="testimonials__slider">
               
                <?php foreach($testimonials as $t) : 
                    $company = get_field('company', $t);
                    $name = get_field('name', $t);
                    $position = get_field('title', $t);
                    $quote = get_field('quote', $t);
                    $image = studioscience_get_attachment( get_field('image', $t) );
                    ?>

                    <div class="testimonials__slider__item">
                        <?php if($quote) : ?>
                            <div class="testimonials__slider__quote sr-scale">
                                <?php echo $quote; ?>
                            </div>
                        <?php endif; ?>
                        <div class="testimonials__slider__author">
                            
                            <div class="testimonials__slider__author__image sr-reveal">
                                <?php if($image['src']) : ?>
                                    <img src="<?php echo $image['src']; ?>" srcset="<?php echo $image['srcset']; ?>" alt="<?php echo $image['alt']; ?>">
                                <?php endif; ?>
                            </div>
                    
                            <div class="testimonials__slider__author__text">
                                <?php if($company) : ?>
                                    <div class="testimonials__slider__author__text__item"><?php echo $company; ?></div>
                                <?php endif; ?>
                                <?php if($name) : ?>
                                    <div class="testimonials__slider__author__text__item"><?php echo $name; ?></div>
                                <?php endif; ?>
                                <?php if($position) : ?>
                                    <div class="testimonials__slider__author__text__item"><?php echo $position; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
                
            </div>
        <?php endif; ?>
    </div>

</section>