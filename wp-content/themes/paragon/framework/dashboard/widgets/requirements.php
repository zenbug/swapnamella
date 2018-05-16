<?php

    $php_min_requirements = array(
        'php_version' => '5.3.0',
        'memory_limit' => '256',
        'max_execution_time' => 180,
    );

    $php_memory_limit = preg_replace("/[^0-9]/", '', ini_get('memory_limit'));
    $min_memory = $php_min_requirements['memory_limit'];
    $req_memory_limit = $php_memory_limit >= $min_memory;

    $req_php_version = true;

    if(function_exists('phpversion')) {
        $php_ver = phpversion();
        $req_php_version = version_compare($php_ver, $php_min_requirements['php_version'], '>=');
    }

    $req_max_exec_time = true;
    
    if(function_exists('ini_get')) {
        $time_limit = ini_get('max_execution_time');
        $req_max_exec_time = $time_limit >= $php_min_requirements['max_execution_time'];
    }
    
    $requirements_all_is_well = $req_memory_limit && $req_php_version && $req_max_exec_time;

?>

<div class="vl-dashboard-widget">

    <div class="vl-dashboard-widget--title">
        <?php if($requirements_all_is_well) { ?>

            <mark class="true"><?php echo vld()->strings['widget_requirements_title']; ?></mark>
            <span class="vl-dashboard-widget--title-badge true"><?php echo vld()->strings['widget_requirements_noproblems']; ?></span>

        <?php } else { ?>

            <mark class="false"><?php echo vld()->strings['widget_requirements_title']; ?></mark>
            <span class="vl-dashboard-widget--title-badge false"><?php echo vld()->strings['widget_requirements_problems']; ?></span>

        <?php } ?>
    </div>
    
    <div class="vl-dashboard-widget--content">
        <div class="vl-widget-requirements">
            <table class="widefat" cellspacing="0">
                <tbody>
                    <tr>
                        <td><?php esc_html_e('PHP Version:', 'paragon'); ?></td>
                        <td>
                            <?php
                                if(function_exists('phpversion')) {
                                    if($req_php_version) {
                                        echo '<mark class="true">✔ ' . esc_attr($php_ver) . '</mark>';
                                    } else {
                                        echo '<mark class="false vl-drop-parent">';
                                        echo '✘ ' . esc_attr($php_ver);
                                        echo ' <small>[' . vld()->strings['widget_more_info_text'] . ']</small>';
                                        echo '<span class="vl-drop-content">';
                                        echo sprintf(esc_html__('We recommend upgrade php version to at least %s.', 'paragon'), $php_min_requirements['php_version']);
                                        echo '</span>';
                                        echo '</mark>';
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('WP Memory Limit:', 'paragon'); ?></td>
                        <td>
                            <?php

                            if ($req_memory_limit) {
                                echo '<mark class="true">✔ ' . esc_attr($php_memory_limit . 'M') . '</mark>';
                            } else {
                                echo '<mark class="false vl-drop-parent">✘ ' . esc_attr($php_memory_limit . 'M') . ' ';
                                echo '<small>[' . vld()->strings['widget_more_info_text'] . ']</small>';
                                echo '<span class="vl-drop-content">';
                                echo sprintf(esc_html__('For normal usage will be enough 128M, but for importing demo we recommend setting memory to at least %s.', 'paragon'),
                                    '<strong>' . esc_attr($php_min_requirements['memory_limit'] . 'M') . '</strong><br>'
                                );
                                echo sprintf(esc_html__('Read more: %s', 'paragon'), sprintf('<a href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">%s</a>', esc_html__('Increasing memory allocated to PHP.', 'paragon'))
                                );
                                echo '</span>';
                                echo '</mark>';
                            }
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('PHP Time Limit:', 'paragon'); ?></td>
                        <td>
                            <?php if(function_exists('ini_get')):
                                if($req_max_exec_time) {
                                    echo '<mark class="true">✔ ' . esc_attr($time_limit) . '</mark>';
                                } else {
                                    echo '<mark class="false vl-drop-parent">';
                                    echo '✘ ' . esc_attr($time_limit);
                                    echo ' <small>[' . vld()->strings['widget_more_info_text'] . ']</small>';
                                    echo '<span class="vl-drop-content">';
                                    echo sprintf(esc_html__('We recommend setting max execution time to at least %s.', 'paragon'), esc_attr($php_min_requirements['max_execution_time']));
                                    echo ' <br> ';
                                    echo sprintf(esc_html__('See more: %s', 'paragon'), sprintf('<a href="http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded" target="_blank">%s</a>', esc_html__('Increasing max execution to PHP', 'paragon'))
                                    );
                                    echo '</span>';
                                    echo '</mark>';
                                }
                            endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Child Theme:', 'paragon'); ?></td>
                        <td>
                            <?php
                            if(vld()->theme_is_child) {
                                echo '<mark class="true">✔</mark>';
                            } else {
                                echo '<mark class="vl-drop-parent">✘ ';
                                echo '<small>[' . vld()->strings['widget_more_info_text'] . ']</small>';
                                echo '<span class="vl-drop-content">'.esc_html__('We recommend use child theme to prevent loosing your customizations after theme update.', 'paragon')
                                    .'</span>';
                                echo '</mark>';
                            }?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--end .vl-dashboard-widget-->