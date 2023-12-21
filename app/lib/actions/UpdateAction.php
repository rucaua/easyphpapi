<?php

declare(strict_types=1);

namespace app\lib\actions;

use app\lib\core\exceptions\NotFoundException;
use JetBrains\PhpStorm\NoReturn;

class UpdateAction extends BaseCRUDAction
{

    /**
     * @return void
     * @throws NotFoundException
     */
    #[NoReturn] public function run(): void
    {
        $entity = $this->getOneOrError()->fill($this->request);
        if ($entity->validate()) {
            $entity->save();
            header('Content-Type:' . $this->response->getContentType());
            http_response_code(200);
            echo $this->response->makeString($entity->getData());
        } else {
            header('Content-Type:' . $this->response->getContentType());
            http_response_code(400);
            echo $this->response->makeString($entity->getValidationErrors());
        }
        exit();
    }
}