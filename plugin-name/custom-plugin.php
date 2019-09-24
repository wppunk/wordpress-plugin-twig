<?php

/**
 * @wordpress-plugin
 * Plugin Name:         Plugin Name
 * Description:         The plugin adds information about the games to the site posts.
 * Version:             1.0.0
 * Author:              Custom Beckend
 * Text Domain:         plugin-name
 */

use Plugin_Name\Core\Main;
use Plugin_Name\Includes\Autoload;
use Plugin_Name\Includes\Loader;

require_once plugin_dir_path( __FILE__ ) . 'includes/autoload.php';
new Autoload();

function plugin_name_run() {
	$main     = new Main( new Loader() );
	$main->run();
}
plugin_name_run();
