<?php 

    if ( !empty( $args['heading'] ) ) {
        $heading = $args['heading'];
        $heading_html = isset($heading['heading_html']) ? $heading['heading_html'] : 'h3';
        $heading_style = isset($heading['heading_style']) ? $heading['heading_style'] : 'h_2';
        $heading_text = isset($heading['heading_text']) ? $heading['heading_text'] : '';

        echo "<{$heading_html} class='{$heading_style}'>{$heading_text}</{$heading_html}>";

    }

?>