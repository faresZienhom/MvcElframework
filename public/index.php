<?php

  define('ROOT_PATH', value: dirname(__FILE__));

  define('ROOT_DIR', '/MvcElframework/public/');

/**
 *  Run Composer Autoloader
 */
require_once __DIR__ . '/../vendor/autoload.php';




 (new Iliuminates\Application)->start();