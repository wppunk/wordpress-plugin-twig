<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Custom_Robots
 */

use Plugin_Name\Includes\Autoload;

$_SERVER['HTTP_HOST'] = '';


require_once __DIR__ . '/../vendor/autoload.php';

define( 'PLUGIN_DIR', __DIR__ . '/../' );


require_once __DIR__ . '/../includes/autoload.php';
require_once __DIR__ . '/../includes/hook.php';
require_once __DIR__ . '/../includes/controller.php';
require_once __DIR__ . '/../includes/loader.php';
require_once __DIR__ . '/../admin/admin.php';
require_once __DIR__ . '/../core/main.php';
require_once __DIR__ . '/../front/front.php';

WP_Mock::bootstrap();