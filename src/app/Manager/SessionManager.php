<?php

declare(strict_types=1);

namespace App\Manager;

class SessionManager
{
    /**
     * @return bool
     */
    public function checkLoginSessionStatus(): bool
    {
        return isset($_SESSION['user']['login']);
    }

    /**
     * @param bool $status
     *
     * @return void
     */
    public function setLoginSession(): void
    {
        $_SESSION['user']['login'] = true;
    }

    public function unsetLoginSession(): void
    {
        unset($_SESSION['user']['login']);
    }

    /**
     * @param mixed $key
     *
     * @return bool
     */
    public function checkFlashMessageSessionStatus(mixed $key): bool
    {
        return isset($_SESSION['flash_message'][$key]);
    }
    /**
     * @param string $message
     * @param mixed  $key
     *
     * @return void
     */
    public function setFlashMessageSession(string $message, mixed $key): void
    {
        $_SESSION['flash_message'][$key] = $message;
    }

    public function getFlashMessageSession(mixed $key)
    {
        return $_SESSION['flash_message'][$key];
    }
    public function unsetFlashMessageSession(): void
    {
        unset($_SESSION['flash_message']);
    }
}
