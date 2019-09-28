<?php
/**
 * Testing Core
 *
 * @package   Plugin_Name\Tests\PHPUnit\Core
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

use Plugin_Name\Core\Main;
use WP_Mock\Tools\TestCase;

/**
 * Class Test_Main
 */
class Test_Main extends TestCase {

	/**
	 * Test Main plugin class
	 */
	public function test___construct() {
		WP_Mock::userFunction( 'get_option' );
		$loader = Mockery::mock( 'Plugin_Name\Includes\Loader' );
		$loader->shouldReceive( 'add_action' );
		$loader->shouldReceive( 'add_filter' );

		new Main( $loader );

		$this->assertTrue( true );
	}

	/**
	 * Check the connection hooks
	 */
	public function test_run() {
		$loader = Mockery::mock( 'Plugin_Name\Includes\Loader' );
		$loader->shouldReceive( 'add_action' );
		$loader->shouldReceive( 'add_filter' );
		$loader->shouldReceive( 'run' )->once();

		$main = new Main( $loader );
		$main->run();

		$this->assertTrue( true );
	}

}
