<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\View;
use App\Manager\SessionManager;

class LogoutController
{
    /**
     * @return void
     */
    public function index(): void
    {
        $sessionManager = new SessionManager();
        $sessionManager->unsetLoginSession();

        header('Location: /');
    }
}
