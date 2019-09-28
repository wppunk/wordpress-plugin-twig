<?php
/**
 * Testing Controller
 *
 * @package   Plugin_Name\Tests\PHPUnit\Includes
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

use Plugin_Name\Includes\Controller;
use WP_Mock\Tools\TestCase;

/**
 * Class Test_Controller
 */
class Test_Controller extends TestCase {

	/**
	 * Test __construct on incorrect directory
	 */
	public function test_constructor_directory_not_found() {
		$this->expectException( Twig\Error\LoaderError::class );
		new Controller( [ __DIR__ ] );
		$this->assertTrue( true );
	}

	/**
	 * Single twig directory
	 */
	public function test___constructor_single_directory() {
		new Controller( [ PLUGIN_DIR . '/admin/' ] );
		$this->assertTrue( true );
	}

	/**
	 * Multiply twig directories
	 */
	public function test___constructor_multiply_directories() {
		new Controller( [ PLUGIN_DIR . '/admin/', PLUGIN_DIR . '/front/' ] );
		$this->assertTrue( true );
	}

	/**
	 * Correct twig template
	 */
	public function test_render_found() {
		WP_Mock::passthrufunction( 'wp_kses_post' );
		ob_start();

		$controller = new Controller_Render( [ PLUGIN_DIR . '/admin/' ] );
		$controller->test_render( 'page-options', [ 'plugin_name' => 'Plugin Name' ] );

		$this->assertTrue( ! empty( ob_get_clean() ) );
	}

	/**
	 * Twig template not found
	 */
	public function test_render_not_found() {
		WP_Mock::passthrufunction( 'wp_kses_post' );
		ob_start();

		$controller = new Controller_Render( [ PLUGIN_DIR . '/admin/' ] );
		$controller->test_render( 'not-found', [] );

		$this->assertTrue( 0 === strpos( ob_get_clean(), 'Unable to find template "not-found.twig"' ) );
	}


}
