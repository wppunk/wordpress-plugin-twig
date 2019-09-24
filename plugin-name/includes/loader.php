<?php

namespace Plugin_Name\Includes;

use Plugin_Name\Includes\Hook;

/**
 * Class Loader
 * @package Plugin_Name\Includes
 */
class Loader {

	/**
	 * @var array of Hook objects
	 */
	protected $actions;

	/**
	 * @var array of Hook objects
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
	 * @param string $hook_name
	 * @param object|string $component
	 * @param string $callback
	 * @param int $priority
	 * @param int $accepted_args
	 */
	public function add_action( string $hook_name, $component, string $callback, int $priority = 10, int $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook_name, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * @param string $hook_name
	 * @param $component
	 * @param string $callback
	 * @param int $priority
	 * @param int $accepted_args
	 */
	public function add_filter( string $hook_name, $component, string $callback, int $priority = 10, int $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook_name, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * @param $hooks
	 * @param $hook_name
	 * @param $component
	 * @param $callback
	 * @param $priority
	 * @param $accepted_args
	 *
	 * @return array
	 */
	private function add( $hooks, $hook_name, $component, $callback, $priority, $accepted_args ) {
		$hooks[] = new Hook( $hook_name, $component, $callback, $priority, $accepted_args );

		return $hooks;
	}

	/**
	 * Run all hooks
	 */
	public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter( $hook->hook_name, [
				$hook->component,
				$hook->callback
			], $hook->priority, $hook->accepted_args );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook->hook_name, [
				$hook->component,
				$hook->callback
			], $hook->priority, $hook->accepted_args );
		}

	}

}