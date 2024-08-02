<?php

declare(strict_types=1);

session_start();

use App\Controller\FrontController;

require __DIR__ . '/vendor/autoload.php';

$frontController = new FrontController();
$frontController->run();
