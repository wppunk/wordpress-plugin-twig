<?php
/**
 * Testing Loader
 *
 * @package   Plugin_Name\Tests\PHPUnit\Includes
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

use WP_Mock\Tools\TestCase;
use Plugin_Name\Includes\Loader;

/**
 * Class Test_Loader
 */
class Test_Loader extends TestCase {

	/**
	 * Testing loader
	 *
	 * @var Loader_Properties
	 */
	private $loader;

	/**
	 * Instance new Loader
	 */
	public function setUp(): void {
		parent::setUp();
		$this->loader = new Loader_Properties();
	}

	/**
	 * Test creating instance
	 */
	public function test___construct() {
		new Loader();
		$this->assertTrue( true );
	}

	/**
	 * Add_action with full data
	 */
	public function test_add_action() {
		$this->loader->add_action( 'hook_name', 'object', 'callback', 20, 1 );

		$this->assertTrue( ! empty( $this->loader->get_action() ) );
	}

	/**
	 * Test default parameters priority and accepted args
	 */
	public function test_add_action_default() {
		$this->loader->add_action( 'hook_name', 'object', 'callback' );

		$this->assertTrue( ! empty( $this->loader->get_action() ) );
	}

	/**
	 * Add_filter with full data
	 */
	public function test_add_filter() {
		$this->loader->add_filter( 'hook_name', 'object', 'callback', 20, 1 );

		$this->assertTrue( ! empty( $this->loader->get_filters() ) );
	}

	/**
	 * Test default parameters priority and accepted args
	 */
	public function test_add_filter_default() {
		$this->loader->add_filter( 'hook_name', 'object', 'callback' );

		$this->assertTrue( ! empty( $this->loader->get_filters() ) );
	}

	/**
	 * Test loader run WordPress functions
	 *
	 * Functions don't execute because class have methods with same name
	 */
	public function test_run() {
		$loader = new Loader();
		$loader->add_action( 'hook_name', 'object', 'callback', 20, 1 );
		$loader->add_filter( 'hook_name', 'object', 'callback', 20, 1 );
		$loader->run();

		$this->assertTrue( true );
	}

}
