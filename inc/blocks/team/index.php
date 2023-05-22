<?php

/**
 * Team Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$team_grid = get_field('team_grid');
$secondary_team_title = get_field('secondary_team_title');
$secondary_team = get_field('secondary_team');

?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>" <?php echo $text_color; ?>>

    <?php get_template_part( 'inc/partials/module_settings', '', array('block_id' => $block_id ) ); ?>

    <div class="container">
        <?php if($team_grid) : ?>
            <div class="team__grid">
                <div class="row">
                    <?php foreach($team_grid as $item) : 
                        $id = $item;
                        $name = get_the_title($item);
                        $position = get_field('title', $item);
                        $about = get_field('about', $item);
                        $photo = studioscience_get_attachment( get_field('photo', $item) );
                        ?>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <a href="#modal-<?php echo $id; ?>" class="js-modalTrigger">
                                <div class="team__grid__item">
                                    <div class="team__grid__image">
                                        <?php if($photo) : ?>
                                            <img src="<?php echo $photo['src']; ?>" srcset="<?php echo $photo['srcset']; ?>" alt="<?php echo $photo['alt']; ?>">
                                        <?php endif; ?>
                                    </div>
                                    <?php if($name) : ?>
                                        <div class="team__grid__name">
                                            <?php echo $name; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($position) : ?>
                                        <div class="team__grid__position">
                                            <?php echo $position; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </a>   
                            
                            <div id="modal-<?php echo $id; ?>" class="modal team-modal">
                                <div class="modal__overlay js-closeModalOverlay"></div>
                                <div class="modal__dialog">
                                    <div class="team-modal__content">
                                        <div class="row middle-md">
                                            <?php if($photo) : ?>
                                                <div class="col-xs-12 col-md-5">
                                                    <div class="team-modal__image">
                                                        <img src="<?php echo $photo['src']; ?>" srcset="<?php echo $photo['srcset']; ?>" alt="<?php echo $photo['alt']; ?>">
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-xs-12 col-md-6 col-md-offset-1">
                                                <div class="team-modal__text">
                                                    <?php if($name) : ?>
                                                        <h3 class="team-modal__name"><?php echo $name; ?></h3>
                                                    <?php endif; ?>
                                                    <?php if($position) : ?>
                                                        <h4 class="team-modal__position"><?php echo $position; ?></h4>
                                                    <?php endif; ?>
                                                    <?php if($about) : ?>
                                                        <div class="team-modal__about"><?php echo $about; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <a href="#" class="modal__close js-closeModal"></a>    
                            </div> 
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if($secondary_team) : ?>
            <div class="team__secondary">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <?php if($secondary_team_title) : ?>
                            <div class="team__secondary__title">
                                <?php echo $secondary_team_title; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-xs-12 col-md-8">
                        <div class="row">
                            <?php foreach($secondary_team as $item) : 
                                $id = $item;
                                $name = get_the_title($item);
                                $position = get_field('title', $item);
                                $about = get_field('about', $item);
                                $photo = studioscience_get_attachment( get_field('photo', $item) );
                                ?>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <a href="#modal-<?php echo $id; ?>" class="js-modalTrigger">
                                        <div class="team__secondary__item">
                                            <div class="team__secondary__name">
                                                <?php echo $name; ?>
                                            </div>
                                            <div class="team__secondary__position">
                                                <?php echo $position; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div id="modal-<?php echo $id; ?>" class="modal team-modal">
                                    <div class="modal__overlay js-closeModalOverlay"></div>
                                    <div class="modal__dialog">
                                        <div class="team-modal__content">
                                            <div class="row middle-md">
                                                <?php if($photo) : ?>
                                                    <div class="col-xs-12 col-md-5">
                                                        <div class="team-modal__image">
                                                            <img src="<?php echo $photo['src']; ?>" srcset="<?php echo $photo['srcset']; ?>" alt="<?php echo $photo['alt']; ?>">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-xs-12 col-md-6 col-md-offset-1">
                                                    <div class="team-modal__text">
                                                        <?php if($name) : ?>
                                                            <h3 class="team-modal__name"><?php echo $name; ?></h3>
                                                        <?php endif; ?>
                                                        <?php if($position) : ?>
                                                            <h4 class="team-modal__position"><?php echo $position; ?></h4>
                                                        <?php endif; ?>
                                                        <?php if($about) : ?>
                                                            <div class="team-modal__about"><?php echo $about; ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <a href="#" class="modal__close js-closeModal"></a>    
                                </div> 

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

</section>