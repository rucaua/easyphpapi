<?php

declare(strict_types=1);

namespace app\lib\actions;

use JetBrains\PhpStorm\NoReturn;

class CreateAction extends BaseCRUDAction
{

    #[NoReturn] public function run(): void
    {
        $entity = $this->entity->fill($this->request);
        if ($entity->validate()) {
            $entity->save();
            header('Content-Type:' . $this->response->getContentType());
            http_response_code(200);
            echo $this->response->makeString($entity->getData());
        } else {
            header('Content-Type:' . $this->response->getContentType());
            // TODO implement 409 for duplicates
            http_response_code(400);
            echo $this->response->makeString($entity->getValidationErrors());
        }
        exit();
    }
}