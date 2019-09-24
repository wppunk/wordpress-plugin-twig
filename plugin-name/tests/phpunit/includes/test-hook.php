<?php

use Plugin_Name\Includes\Hook;
use WP_Mock\Tools\TestCase;

/**
 * Class Test_Hook
 */
class Test_Hook extends TestCase {

	/**
	 * Test magic method __get
	 */
	public function test__get() {
		$hook = new Hook( 'hook_name', 'component', 'callback', 20, 2 );
		$this->assertSame( [
			'hook_name',
			'component',
			'callback',
			20,
			2
		], [
			$hook->hook_name,
			$hook->component,
			$hook->callback,
			$hook->priority,
			$hook->accepted_args
		] );
	}

	/**
	 * Test magic method __get for default hook properties
	 */
	public function test__get_default() {
		$hook = new Hook( 'hook_name', 'component', 'callback' );

		$this->assertSame( [
			'hook_name',
			'component',
			'callback',
			10,
			1
		], [
			$hook->hook_name,
			$hook->component,
			$hook->callback,
			$hook->priority,
			$hook->accepted_args
		] );
	}

	/**
	 * Test magic method __get for incorrect property
	 */
	public function test__get_incorrect() {
		$hook = new Hook( 'hook_name', 'component', 'callback', 10, 2 );
		$this->assertTrue( empty( $hook->incorrect ) );
	}

}