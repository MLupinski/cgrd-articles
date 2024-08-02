<?php

declare(strict_types=1);

namespace App\Controller;

use App\Command\CreateArticle;
use App\Command\DeleteArticleCommand;
use App\Command\UpdateArticleCommand;
use App\CommandHandler\CreateArticleHandler;
use App\CommandHandler\DeleteArticleHandler;
use App\CommandHandler\UpdateArticleHandler;
use App\Core\Database;
use App\Manager\FlashMessage;
use App\Repository\ArticleRepository;

class ArticleController
{
    /**
     * @return void
     */
    public function create(): void
    {
        $request = $_REQUEST;
        $database = new Database();
        $articleRepository = new ArticleRepository($database);
        $createHandler = new CreateArticleHandler($articleRepository);
        $createCommand = new CreateArticle($request['article-title'], $request['article-description'], 'admin');
        $createHandler->handle($createCommand);

        $flashMessage = new FlashMessage();
        $flashMessage->addMessage(FlashMessage::ARTICLE_CREATED, 'success');

        header('Location: /dashboard');
    }

    /**
     * @param string|int $id
     *
     * @return void
     */
    public function delete(string|int $id): void
    {
        $database = new Database();
        $articleRepository= new ArticleRepository($database);
        $deleteHandler = new DeleteArticleHandler($articleRepository);
        $deleteCommand = new DeleteArticleCommand($id);

        $deleteHandler->handle($deleteCommand);

        $flashMessage = new FlashMessage();
        $flashMessage->addMessage(FlashMessage::ARTICLE_DELETED, 'success');

        header('Location: /dashboard');
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $database = new Database();
        $articleRepository = new ArticleRepository($database);
        $updateHandler = new UpdateArticleHandler($articleRepository);
        $updateCommand = new UpdateArticleCommand(
            $_REQUEST['article-id'],
            $_REQUEST['article-title'],
            $_REQUEST['article-description']
        );
        $updateHandler->handle($updateCommand);

        $flashMessage = new FlashMessage();
        $flashMessage->addMessage(FlashMessage::ARTICLE_UPDATED, 'success');

        header('Location: /dashboard');
    }
}
