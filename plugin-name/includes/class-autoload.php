<?php
/**
 * Autoload plugin classes
 *
 * @package   Plugin_Name\Includes
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

namespace Plugin_Name\Includes;

use Exception;

/**
 * Class Autoload
 */
class Autoload {

	/**
	 * Autoload constructor.
	 *
	 * @throws Exception Impossible to register autoload.
	 */
	public function __construct() {
		spl_autoload_register( [ $this, 'autoload' ] );
	}

	/**
	 * Class Naming Rules
	 *
	 * @param string $class Class not found.
	 */
	private function autoload( string $class ) {
		if ( 0 === strpos( $class, 'Plugin_Name' ) ) {
			$plugin_path = strtolower( str_replace( [ 'Plugin_Name', '\\', '_' ], [ '', '/', '-' ], $class ) );
			$plugin_path = explode( '/', $plugin_path );
			$class_name  = array_pop( $plugin_path );
			$full_path   = plugin_dir_path( __DIR__ ) . implode( '/', $plugin_path ) . '/class-' . $class_name . '.php';
			if ( file_exists( $full_path ) ) {
				require_once $full_path;
			}
		}
	}

}
