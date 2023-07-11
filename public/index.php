<?php
require __DIR__.'/../vendor/autoload.php';

use Foxdb\DB;
use Foxdb\Config;
use Pecee\SimpleRouter\SimpleRouter as Router;

/* Load dotEnv */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

/* Load Query Builder */
DB::addConnection('main', [
    'host' => $_ENV['DB_HOST'] ?? 'locahhost',
    'database' => $_ENV['DB_NAME'] ?? 'test-db',
    'username' => $_ENV['DB_USER'] ?? 'root',
    'password' => $_ENV['DB_PASSWORD'] ?? 'password',
    'port' => $_ENV['DB_PORT'] ?? '3306',
    'charset' => $_ENV['DB_ENCODING'] ?? Config::UTF8,
    'collation'=>Config::UTF8_GENERAL_CI,
    'fetch'=>Config::FETCH_CLASS
]);

/* Load helpers */
require_once __DIR__.'/../helpers/routes.php';
require_once __DIR__.'/../helpers/views.php';


/* Load external routes file */
require_once __DIR__.'/../routes/web.php';
require_once __DIR__.'/../routes/api.php';

/* The default namespace for route-callbacks. */
Router::setDefaultNamespace('\App\Controllers');

// Start the routing
Router::start();