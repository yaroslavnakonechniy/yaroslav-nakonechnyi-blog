<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog\Model\Author;

class Repository
{
    public const TABLE = 'author';
    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(\DI\FactoryInterface $factory)
    {
        $this->factory = $factory;
    }
    /**
     * @return Entity[]
     */
    public function getList(): array
    {
        return [
            1 => $this->makeEntity()
                ->setAuthorId(1)
                ->setName('Stiv Rockfeller')
                ->setUrl('stiv-rockfeller')
                ->setPosts([1]),
            2 => $this->makeEntity()
                ->setAuthorId(2)
                ->setName('Elizabet Tailor')
                ->setUrl('elizabet-tailor')
                ->setPosts([2]),
            3 => $this->makeEntity()
                ->setAuthorId(3)
                ->setName('Sasha Novikov')
                ->setUrl('sasha-novikov')
                ->setPosts([3]),
        ];
    }
    /**
     * @param string $url
     * @return ?Entity
     */
    public function getByUrl(string $url): ?Entity
    {
        $data = array_filter(
            $this->getList(),
            static function ($author) use ($url) {
                return $author->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @param int $authorId
     * @return Entity|null
     */
    public function getAuthorById(int $authorId): ?Entity
    {
        $data = array_filter(
            $this->getList(),
            static function ($author) use ($authorId) {
                return $author->getAuthorId() === $authorId;
            }
        );

        return array_pop($data);
    }
    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}
