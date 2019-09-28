<?php
/**
 * Change admin panel in WordPress
 *
 * @package   Plugin_Name\Admin
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

namespace Plugin_Name\Admin;

use Plugin_Name\Includes\Controller;

/**
 * The admin-specific functionality of the plugin.
 *
 * @package Plugin_Name\Admin
 */
class Admin extends Controller {

	/**
	 * The name of this name
	 *
	 * @var string
	 */
	private $plugin_name;
	/**
	 * The version of this plugin
	 *
	 * @var string
	 */
	private $plugin_slug;
	/**
	 * The version of this plugin
	 *
	 * @var string
	 */
	private $version;
	/**
	 * The options of this plugin
	 *
	 * @var array
	 */
	private $options;

	/**
	 * Admin constructor
	 *
	 * @param array $plugin_info Name, slug and version of the plugin.
	 * @param array $options     Settings of the plugin.
	 */
	public function __construct( array $plugin_info, array $options ) {
		parent::__construct( [ __DIR__ ] );
		$this->plugin_name = $plugin_info['name'];
		$this->plugin_slug = $plugin_info['slug'];
		$this->version     = $plugin_info['version'];
		$this->options     = $options;
	}

	/**
	 * Register the styles for the admin area.
	 *
	 * @param string $hook_suffix The current admin page.
	 */
	public function enqueue_styles( string $hook_suffix ) {
		if ( strpos( $hook_suffix, $this->plugin_slug ) ) {
			wp_enqueue_style( $this->plugin_slug, plugin_dir_url( __FILE__ ) . 'css/main.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @param string $hook_suffix The current admin page.
	 */
	public function enqueue_scripts( string $hook_suffix ) {
		if ( strpos( $hook_suffix, $this->plugin_slug ) ) {
			wp_enqueue_script( $this->plugin_slug, plugin_dir_url( __FILE__ ) . 'js/main.js', array( 'jquery' ), $this->version, false );
		}
	}

	/**
	 * Add plugin page in WordPress menu.
	 */
	public function add_menu() {
		add_menu_page(
			$this->plugin_name,
			$this->plugin_name,
			'manage_options',
			$this->plugin_slug,
			[
				$this,
				'page_options',
			],
		);
	}

	/**
	 * Plugin page callback.
	 */
	public function page_options() {
		$this->render(
			'page-options',
			[
				'plugin_name' => $this->plugin_name,
			]
		);
	}

}
