<?php

declare(strict_types=1);

namespace Nakonechnyi\Cms\Block;

use Nakonechnyi\Blog\Model\Post\Entity as PostEntity;
use Nakonechnyi\Blog\Model\Author\Entity as AuthorEntity;

class NewestPosts extends \Nakonechnyi\Framework\View\Block
{
    protected string $template = '../src/Nakonechnyi/Cms/view/newest-posts.php';
    private \Nakonechnyi\Blog\Model\Post\Repository $postRepository;
    private \Nakonechnyi\Blog\Model\Author\Repository $authorRepository;

    /**
     * @param \Nakonechnyi\Blog\Model\Post\Repository $postRepository
     * @param \Nakonechnyi\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \Nakonechnyi\Blog\Model\Post\Repository $postRepository,
        \Nakonechnyi\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @return postEntity[]
     */
    public function getNewestPosts(): array
    {
        $postArr = $this->postRepository->getList();
        $keyArr = [];
        $outArr = [];
        $currentTime = time();
        foreach ($postArr as $instanceArr) {
            $key = $currentTime - strtotime($instanceArr->getDate());
            $keyArr[$key] = $instanceArr;
        }
        ksort($keyArr);
        $flag = 0;
        foreach ($keyArr as $instanceArr) {
            if ($flag < 3) {
                $outArr[] = $instanceArr;
                ++$flag;
            } else {
                break;
            }
        }
        return $outArr;

//        $posts = $this->postRepository->getList();
//        $key = [];
//        $sortArray = [];
//        $time = time();
//        $number = 0;
//
//        foreach ($posts as $post) {
//            $keyPost = $time - strtotime($post['date']);
//            $key[$keyPost] = $post;
//        }
//
//        ksort($key);
//        krsort($key);
//
//        return $key;
    }

    /**
     * @param int $authorId
     * @return AuthorEntity
     */
    public function getPostAuthor(int $authorId): AuthorEntity
    {
        return $this->authorRepository->getAuthorById($authorId);
    }
}
