<?php

/**
 * Timeline Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'timeline';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$timeline = get_field('timeline');
$display_total_weeks = get_field('display_total_weeks');
$timeline_count = count($timeline);

$total_weeks = 0;
foreach($timeline as $w) : 
    $total_weeks = $total_weeks + $w['weeks'];
endforeach;

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>" <?php echo $text_color; ?>>

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>

    <div class="container">
        <?php if($timeline_count) : ?>
            <div class="timeline__count"><?php echo $timeline_count; ?></div>
        <?php endif; ?>
        <?php if($timeline) : ?>
            <div class="timeline__slider">
               
                <?php foreach($timeline as $t) : 
                    $title = $t['title'];
                    $description = $t['description'];
                    ?>

                    <div class="timeline__slider__item">
                        <div class="row">
                            <div class="col-xs-12 col-md-4 col-lg-3">
                                <?php if($title) : ?>
                                    <div class="timeline__slider__title">
                                        <?php echo $title; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="timeline__slider__prev">Prev</div>
                                <div class="timeline__slider__next">Next</div>
                            </div>

                            <div class="col-xs-12 col-md-8 col-lg-9">
                                <?php if($description) : ?>
                                    <div class="timeline__slider__description">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
                
            </div>
            <div class="timeline__navigation">
                <?php foreach($timeline as $t) : 
                    $weeks = $t['weeks'];
                    $timeline_width = $weeks / $total_weeks;
                    $week_overlap = $t['week_overlap'];
                    $overlap_width = $week_overlap / $total_weeks;
                    ?>

                    <div class="timeline__navigation__item">
                        <div class="timeline__navigation__box" data-width="<?php echo $timeline_width; ?>">
                            <div class="timeline__navigation__overlap" data-width="<?php echo $overlap_width; ?>"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if($display_total_weeks) : ?>
                <div class="timeline__weeks">Full project duration: <?php echo $total_weeks == 1 ? $total_weeks . ' week' : $total_weeks . ' weeks'; ?></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

</section>