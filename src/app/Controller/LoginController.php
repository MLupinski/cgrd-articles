<?php

namespace App\Controller;

use App\Manager\FlashMessage;
use App\Manager\SessionManager;

class LoginController
{
    /**
     * @return void
     */
    public function index(): void
    {
        $user = $_REQUEST['username'];
        $pass = $_REQUEST['password'];

        if ($user === 'admin' && $pass === 'test') {
            $sessionManager = new SessionManager();
            $sessionManager->setLoginSession();
            header('Location: /dashboard');

            return;
        }

        $messageManager = new FlashMessage();
        $messageManager->addMessage('Wrong Login Data!', 'error');
        header('Location: /');
    }
}
