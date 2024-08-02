<?php

declare(strict_types=1);

namespace App\Repository;

use App\Core\Database;
use App\Domain\Article;
use App\Domain\ArticleRepositoryInterface;
use PDO;

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @param Database $database
     */
    public function __construct(private readonly Database $database)
    {
    }

    /**
     * @param Article $article
     *
     * @return void
     */
    public function save(Article $article): void
    {
        $stmt = $this->database->getConnection()->prepare(
            'INSERT INTO articles (title, description, user, created_at, updated_at) 
            VALUES (:title, :description, :user, :created_at, :updated_at)
        ');

        $stmt->execute([
            'title' => $article->getTitle(),
            'description' => $article->getDescription(),
            'user' => $article->getUser(),
            'created_at' => $article->getCreatedAt()->format('Y-m-d H:i:s'),
            'updated_at' => $article->getUpdatedAt()->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $stmt = $this->database->getConnection()->query('SELECT * FROM articles');
        $rows = $stmt->fetchAll();
        $articles = [];
        foreach ($rows as $row) {
            $articles[] = new Article(
                $row['id'], $row['title'], $row['description'], $row['user'], $row['created_at'], $row['updated_at']
            );
        }

        return $articles;
    }

    /**
     * @param string|int $id
     *
     * @return Article|null
     */
    public function findById(string|int $id): ?Article
    {
        $stmt = $this->database->getConnection()->prepare('SELECT * FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Article(
                $row['id'],
                $row['title'],
                $row['description'],
                $row['user'],
                $row['created_at'],
                $row['updated_at']
            );
        }

        return null;
    }

    /**
     * @param Article $article
     *
     * @return void
     */
    public function update(Article $article): void
    {
        $stmt = $this->database->getConnection()
            ->prepare(
                'UPDATE articles 
                SET title = :title, description = :description, user = :user, updated_at = :updated_at
                WHERE id = :id'
            );

        $stmt->execute([
            'id' => $article->getId(),
            'title' => $article->getTitle(),
            'description' => $article->getDescription(),
            'user' => $article->getUser(),
            'updated_at' => $article->getUpdatedAt()->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * @param string|int $id
     *
     * @return void
     */
    public function delete(string|int $id): void
    {
        $stmt = $this->database->getConnection()->prepare('DELETE FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
