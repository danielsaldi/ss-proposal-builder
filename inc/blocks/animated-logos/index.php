<?php

/**
 * Animated Logos Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'animated-logos';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$client_row_1 = get_field('client_row_1');
if($client_row_1) {
    $double_client_row_1 = array_merge($client_row_1, $client_row_1);
}
$client_row_2 = get_field('client_row_2');
if($client_row_2) {
    $double_client_row_2= array_merge($client_row_2, $client_row_2);
}

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>

    <?php if(isset($double_client_row_1)) : ?>
        <div class="left-then-right-pan">
            <div class="animated-logos__row">
                <?php foreach($double_client_row_1 as $client) : 
                    $client_id = $client;
                    $logo = studioscience_get_attachment(get_field('logo', $client_id));
                    $logo_max_width = get_field('logo_max_width', $client_id) ? 'style="max-width: ' . get_field('logo_max_width', $client_id) . 'px;"' : '';
                    ?>
                    <div class="animated-logos__logo" <?php echo $logo_max_width; ?>>
                        <img src="<?php echo $logo['src']; ?>" alt="<?php echo $logo['alt']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($double_client_row_2)) : ?>
        <div class="right-then-left-pan">
            <div class="animated-logos__row">
                <?php foreach($double_client_row_2 as $client) : 
                    $client_id = $client;
                    $logo = studioscience_get_attachment(get_field('logo', $client_id));
                    $logo_max_width = get_field('logo_max_width', $client_id) ? 'style="max-width: ' . get_field('logo_max_width', $client_id) . 'px;"' : '';
                    ?>
                    <div class="animated-logos__logo" <?php echo $logo_max_width; ?>>
                        <img src="<?php echo $logo['src']; ?>" alt="<?php echo $logo['alt']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

</section>