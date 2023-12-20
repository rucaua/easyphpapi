<?php

namespace app\lib\response;

interface ResponseInterface
{
    /**
     * Convert object or array of object string
     */
    public function makeString(array $data): string;

    /**
     * @return string MIME type for current Response implementation
     */
    public function getContentType(): string;
}