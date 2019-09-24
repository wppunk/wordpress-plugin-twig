<?php

use Plugin_Name\Includes\Hook;
use Plugin_Name\Includes\Loader;
use WP_Mock\Tools\TestCase;

/**
 * Class Extends_Loader for testing properties
 */
class Extends_Loader extends Loader {
	/**
	 * @return array get protected property
	 */
	public function get_action() {
		return $this->actions;
	}

	/**
	 * @return array get protected property
	 */
	public function get_filters() {
		return $this->filters;
	}
}

/**
 * Class Test_Loader
 */
class Test_Loader extends TestCase {

	/**
	 * @var Extends_Loader
	 */
	private $loader;

	/**
	 * Instance new Loader
	 */
	public function setUp(): void {
		parent::setUp();
		$this->loader = new Extends_Loader();
	}

	/**
	 * Test creating instance
	 */
	public function test___construct() {
		new Loader();
		$this->assertTrue( true );
	}

	/**
	 * add_action with full data
	 */
	public function test_add_action() {
		$this->loader->add_action( 'hook_name', 'object', 'callback', 20, 1 );


		$this->assertTrue( ! empty( $this->loader->get_action() ) );
		$this->assertInstanceOf( Hook::class, $this->loader->get_action()[0] );
	}

	/**
	 * Test default parameters priority and accepted args
	 */
	public function test_add_action_default() {
		$this->loader->add_action( 'hook_name', 'object', 'callback' );


		$this->assertTrue( ! empty( $this->loader->get_action() ) );
		$this->assertInstanceOf( Hook::class, $this->loader->get_action()[0] );
	}

	/**
	 * add_filter with full data
	 */
	public function test_add_filter() {
		$this->loader->add_filter( 'hook_name', 'object', 'callback', 20, 1 );


		$this->assertTrue( ! empty( $this->loader->get_filters() ) );
		$this->assertInstanceOf( Hook::class, $this->loader->get_filters()[0] );
	}

	/**
	 * Test default parameters priority and accepted args
	 */
	public function test_add_filter_default() {
		$this->loader->add_filter( 'hook_name', 'object', 'callback' );


		$this->assertTrue( ! empty( $this->loader->get_filters() ) );
		$this->assertInstanceOf( Hook::class, $this->loader->get_filters()[0] );
	}

	/**
	 * Test loader run WordPress functions
	 *
	 * functions don't execute because class have methods with same name
	 */
	public function test_run() {
		$loader = new Loader();
		$loader->add_action( 'hook_name', 'object', 'callback', 20, 1 );
		$loader->add_filter( 'hook_name', 'object', 'callback', 20, 1 );
		$loader->run();


		$this->assertTrue(true);
	}

}