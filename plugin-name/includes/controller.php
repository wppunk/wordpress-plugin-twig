<?php

namespace Plugin_Name\Includes;

use Exception;
use Twig\Extension\DebugExtension;
use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

/**
 * Class Controller
 * @package Plugin_Name\Includes
 */
class Controller {

	/**
	 * @var Environment
	 */
	private $twig;

	/**
	 * Controller constructor.
	 *
	 * @param $directories
	 */
	public function __construct( $directories ) {
		$directories = (array) $directories;
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
	 * @param string $template_name
	 * @param array $params
	 */
	protected function render( string $template_name, array $params = [] ) {
		try {
			$view = $this->twig->render( "$template_name.twig", $params );
		} catch ( Exception $exception ) {
			$view = $exception->getMessage();
		}
		echo $view;
	}

}