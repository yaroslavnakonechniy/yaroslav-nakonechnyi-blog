<?php

declare(strict_types=1);

namespace Nakonechnyi\Install\Command;

use Nakonechnyi\Blog\Model\Category\Repository as CategoryRepository;
use Nakonechnyi\Blog\Model\Post\Repository as ProductRepository;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateData extends \Symfony\Component\Console\Command\Command
{
    protected static $defaultName = 'install:generate-data';

    private \Nakonechnyi\Framework\Database\Adapter\AdapterInterface $adapter;

    private OutputInterface $output;

    private const POST_COUNT = 10;

    private const AUTHOR_COUNT = 20;

    /**
     * @param \Nakonechnyi\Framework\Database\Adapter\AdapterInterface $adapter
     * @param string|null $name
     */
    public function __construct(
        \Nakonechnyi\Framework\Database\Adapter\AdapterInterface $adapter,
        string $name = null
    ) {
        parent::__construct($name);
        $this->adapter = $adapter;
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Generate demo data for shop testing');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->output = $output;
        $this->generateData();
        $output->writeln('Completed!');

        return self::SUCCESS;
    }

    /**
     * Generate test data
     *
     * @return void
     */
    private function generateData(): void
    {
        $this->profile([$this, 'truncateTables']);
        $this->profile([$this, 'generateCategories']);
        $this->profile([$this, 'generatePots']);
        $this->profile([$this, 'generateAuthor']);
        $this->profile([$this, 'generateCategoryPostAuthor']);
        $this->profile([$this, 'generateDailyStatistics']);
    }

    /**
     * Truncate (empty) tables before inserting new data
     *
     * @return void
     */
    private function truncateTables(): void
    {
        $tables = [
            ProductRepository::TABLE_CATEGORY_POST_AUTHOR,
            'author',
            'daily_statistics',
            CategoryRepository::TABLE,
            ProductRepository::TABLE,
        ];
        $connection = $this->adapter->getConnection();
        $connection->query('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $table) {
            $connection->query("TRUNCATE TABLE `$table`");
            $this->output->writeln("Truncated table: $table");
        }

        $connection->query('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Insert seven categories. Add data to random 5 of them
     *
     * @return void
     */
    private function generateCategories(): void
    {
        $categories = [
            'Sport', 'World news', 'TV', 'Technology', 'IT', 'Movies', 'Music', 'Shopping', 'Cars', 'Gadgets'
        ];
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO category (`name`, `url`)
                VALUES (:name, :url);
            SQL);
        foreach ($categories as $category) {
            $statement->bindValue(':name', $category);
            $statement->bindValue(':url', strtolower($category));
            $statement->execute();
        }
    }

    /**
     * @return void
     */
    private function generatePots(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO post (`name`, `url`, `description`, `date`)
                VALUES (:name, :url, :description, :date);
            SQL);

        for ($i = 1; $i <= self::POST_COUNT; $i++) {
            $name = "Post $i";
            $url = str_replace(' ', '_', strtolower($name));
            $statement->bindValue(':name', $name);
            $statement->bindValue(':url', $url);
            $statement->bindValue(':description', "$name short description text");
            $statement->bindValue(':date', date('Y-m-d', random_int(1633046400, 1635724800)));
            $statement->execute();
        }
    }

    /**
     * @return void
     */
//    private function generateCategoryPostAuthor(): void
//    {
//        $statement = $this->adapter->getConnection()
//            ->prepare(<<<SQL
//                INSERT INTO category_post_author (`category_id`, `post_id`, `author_id`)
//                VALUES (:category_id, :post_id, :author_id);
//            SQL);
//        // Get only 5 random categories of total 7
//        $categoryIds = array_rand(array_flip(range(1, 10)), 7);
//        for ($i = 1; $i <= self::POST_COUNT; $i++) {
//            if (random_int(1, 3) === 1) {
//                continue;
//            }
//            $postCategories = (array) array_rand(array_flip($categoryIds), random_int(1, 7));
//            foreach ($postCategories as $categoryId) {
//                $statement->bindValue(':category_id', $categoryId);
//                $statement->bindValue(':post_id', $i);
//                $statement->execute();
//            }
//        }
//    }

    /**
     * @return void
     */
    private function generateAuthor(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO `author` ( `firstname`, `lastname`)
                VALUES (:firstname, :lastname);
            SQL);

        for ($i = 1; $i <= self::AUTHOR_COUNT; $i++) {
            $statement->bindValue(':firstname', $this->getRandomFirstName());
            $statement->bindValue(':lastname', $this->getRandomLastName());
            $statement->execute();
        }
    }

    /**
     * @return void
     */
    private function generateCategoryPostAuthor(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO category_post_author (`author_id`, `post_id`, `category_id`)
                VALUES (:author_id, :post_id, :category_id);
            SQL);

        for ($author_id = 1; $author_id <= self::POST_COUNT; $author_id++) {
            $count_post = random_int(5, 20);
            for ($post_id = 1; $post_id <= $count_post; $post_id++) {
                $count_category = random_int(1, 7);
                for ($category_id = 1; $category_id <= $count_category; $category_id++) {
                    $statement->bindValue(':author_id', $author_id);
                    $statement->bindValue(':post_id', $post_id);
                    $statement->bindValue(':category_id', $category_id);
                    $statement->execute();
                }
            }
        }
    }

    /**
     * @return void
     */
    private function generateDailyStatistics(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO daily_statistics (`post_id`, `date`, `views`)
                VALUES (:post_id, :date, :views );
            SQL);
        for ($i = 1; $i <= self::POST_COUNT; $i++) {
            $statement->bindValue(':post_id', $i);
            $statement->bindValue(':date', date('Y-m-d', random_int(1633046400, 1635724800)));
            $statement->bindValue(':views', random_int(1, 50));
            $statement->execute();
        }
    }

    /**
     * @return void
     */
    private function getRandomFirstName(): string
    {
        static $randomNames = [
            'Norbert','Damon','Laverna','Annice','Brandie','Emogene','Cinthia','Magaret','Daria','Ellyn','Rhoda',
            'Debbra','Reid','Desire','Sueann','Shemeka','Julian','Winona','Billie','Michaela'
        ];

        return $randomNames[array_rand($randomNames)];
    }

    /**
     * @return void
     */
    private function getRandomLastName(): string
    {
        static $randomNames = [
            'Smith','Johnson','Williams','Jones','Brown','Davis','Miller','Taylor','Anderson','Thomas','Jackson',
            'Harris','Martin','Thompson','Garcia','Martinez','Robinson','Clark','Rodriguez','Lewis'
        ];

        return $randomNames[array_rand($randomNames)];
    }

    /**
     * @param callable $callback
     * @return void
     */
    private function profile(callable $callback): void
    {
        $start = microtime(true);
        $callback();
        $totalTime = number_format(microtime(true) - $start, 4);
        $this->output->writeln("Executing <info>$callback[1]</info> took <info>$totalTime</info>");
    }
}
