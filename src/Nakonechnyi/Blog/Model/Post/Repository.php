<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog\Model\Post;

class Repository
{
    private \DI\FactoryInterface $factory;

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
                ->setPostId(1)
                ->setName('Football')
                ->setUrl('football')
                ->setDescription('NFL Week 5 game picks,')
                ->setAuthor('Ivan Salabay')
                ->setDate('11.06.2021'),
            2 => $this->makeEntity()
                ->setPostId(2)
                ->setName('Nike')
                ->setUrl('tenis')
                ->setDescription('Nike - it is good')
                ->setAuthor('Oleg Vinik')
                ->setDate('02.12.2021'),
            3 => $this->makeEntity()
                ->setPostId(3)
                ->setName('News for world')
                ->setUrl('news-for-world')
                ->setDescription('sdfds dsfdsf sfdsf sdf')
                ->setAuthor('Mihail Son')
                ->setDate('01.02.2021'),
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
            static function ($post) use ($url) {
                return $post->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @param array $postIds
     * @return Entity[]
     */
    public function getByIds(array $postIds)
    {
        return array_intersect_key(
            $this->getList(),
            array_flip($postIds)
        );
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}
