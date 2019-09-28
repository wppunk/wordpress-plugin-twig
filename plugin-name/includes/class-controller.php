<?php
/**
 * Controller for the ability to work with twig.
 *
 * @package   Plugin_Name\Includes
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

namespace Plugin_Name\Includes;

use Exception;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/**
 * Class Controller
 */
class Controller {

	/**
	 * Twig environment.
	 *
	 * @var Environment
	 */
	private $twig;

	/**
	 * Controller constructor.
	 *
	 * @param array $directories List of directories for twig files.
	 */
	public function __construct( array $directories ) {
		foreach ( $directories as $key => $directory ) {
			$directories[ $key ] = $directory . '/views/';
		}
		$loader     = new FilesystemLoader( $directories );
		$this->twig = new Environment( $loader, [ 'debug' => true ] );
		$this->twig->addExtension( new DebugExtension() );
	}

	/**
	 * Render twig template
	 *
	 * @param string $template_name Twig filename.
	 * @param array  $params        Arguments to transfer to twig file.
	 */
	protected function render( string $template_name, array $params = [] ) {
		try {
			$view = $this->twig->render( "$template_name.twig", $params );
		} catch ( Exception $exception ) {
			$view = $exception->getMessage();
		}

		echo wp_kses_post( $view );
	}

}
