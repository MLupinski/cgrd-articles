<?php

declare(strict_types=1);

namespace App\Domain;

interface ArticleRepositoryInterface
{
    /**
     * @param Article $article
     *
     * @return void
     */
    public function save(Article $article): void;

    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param string|int $id
     *
     * @return void
     */
    public function delete(string|int $id): void;

    /**
     * @param string|int $id
     *
     * @return Article|null
     */
    public function findById(string|int $id): ?Article;

    /**
     * @param Article $article
     *
     * @return void
     */
    public function update(Article $article): void;
}
