<?php
/**
 * Registration of all hooks and dependencies
 *
 * @package   Plugin_Name\Core
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

namespace Plugin_Name\Core;

use Plugin_Name\Admin\Admin;
use Plugin_Name\Front\Front;
use Plugin_Name\Includes\Loader;

/**
 * Class Main
 */
class Main {

	/**
	 * Name, slug and version of this plugin
	 *
	 * @var array
	 */
	private $plugin_info;
	/**
	 * The options of this plugin
	 *
	 * @var array
	 */
	private $options;
	/**
	 * Object for loading WordPress hooks
	 *
	 * @var Loader
	 */
	private $loader;

	/**
	 * Main constructor.
	 *
	 * @param Loader $loader Loading registered hooks.
	 */
	public function __construct( Loader $loader ) {

		$this->plugin_info = [
			'name'    => 'Plugin Name',
			'slug'    => 'plugin-name',
			'version' => '1.0.0',
		];
		$this->loader      = $loader;
		$options           = get_option( $this->plugin_info['slug'] );
		$this->options     = ! empty( $options ) ? $options : [];

		$this->hooks_admin();
		$this->hooks_front();
	}

	/**
	 * Register all of the hooks related to the admin area functionality of the plugin.
	 */
	private function hooks_admin() {

		$admin = new Admin( $this->plugin_info, $this->options );
		$this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $admin, 'add_menu' );

	}

	/**
	 * Register all of the hooks related to the front-end area functionality of the plugin.
	 */
	private function hooks_front() {

		$front = new Front( $this->plugin_info, $this->options );
		$this->loader->add_action( 'admin_enqueue_scripts', $front, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $front, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 */
	public function run() {
		$this->loader->run();
	}

}
