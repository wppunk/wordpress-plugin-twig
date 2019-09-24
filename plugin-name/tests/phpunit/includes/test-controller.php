<?php

use Plugin_Name\Includes\Controller;
use WP_Mock\Tools\TestCase;

/**
 * Class Controller_Render for testing method render
 */
class Controller_Render extends Controller {
	/**
	 * method for testing
	 *
	 * @param string $template_name
	 * @param array $params
	 */
	public function render( string $template_name, array $params = [] ) {
		parent::render( $template_name, $params );
	}
}

/**
 * Class Test_Controller
 */
class Test_Controller extends TestCase {

	/**
	 * Test __construct on incorrect
	 */
	public function test_constructor_directory_not_found() {
		$this->expectException( Twig\Error\LoaderError::class );
		new Controller( __DIR__ );
		$this->assertTrue( true );
	}

	/**
	 * Single twig directory
	 */
	public function test___constructor_single_directory() {
		new Controller( PLUGIN_DIR . '/admin/' );
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
		ob_start();


		$controller = new Controller_Render( PLUGIN_DIR . '/admin/' );
		$controller->render( 'page-options', [] );


		$this->assertTrue( ! empty( ob_get_clean() ) );
	}

	/**
	 * Twig template not found
	 */
	public function test_render_not_found() {
		ob_start();


		$controller = new Controller_Render( PLUGIN_DIR . '/admin/' );
		$controller->render( 'not-found', [] );


		$this->assertTrue( 0 === strpos( ob_get_clean(), 'Unable to find template "not-found.twig"' ) );
	}


}