<?php

declare(strict_types=1);

namespace App\QueryHandler;

use App\Repository\ArticleRepository;

class ArticlesHandler
{
    /**
     * @param ArticleRepository $repository
     */
    public function __construct(private readonly ArticleRepository $repository)
    {
    }

    /**
     * @return array
     */
    public function handle(): array
    {
        return $this->repository->findAll();
    }
}
