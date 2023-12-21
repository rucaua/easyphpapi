<?php

declare(strict_types=1);

namespace app\lib\actions;

use app\lib\core\exceptions\NotFoundException;
use app\lib\core\interfaces\EntityInterface;
use JetBrains\PhpStorm\NoReturn;

class ReadAction extends BaseCRUDAction
{

    /**
     * @throws NotFoundException
     */
    #[NoReturn] public function run(): void
    {
        if ($this->entityId === null) {
            $this->list();
        } else {
            $this->one();
        }
    }

    #[NoReturn] private function list(): void
    {
        $data = [];
        foreach ($this->entity::all($this->request->getFilterFromQuery()) as $item) {
            if ($item instanceof EntityInterface) {
                $data[] = $item->getData();
            }
        }
        header('Content-Type:' . $this->response->getContentType());
        http_response_code(200);
        echo $this->response->makeString($data);
        exit();
    }


    /**
     * @return void
     * @throws NotFoundException
     */
    #[NoReturn] private function one(): void
    {
        header('Content-Type:' . $this->response->getContentType());
        http_response_code(200);
        echo $this->response->makeString($this->getOneOrError()->getData());
        exit();
    }
}