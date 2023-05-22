<?php 

    if ( !empty( $args['link'] ) ) {
        $link = $args['link'];
        $link_url = isset($link['url']) ? 'href="'. $link['url'] . '"' : '';
        $link_title = isset($link['title']) ? $link['title'] : '';
        $link_target = isset($link['target']) ? 'target="'. $link['target'] . '"' : '';
        $link_classes = isset($args['classes']) ? 'class="'. $args['classes'] . '"' : '';

        echo "<a {$link_url} {$link_target} {$link_classes}><span>{$link_title}</span></a>";

    }

?>