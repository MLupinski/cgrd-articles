<?php

declare(strict_types=1);

namespace App\Command;

class CreateArticle
{
    /**
     * @param string $title
     * @param string $description
     * @param string $user
     */
    public function __construct(
        private readonly string $title,
        private readonly string $description,
        private readonly string $user
    ) {
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }
}
