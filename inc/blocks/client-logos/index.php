<?php

/**
 * Client Logos Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'client-logos';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$clients = get_field('clients');
$container_max_width = get_field('container_max_width') ? 'style="max-width: ' . get_field('container_max_width') .  'px;"' : '';
$column_options = get_field('column_options');

switch ($column_options) {
    case '3-up':
        $logo_cols = 'col-xs-12 col-sm-6 col-md-4';
        break;

    case '4-up':
        $logo_cols = 'col-xs-12 col-sm-6 col-md-4 col-lg-3';
        break;
    
    case '5-up':
        $logo_cols = 'col-xs-12 col-sm-6 col-md-4 col-lg-2';
        break;
    
    default:
        $logo_cols = 'col-xs-12 col-sm-6 col-md-4';
        break;
}

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>

    <?php if(isset($clients)) : ?>

        <div class="client-logos__row" <?php echo $container_max_width; ?>>
            <div class="row center-md">
                <?php foreach($clients as $client) : 
                    $client_id = $client;
                    $logo = studioscience_get_attachment(get_field('logo', $client_id));
                    $logo_max_width = get_field('logo_max_width', $client_id) ? 'style="max-width: ' . get_field('logo_max_width', $client_id) . 'px;"' : '';
                    ?>
                    <div class="<?php echo $logo_cols; ?>">
                        <div class="client-logos__logo sr-sequence-scale" <?php echo $logo_max_width; ?>>
                            <img src="<?php echo $logo['src']; ?>" alt="<?php echo $logo['alt']; ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php endif; ?>

</section>