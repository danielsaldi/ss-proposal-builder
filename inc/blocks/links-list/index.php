<?php

/**
 * Links List Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'links-list';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading = get_field('heading');
$links = get_field('links');

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>
    <div class="container">
        <?php get_template_part( 'inc/partials/heading', '', array('heading' => $heading ) ); ?>
        <?php if($links) : ?>
            <div class="links-list__list">
                <?php foreach($links as $l) : 
                    $link = $l['link'];
                    $button_classes = $l['add_link_arrow'] ? 'arrow' : '';
                    $button_classes .= $l['no_link'] ? ' no-link' : '';
                    $text = $l['text'];
                    ?>
                    <div class="links-list__list__item sr-scale">
                        <div class="links-list__list__item__link">
                            <?php get_template_part( 'inc/partials/link', '', array('link' => $link, 'classes' => $button_classes ) ); ?>
                        </div>
                        <?php if($text ) : ?>
                            <div class="links-list__list__item__text">
                                <?php echo $text; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</section>