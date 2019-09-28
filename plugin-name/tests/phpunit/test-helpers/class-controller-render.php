<?php
/**
 * Helpers controller for testing protected method render.
 *
 * @package   Plugin_Name\Test\PHPUnit\Test_Helpers
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

use Plugin_Name\Includes\Controller;

/**
 * Class Controller_Render for testing method render
 */
class Controller_Render extends Controller {

	/**
	 * Test method render twig template
	 *
	 * @param string $template_name Twig filename.
	 * @param array  $params        Arguments to transfer to twig file.
	 */
	public function test_render( string $template_name, array $params = [] ) {
		parent::render( $template_name, $params );
	}

}
