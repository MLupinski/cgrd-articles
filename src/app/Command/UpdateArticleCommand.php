<?php

declare(strict_types=1);

namespace App\Command;

class UpdateArticleCommand
{
    /**
     * @param string $id
     * @param string $title
     * @param string $description
     * @param string $user
     */
    public function __construct(
        private readonly string $id,
        private readonly string $title,
        private readonly string $description,
        private readonly string $user = 'admin'
    ) {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
