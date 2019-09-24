<?php

namespace Plugin_Name\Front;

use Plugin_Name\Includes\Controller;

/**
 * Class Front
 * @package Plugin_Name\Front
 */
class Front extends Controller {

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
	 * Front constructor.
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
	 * Register the styles for the front area.
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_slug, plugin_dir_url( __FILE__ ) . 'assets/css/main.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the scripts for the front area.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_slug, plugin_dir_url( __FILE__ ) . 'assets/js/main.js', array( 'jquery' ), $this->version, false );
	}

}