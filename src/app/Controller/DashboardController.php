<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\View;
use App\Manager\FlashMessage;
use App\Manager\SessionManager;

class DashboardController
{
    /**
     * @return View
     */
    public function index(): View
    {
        $sessionManager = new SessionManager();
        if ($sessionManager->checkLoginSessionStatus()) {
            return new View('dashboard/index.phtml');
        }

        $messageManager = new FlashMessage();
        $messageManager->addMessage('You must log in to access this part of the portal.', 'info');

        header('Location: /');
    }
}
