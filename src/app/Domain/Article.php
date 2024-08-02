<?php

declare(strict_types=1);

namespace App\Domain;

use DateTimeImmutable;

class Article
{
    /**
     * @param int|null                 $id
     * @param string                   $title
     * @param string                   $description
     * @param string                   $user
     * @param DateTimeImmutable|string $createdAt
     * @param DateTimeImmutable|string $updatedAt
     */
    public function __construct(
        private readonly ?int                     $id,
        private string                            $title,
        private string                            $description,
        private string                            $user,
        private readonly DateTimeImmutable|string $createdAt,
        private DateTimeImmutable|string          $updatedAt
    ) {
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
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

    /**
     * @return DateTimeImmutable|string
     */
    public function getCreatedAt(): DateTimeImmutable|string
    {
        return $this->createdAt;
    }

    /**
     * @return DateTimeImmutable|string
     */
    public function getUpdatedAt(): DateTimeImmutable|string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $description
     *
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param DateTimeImmutable $updatedAt
     *
     * @return void
     */
    public function setUpdatedAt(DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param string $user
     *
     * @return void
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }
}
