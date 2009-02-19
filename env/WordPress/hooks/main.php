<?php
/**
 * Copyright 2006, 2007, 2008, 2009 Eric D. Hough (http://ehough.com)
 * 
 * This file is part of TubePress (http://tubepress.org)
 * 
 * TubePress is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * TubePress is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with TubePress.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

if (version_compare(PHP_VERSION, '5.0.0', '>=')
        && !function_exists("tubepress_content_filter")) {
    
    /* set the tubepress_base_url global */
    $tubepress_base_url = get_settings('siteurl') . "/wp-content/plugins/tubepress";        
            
    /* register the plugin's message bundles */
	load_plugin_textdomain('tubepress', 'wp-content/plugins/tubepress/i18n');
	
	/* load up the rest of the WordPress specific code */
    include dirname(__FILE__) . '/../functions/main.php';

    /* add a filter for all post/page content */
	add_filter('the_content', 'tubepress_content_filter');
	
	/* add a filter so we can add our CSS/JS to the head */
	add_action('wp_head',     'tubepress_head_filter');
}

?>