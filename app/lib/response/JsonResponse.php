<?php

declare(strict_types=1);

namespace app\lib\response;

class JsonResponse implements ResponseInterface
{

    public function makeString(array $data): string
    {
        return json_encode($data,JSON_PRETTY_PRINT);
    }


    public function getContentType(): string
    {
        return 'application/json; charset=utf-8';
    }
}