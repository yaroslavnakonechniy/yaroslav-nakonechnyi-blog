<?php

declare(strict_types=1);

namespace Nakonechnyi\Install\Controller;

use Nakonechnyi\Framework\Http\Response\Html;

class Index implements \Nakonechnyi\Framework\Http\ControllerInterface
{
    private \Nakonechnyi\Framework\Database\Adapter\AdapterInterface $adapter;

    private \Nakonechnyi\Framework\Http\Response\Html $html;

    /**
     * @param \Nakonechnyi\Framework\Database\Adapter\AdapterInterface $adapter
     * @param \Nakonechnyi\Framework\Http\Response\Html $html
     */
    public function __construct(
        \Nakonechnyi\Framework\Database\Adapter\AdapterInterface $adapter,
        \Nakonechnyi\Framework\Http\Response\Html $html
    ) {
        $this->adapter = $adapter;
        $this->html = $html;
    }

    /**
     * @return Html
     */
    public function execute(): Html
    {
        $output = '';

        try {
            $connection = $this->adapter->getConnection();
            $output .= 'Successful DB connection!<br/>';
            // Convention: comment `#---` is a query separator for `schema.sql` file
            $sql = file_get_contents('../config/schema.sql');

            foreach (explode('#---', $sql) as $query) {
                $query = trim($query);
                $output .= sprintf('Executing query: <br/><pre>%s</pre><br/>', htmlspecialchars($query));
                if (!$connection->query($query)) {
                    throw new \RuntimeException('Error executing query!');
                }
            }

            $output .= '<p style="font-size:32px;color:green;">Execution completed!</p>';
        } catch (\Exception $e) {
            $output .= "<p style='font-size:32px;color:red;'>{$e->getMessage()}</p>";
        }

        $this->html->setBody($output);

        return $this->html;
    }
}