<?php

namespace app\lib\core\interfaces;

use app\lib\request\RequestInterface;
use app\lib\response\ResponseInterface;
use JetBrains\PhpStorm\NoReturn;

interface CrudActionInterface extends ActionInterface
{
    public function setEntity(EntityInterface $entity, ?int $id): self;
}