<?php

/**
 * Payment Timeline Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'payment-timeline';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$payment_timeline = get_field('payment_timeline');

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>

    <div class="container">
        <?php if($payment_timeline) : ?>
            <div class="payment-timeline__timeline">
                <?php foreach($payment_timeline as $pt) : 
                    $amount = $pt['amount'];
                    $detail = $pt['detail'];    
                ?>
                    <div class="payment-timeline__item sr-sequence-scale">
                        <div class="payment-timeline__item__amount"><?php echo $amount; ?></div>
                        <div class="payment-timeline__item__detail"><?php echo $detail; ?></div>
                    </div>
                <?php endforeach; ?>   
            </div> 
        <?php endif; ?>
    </div>

</section>