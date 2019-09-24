<?php

use Plugin_Name\Admin\Admin;
use WP_Mock\Tools\TestCase;

/**
 * Class Test_Admin
 */
class Test_Admin extends TestCase {

	/**
	 * @var Admin
	 */
	private $object;
	/**
	 * @var string
	 */
	private $plugin_name = 'Plugin Name';
	/**
	 * @var string
	 */
	private $plugin_slug = 'plugin-slug';

	/**
	 * Before all tests starting
	 */
	public function setUp(): void {
		parent::setUp();
		$this->object = new Admin( [
			'name'    => $this->plugin_name,
			'slug'    => $this->plugin_slug,
			'version' => '1.0.0'
		], [] );
	}

	/**
	 * Test Admin construct
	 */
	public function test___construct() {
		new Admin( [
			'name'    => $this->plugin_name,
			'slug'    => $this->plugin_slug,
			'version' => '1.0.0'
		], [] );


		$this->assertTrue( true );
	}

	/**
	 * Test Admin construct with incorrect data
	 */
	public function test_fail___construct() {
		$this->expectException( TypeError::class );


		new Admin( '', '' );


		$this->assertTrue( true );
	}

	/**
	 * Test do not connect styles on admin pages
	 */
	public function test_no_enqueue_styles() {
		$this->object->enqueue_styles();


		$this->assertTrue( true );
	}

	/**
	 * Test connect styles on admin pages
	 */
	public function test_enqueue_styles() {
		$_GET['page'] = $this->plugin_slug;
		WP_Mock::userFunction( 'plugin_dir_url' );
		WP_Mock::userFunction( 'wp_enqueue_style' );


		$this->object->enqueue_styles();


		$this->assertTrue( true );
	}

	/**
	 * Test do not connect scripts on admin pages
	 */
	public function test_no_enqueue_scripts() {
		$this->object->enqueue_scripts();


		$this->assertTrue( true );
	}

	/**
	 * Test connect scripts on admin pages
	 */
	public function test_enqueue_scripts() {
		$_GET['page'] = $this->plugin_slug;
		WP_Mock::userFunction( 'plugin_dir_url' );
		WP_Mock::userFunction( 'wp_enqueue_script' );


		$this->object->enqueue_scripts();


		$this->assertTrue( true );
	}

	/**
	 * Test register plugin menu
	 */
	public function test_add_menu() {
		WP_Mock::userFunction( 'add_menu_page', [
			'args' => [
				$this->plugin_name,
				$this->plugin_name,
				'manage_options',
				$this->plugin_slug,
				[
					$this->object,
					'page_options'
				]
			]
		] );


		$this->object->add_menu();


		$this->assertTrue( true );
	}

	/**
	 * Test plugin settings
	 */
	public function test_page_options() {
		ob_start();


		$this->object->page_options();


		$this->assertTrue( ! empty( ob_get_clean() ) );
	}

}