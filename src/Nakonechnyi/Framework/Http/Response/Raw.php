<?php

declare(strict_types=1);

namespace Nakonechnyi\Framework\Http\Response;

class Raw
{
    private array $headers = [];

    private string $body = '';

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return $this
     */
    public function setBody(string $body): Raw
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param string $headers
     */
    public function setHeaders(string $headers): void
    {
        $this->headers[] = $headers;
    }

    /**
     * @return void
     */
    public function send(): void
    {
        foreach ($this->getHeaders() as $header) {
            header($header);
        }

        echo $this->getBody();
    }
}
