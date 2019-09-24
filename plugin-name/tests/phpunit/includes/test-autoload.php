<?php

use WP_Mock\Tools\TestCase;
use Plugin_Name\Includes\Autoload;
use Plugin_Name\Tests\PHPUnit\Krya\Autoloaded_Class;

/**
 * Class Test_Autoload
 */
class Test_Autoload extends TestCase {

	/**
	 * Test SetUP
	 */
	public function setUp(): void {
		parent::setUp();
		WP_Mock::userFunction( 'plugin_dir_path', [ 'return' => PLUGIN_DIR ] );
	}

	/**
	 * Add new autoload function
	 */
	public function test___construct() {
		$autoload = new Autoload();


		$autoload_functions  = spl_autoload_functions();
		$last_autoload = array_pop( $autoload_functions );


		$this->assertTrue( 'autoload' === $last_autoload[1] );
	}

}