<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\View;

class HomeController
{

    /**
     * @return View
     */
    public function index(): View
    {
        return new View('home/index.phtml');
    }
}
