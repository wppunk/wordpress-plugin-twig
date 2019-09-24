<?php

namespace Plugin_Name\Includes;

/**
 * Class Hook
 * @package Plugin_Name\Includes
 */
class Hook {

	/**
	 * Wordpress hook name
	 *
	 * @var string
	 */
	private $hook_name;
	/**
	 * If you use an object then call $component->{$callback}
	 * If you use an string then call $component::{$callback} therefore the callback should be a static method
	 *
	 * @var object|string
	 */
	private $component;
	/**
	 * Public component method
	 *
	 * @var string
	 */
	private $callback;
	/**
	 * Used to specify the order in which the functions associated with a particular action are executed.
	 *
	 * @var int
	 */
	private $priority;
	/**
	 * The number of arguments the function accepts.
	 *
	 * @var int
	 */
	private $accepted_args;

	/**
	 * Hook constructor.
	 *
	 * @param string $hook_name
	 * @param $component
	 * @param string $callback
	 * @param int $priority
	 * @param int $accepted_args
	 */
	public function __construct( string $hook_name, $component, string $callback, int $priority = 10, int $accepted_args = 1 ) {
		$this->hook_name     = $hook_name;
		$this->component     = $component;
		$this->callback      = $callback;
		$this->priority      = $priority;
		$this->accepted_args = $accepted_args;
	}

	/**
	 * @param $name
	 *
	 * @return string
	 */
	public function __get( $name ) {
		return isset( $this->{$name} ) ? $this->{$name} : '';
	}

}