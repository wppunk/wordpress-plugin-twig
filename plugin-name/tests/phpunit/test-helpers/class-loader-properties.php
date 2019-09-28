<?php
/**
 * Testing Loader Properties
 *
 * @package   Plugin_Name\Test\PHPUnit\Test_Helpers
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

use Plugin_Name\Includes\Loader;

/**
 * Class Extends_Loader for testing properties
 */
class Loader_Properties extends Loader {
	/**
	 * Testing protected property actions.
	 *
	 * @return array
	 */
	public function get_action() {
		return $this->actions;
	}

	/**
	 * Testing protected property filters.
	 *
	 * @return array
	 */
	public function get_filters() {
		return $this->filters;
	}
}
