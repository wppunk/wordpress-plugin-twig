<?php
/**
 * Testing Autoload
 *
 * @package   Plugin_Name\Tests\PHPUnit\Includes
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

use Plugin_Name\Includes\Autoload;
use WP_Mock\Tools\TestCase;

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
		new Autoload();


		$autoload_functions = spl_autoload_functions();
		$last_autoload      = array_pop( $autoload_functions );


		$this->assertTrue( 'autoload' === $last_autoload[1] );
	}

}
