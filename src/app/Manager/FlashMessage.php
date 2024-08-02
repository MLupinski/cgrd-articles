<?php

namespace App\Manager;

class FlashMessage {
    const ARTICLE_CREATED = 'News was successfully created!';
    const ARTICLE_DELETED = 'News was successfully deleted!';
    const ARTICLE_UPDATED = 'News was successfully changed!';

    /**
     * @param string $message
     *
     * @param mixed  $key
     *
     * @return void
     */
    public function addMessage(string $message, mixed $key): void
    {
        if (!$this->isSessionActive()) {
            session_start();
        }

        $sessionManager = new SessionManager();
        $sessionManager->setFlashMessageSession($message, $key);
    }

    /**
     * @param $key
     *
     * @return mixed|null
     */
    public function getMessage($key): mixed
    {
        $sessionManager = new SessionManager();
        if ($sessionManager->checkFlashMessageSessionStatus($key)) {
            $message = $sessionManager->getFlashMessageSession($key);
            $sessionManager->unsetFlashMessageSession();

            return $message;
        }

         return null;
    }

    /**
     * @return bool
     */
    private function isSessionActive(): bool
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }
}
