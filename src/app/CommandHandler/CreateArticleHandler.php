<?php

declare(strict_types=1);

namespace App\CommandHandler;

use App\Command\CreateArticle;
use App\Domain\Article;
use App\Domain\ArticleRepositoryInterface;
use DateTimeImmutable;

class CreateArticleHandler
{
    /**
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(private readonly  ArticleRepositoryInterface $articleRepository)
    {
    }

    /**
     * @param CreateArticle $command
     *
     * @return void
     */
    public function handle(CreateArticle $command): void
    {
        $createdAt = new DateTimeImmutable();
        $updatedAt = $createdAt;

        $article = new Article(
            null,
            $command->getTitle(),
            $command->getDescription(),
            $command->getUser(),
            $createdAt,
            $updatedAt
        );

        $this->articleRepository->save($article);
    }
}
