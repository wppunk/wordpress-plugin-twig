<?php

namespace Plugin_Name\Includes;

class Autoload {

	public function __construct() {
		spl_autoload_register( [ __CLASS__, 'autoload' ] );
	}

	private function autoload( $class ) {
		if ( 0 === strpos( $class, 'Plugin_Name' ) ) {
			$plugin_path = strtolower( str_replace( [ 'Plugin_Name', '\\', '_' ], [ '', '/', '-' ], $class ) );
			$full_path   = plugin_dir_path( __DIR__ ) . $plugin_path . '.php';
			if ( file_exists( $full_path ) ) {
				require_once $full_path;
			}
		}
	}

}