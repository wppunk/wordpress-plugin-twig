<?php
/**
 * Bootstrap file
 *
 * @wordpress-plugin
 * Plugin Name:         Plugin Name
 * Description:         The plugin adds information about the games to the site posts.
 * Version:             1.0.0
 * Author:              Custom Backend
 * Text Domain:         plugin-name
 * @package             Plugin Name
 */

use Plugin_Name\Core\Main;
use Plugin_Name\Includes\Autoload;
use Plugin_Name\Includes\Loader;

require_once plugin_dir_path( __FILE__ ) . 'includes/class-autoload.php';
new Autoload();
$main = new Main( new Loader() );
$main->run();
