<?php

	if ( !empty( $args['block_id'] ) ) {
		$block_id = $args['block_id'];

		$custom_padding_top_mobile = get_field('custom_padding_top_mobile');
		$custom_padding_bottom_mobile = get_field('custom_padding_bottom_mobile');
		$custom_margin_top_mobile = get_field('custom_margin_top_mobile');
		$custom_margin_bottom_mobile = get_field('custom_margin_bottom_mobile');

		$custom_padding_top = get_field('custom_padding_top');
		$custom_padding_bottom = get_field('custom_padding_bottom');
		$custom_margin_top = get_field('custom_margin_top');
		$custom_margin_bottom = get_field('custom_margin_bottom');

		$custom_background_color = get_field('custom_background_color');

		$custom_mobile_styles = $custom_padding_top_mobile != NULL || $custom_padding_bottom_mobile != NULL || $custom_margin_top_mobile != NULL || $custom_margin_bottom_mobile != NULL || $custom_padding_top != NULL || $custom_padding_bottom != NULL || $custom_margin_top != NULL || $custom_margin_bottom != NULL || $custom_background_color != NULL;
		$custom_desktop_styles = $custom_padding_top != NULL || $custom_padding_bottom != NULL || $custom_margin_top != NULL || $custom_margin_bottom != NULL;
		
		if($custom_mobile_styles || $custom_desktop_styles) {
			echo '<style>';
		}	

			if($custom_mobile_styles != NULL) {
				echo '#' . $block_id . '{';
			}

			if($custom_background_color != NULL) {
				echo 'background-color: ' . $custom_background_color . '!important;';
			}

			if($custom_padding_top_mobile != NULL) {
				echo 'padding-top: ' . $custom_padding_top_mobile . 'px!important;';
			} elseif($custom_padding_top != NULL) {
				echo 'padding-top: ' . $custom_padding_top/2 . 'px!important;';
			}

			if($custom_padding_bottom_mobile != NULL) {
				echo 'padding-bottom: ' . $custom_padding_bottom_mobile . 'px!important;';
			} elseif($custom_padding_bottom != NULL) {
				echo 'padding-bottom: ' . $custom_padding_bottom/2 . 'px!important;';
			}

			if($custom_margin_top_mobile != NULL) {
				echo 'margin-top: ' . $custom_margin_top_mobile . 'px!important;';
			} elseif($custom_margin_top != NULL) {
				echo 'margin-top: ' . $custom_margin_top/2 . 'px!important;';
			}

			if($custom_margin_bottom_mobile != NULL) {
				echo 'margin-bottom: ' . $custom_margin_bottom_mobile . 'px!important;';
			} elseif($custom_margin_bottom != NULL) {
				echo 'margin-bottom: ' . $custom_margin_bottom/2 . 'px!important;';
			}

			if($custom_mobile_styles) {
				echo '}';
			}

			if($custom_desktop_styles) {
				echo '@media only screen and (min-width: 768px) { #' . $block_id . '{';
			}

				if($custom_padding_top != NULL) {
					echo 'padding-top: ' . $custom_padding_top . 'px!important;';
				}

				if($custom_padding_bottom != NULL) {
					echo 'padding-bottom: ' . $custom_padding_bottom . 'px!important;';
				}

				if($custom_margin_top != NULL) {
					echo 'margin-top: ' . $custom_margin_top . 'px!important;';
				}

				if($custom_margin_bottom != NULL) {
					echo 'margin-bottom: ' . $custom_margin_bottom . 'px!important;';
				}

			if($custom_desktop_styles) {
				echo '}}';
			}

		if($custom_mobile_styles || $custom_desktop_styles) {
			echo '</style>';
		}

	} 

	//Custom Block ID used for Anchor tag
	$custom_block_id = get_field('custom_block_id');

	if($custom_block_id) {
		echo '<span id="' . get_field('custom_block_id') . '" class="anchor-tag"></span>';
	}

?>