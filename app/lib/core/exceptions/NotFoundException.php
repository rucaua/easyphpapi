<?php

namespace app\lib\core\exceptions;

class NotFoundException extends \Exception
{
    public function __construct($message = 'Not Found')
    {
        parent::__construct($message, 404);
        http_response_code(404);
    }
}