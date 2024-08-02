<?php

declare(strict_types=1);

namespace App\Command;

class DeleteArticleCommand
{
    /**
     * @param string $id
     */
    public function __construct(private readonly string $id)
    {
    }

    /**
     * @return string|int
     */
    public function getId(): string|int
    {
        return $this->id;
    }
}
