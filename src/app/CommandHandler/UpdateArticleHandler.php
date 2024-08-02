<?php

declare(strict_types=1);

namespace App\CommandHandler;

use App\Command\UpdateArticleCommand;
use App\Repository\ArticleRepository;
use DateTimeImmutable;

class UpdateArticleHandler
{
    /**
     * @param ArticleRepository $repository
     */
    public function __construct(private readonly ArticleRepository $repository)
    {
    }

    /**
     * @param UpdateArticleCommand $command
     *
     * @return void
     */
    public function handle(UpdateArticleCommand $command): void
    {
        $article = $this->repository->findById($command->getId());
        if ($article) {
            $article->setTitle($command->getTitle());
            $article->setDescription($command->getDescription());
            $article->setUpdatedAt(new DateTimeImmutable());
            $article->setUser($command->getUser());

            $this->repository->update($article);
        }
    }
}
