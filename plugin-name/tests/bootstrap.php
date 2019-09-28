<?php
/**
 * Bootstrap File
 *
 * @package   Plugin_Name\Test
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/wordpress-plugin-twig/tree/master/plugin-name
 * @copyright Copyright © 2019
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

$_SERVER['HTTP_HOST'] = '';

require_once __DIR__ . '/../vendor/autoload.php';

define( 'PLUGIN_DIR', __DIR__ . '/..' );

// Load plugin classes.
require_once __DIR__ . '/../includes/class-autoload.php';
require_once __DIR__ . '/../includes/class-controller.php';
require_once __DIR__ . '/../includes/class-loader.php';
require_once __DIR__ . '/../admin/class-admin.php';
require_once __DIR__ . '/../core/class-main.php';
require_once __DIR__ . '/../front/class-front.php';

// Helpers for testing plugin classes.
require_once __DIR__ . '/phpunit/test-helpers/class-controller-render.php';
require_once __DIR__ . '/phpunit/test-helpers/class-loader-properties.php';

WP_Mock::bootstrap();
