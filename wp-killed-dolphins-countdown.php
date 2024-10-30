<?php
/*
Plugin Name: Killed Dolphin Countdown
Plugin URI: http://dyingdolphins.org
Description: One dolphin is killed every 15 minute. We want to spread the word and stop the poachers. Use the widget or insert the shortcode [dolphins_countdown].<br><br> We work to make the horrors of the current dolphin situation known, to work to ensure that this stops, not when it’s too late, but now. Act Now: <a href="http://dyingdolphins.org"> http://dyingdolphins.org</a>







Version: 1.1
Author: Evgen "EvgenDob" Dobrzhanskiy
Author URI: http://voodoopress.net
Stable tag: 1.1
*/

#include('modules/functions.php');
include('modules/shortcodes.php');
#include('modules/settings.php');
#include('modules/meta_box.php');
include('modules/widgets.php');
#include('modules/hooks.php');
#include('modules/cpt.php');
include('modules/scripts.php');
#include('modules/ajax.php');

#register_activation_hook( __FILE__, 'w7_add_post_type' );
register_activation_hook( __FILE__, 'flush_rewrite_rules' );
?>