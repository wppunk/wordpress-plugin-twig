<?php
/**
 * Register and add hooks to WordPress.
 *
 * @package   Plugin_Name\Includes
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

namespace Plugin_Name\Includes;

/**
 * Class Loader
 */
class Loader {

	/**
	 * All registered actions
	 *
	 * @var array
	 */
	protected $actions;

	/**
	 * All registered filters
	 *
	 * @var array
	 */
	protected $filters;

	/**
	 * Loader constructor.
	 */
	public function __construct() {
		$this->actions = [];
		$this->filters = [];
	}

	/**
	 * Register new action.
	 *
	 * @param string        $hook_name     WordPress hook name.
	 * @param object|string $component     Object or classname.
	 * @param string        $callback      Class method.
	 * @param int           $priority      Execution priority.
	 * @param int           $accepted_args The number of arguments the function accepts.
	 */
	public function add_action( string $hook_name, $component, string $callback, int $priority = 10, int $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook_name, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add new hook to list.
	 *
	 * @param array         $hooks         List of already registered hooks.
	 * @param string        $hook_name     WordPress hook name.
	 * @param object|string $component     Object or classname.
	 * @param string        $callback      Class method.
	 * @param int           $priority      Execution priority.
	 * @param int           $accepted_args The number of arguments the function accepts.
	 *
	 * @return array
	 */
	private function add( array $hooks, string $hook_name, $component, string $callback, int $priority, int $accepted_args ) {
		$hooks[] = [
			'hook_name'     => $hook_name,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args,
		];

		return $hooks;
	}

	/**
	 * Register new filter.
	 *
	 * @param string        $hook_name     WordPress hook name.
	 * @param object|string $component     Object or classname.
	 * @param string        $callback      Class method.
	 * @param int           $priority      Execution priority.
	 * @param int           $accepted_args The number of arguments the function accepts.
	 */
	public function add_filter( string $hook_name, $component, string $callback, int $priority = 10, int $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook_name, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Run all hooks
	 */
	public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter(
				$hook['hook_name'],
				[
					$hook['component'],
					$hook['callback'],
				],
				$hook['priority'],
				$hook['accepted_args']
			);
		}

		foreach ( $this->actions as $hook ) {
			add_action(
				$hook['hook_name'],
				[
					$hook['component'],
					$hook['callback'],
				],
				$hook['priority'],
				$hook['accepted_args']
			);
		}

	}

}
