<?php

    $changelog = vld()->changelog;

    if($changelog && !is_wp_error($changelog) && 200 === wp_remote_retrieve_response_code($changelog)){
        $changelog = $changelog['body'];
    } else {
        $changelog = vld()->strings['widget_bad_request_text'];
    }

?>

<div class="vl-dashboard-widget">

    <div class="vl-dashboard-widget--title">
        <mark><?php echo vld()->strings['widget_changelog_title']; ?></mark>
        <span class="vl-dashboard-widget--title-badge"><?php printf(vld()->strings['widget_changelog_badge_text'], vld()->theme_version); ?></span>
    </div>

    <div class="vl-dashboard-widget--content">
        <div class="vl-widget-changelog">
            <?php
                echo wp_kses($changelog, array(
                    'h6' => array(),
                    'ul' => array(),
                    'li' => array(),
                ));
            ?>
        </div>
    </div>

</div>
<!--end .vl-dashboard-widget-->
