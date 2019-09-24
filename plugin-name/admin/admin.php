<?php

namespace Plugin_Name\Admin;

use Plugin_Name\Includes\Controller;

/**
 * The admin-specific functionality of the plugin.
 * @package Plugin_Name\Admin
 */
class Admin extends Controller {

	/**
	 * The name of this name.
	 * @var string
	 */
	private $plugin_name;
	/**
	 * The version of this plugin.
	 * @var string
	 */
	private $plugin_slug;
	/**
	 * The version of this plugin.
	 * @var string
	 */
	private $version;
	/**
	 * The options of this plugin.
	 * @var array
	 */
	private $options;

	/**
	 * Admin constructor.
	 *
	 * @param array $plugin_info
	 * @param array $options
	 */
	public function __construct( array $plugin_info, array $options ) {
		parent::__construct( __DIR__ );
		$this->plugin_name = $plugin_info['name'];
		$this->plugin_slug = $plugin_info['slug'];
		$this->version     = $plugin_info['version'];
		$this->options     = $options;
	}

	/**
	 * Register the styles for the admin area.
	 */
	public function enqueue_styles() {
		if ( ! empty( $_GET['page'] ) && $this->plugin_slug == $_GET['page'] ) {
			wp_enqueue_style( $this->plugin_slug, plugin_dir_url( __FILE__ ) . 'css/main.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts() {
		if ( ! empty( $_GET['page'] ) && $this->plugin_slug == $_GET['page'] ) {
			wp_enqueue_script( $this->plugin_slug, plugin_dir_url( __FILE__ ) . 'js/main.js', array( 'jquery' ), $this->version, false );
		}
	}

	/**
	 * Add plugin page in wordpress menu.
	 */
	public function add_menu() {
		add_menu_page( $this->plugin_name, $this->plugin_name, 'manage_options', $this->plugin_slug, array(
			$this,
			'page_options'
		) );
	}

	/**
	 * Plugin page callback.
	 */
	public function page_options() {
		$this->render( 'page-options', array(
			'plugin_name' => $this->plugin_name,
		) );
	}

}