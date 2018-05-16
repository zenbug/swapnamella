<div class="vl-dashboard-widget">

    <div class="vl-dashboard-widget--title">
        <mark><?php echo vld()->strings['widget_support_title']; ?></mark>
    </div>

    <div class="vl-dashboard-widget--content">
        <div class="vl-widget-support">
            <p><?php echo vld()->strings['widget_support_text1']; ?></p>

            <div class="clear"></div>

            <a target="_blank" href="<?php echo vld()->strings['support_link']; ?>" class="button button-help"><?php echo vld()->strings['support_text']; ?></a>

            <div class="clear"></div>

            <p class="small"><?php echo sprintf(vld()->strings['widget_support_text2'], vld()->theme_name); ?></p>
        </div>
    </div>

</div>
<!--end .vl-dashboard-widget-->