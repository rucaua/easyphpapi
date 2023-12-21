<?php

declare(strict_types=1);

namespace app\lib\actions;

use app\lib\core\exceptions\NotFoundException;
use JetBrains\PhpStorm\NoReturn;

class DeleteAction extends BaseCRUDAction
{

    /**
     * @return void
     * @throws NotFoundException
     */
    #[NoReturn] public function run(): void
    {
        header('Content-Type:' . $this->response->getContentType());
        if ($this->getOneOrError()->delete()) {
            http_response_code(204);
        } else {
            http_response_code(400);
            header('Content-Type:' . $this->response->getContentType());
            echo $this->response->makeString(['The object cannot be deleted']);
        }
        exit();
    }
}