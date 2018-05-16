<div class="wrap about-wrap vl-dashboard">
    

    <h1><?php printf(vld()->strings['dashboard_title'], vld()->theme_name, vld()->theme_version); ?></h1>
    <div class="about-text"><?php printf(vld()->strings['dashboard_subtitle'], vld()->theme_name); ?></div>

    <img class="wp-badge" src="<?php echo vld()->dashboard_dir_uri . '/img/dashboard.png'; ?>" alt="<?php echo vld()->theme_name; ?>">

    <p class="vl-page-actions">
        <a target="_blank" href="<?php echo vld()->strings['subscribe_link']; ?>" class="button button-primary"><?php echo vld()->strings['subscribe_text']; ?></a>
        <a target="_blank" href="<?php echo vld()->strings['documentation_link']; ?>" class="button button-secondary"><?php echo vld()->strings['documentation_text']; ?></a>
        <a target="_blank" href="<?php echo vld()->strings['support_link']; ?>" class="button button-help"><?php echo vld()->strings['support_text']; ?></a>
    </p>

    <div class="clear"></div>

    <div class="panels vl-panels">
        <?php

            $widgets = vld()->dashboard_widgets();

            foreach($widgets as $widget) {
                require vld()->dashboard_dir . '/widgets/' . $widget . '.php';
            }

        ?>

    </div>

    <div class="clear"></div>

    <p class="vl-thank-you">
        <?php printf(vld()->strings['footer_thank_you'], vld()->theme_name); ?>
    </p>


</div>
<!--end .wrap-->
