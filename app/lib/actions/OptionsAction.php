<?php

declare(strict_types=1);

namespace app\lib\actions;

use JetBrains\PhpStorm\NoReturn;

class OptionsAction extends BaseCRUDAction
{

    #[NoReturn] public function run(): void
    {
        http_response_code(200);
        header('Content-Type:' . $this->response->getContentType());
        header("Content-Length: 0");
        exit();
    }
}