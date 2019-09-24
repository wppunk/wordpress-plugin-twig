<?php

use Plugin_Name\Front\Front;
use WP_Mock\Tools\TestCase;

/**
 * Class Test_Front
 */
class Test_Front extends TestCase {

	/**
	 * @var Front
	 */
	private $object;

	/**
	 * Before all tests starting
	 */
	public function setUp(): void {
		parent::setUp();
		$this->object = new Front( [
			'name'    => 'Plugin Name',
			'slug'    => 'plugin-slug',
			'version' => '1.0.0'
		], [] );
	}

	/**
	 * Test Front construct
	 */
	public function test___construct() {
		new Front( [
			'name'    => 'Plugin Name',
			'slug'    => 'plugin-slug',
			'version' => '1.0.0'
		], [] );


		$this->assertTrue( true );
	}

	/**
	 * Test Front construct with incorrect data
	 */
	public function test_fail___construct() {
		$this->expectException( TypeError::class );


		new Front( '', '' );


		$this->assertTrue( true );
	}

	/**
	 * Test connect styles on front pages
	 */
	public function test_enqueue_styles() {
		WP_Mock::userFunction( 'plugin_dir_url' );
		WP_Mock::userFunction( 'wp_enqueue_style' );


		$this->object->enqueue_styles();


		$this->assertTrue( true );
	}

	/**
	 * Test connect scripts on front pages
	 */
	public function test_enqueue_scripts() {
		WP_Mock::userFunction( 'plugin_dir_url' );
		WP_Mock::userFunction( 'wp_enqueue_script' );


		$this->object->enqueue_scripts();


		$this->assertTrue( true );
	}

}