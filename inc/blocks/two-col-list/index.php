<?php

/**
 * Two Col List Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'two-col-list';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading = get_field('heading');
$list = get_field('list');

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>

    <div class="container">
        <div class="two-col-list__heading">
            <?php get_template_part( 'inc/partials/heading', '', array('heading' => $heading ) ); ?>
        </div>
        <?php if($list) : ?>
            <?php foreach($list as $l) : 
                $heading = $l['heading'];
                $content = $l['content'];
                $cta = $l['cta'];
                ?>
                <div class="two-col-list__item sr-sequence">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <?php get_template_part( 'inc/partials/heading', '', array('heading' => $heading ) ); ?>
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <?php if($content) : echo $content; endif; ?>
                            <?php get_template_part( 'inc/partials/link', '', array('link' => $cta, 'classes' => 'btn' ) ); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</section>