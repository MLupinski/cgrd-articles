<?php

declare(strict_types=1);

namespace App\CommandHandler;

use App\Command\DeleteArticleCommand;
use App\Repository\ArticleRepository;

class DeleteArticleHandler
{
    /**
     * @param ArticleRepository $articleRepository
     */
    public function __construct(private readonly ArticleRepository $articleRepository)
    {
    }

    /**
     * @param DeleteArticleCommand $command
     *
     * @return void
     */
    public function handle(DeleteArticleCommand $command): void
    {
        $this->articleRepository->delete($command->getId());
    }
}
