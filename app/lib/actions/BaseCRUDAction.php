<?php

declare(strict_types=1);

namespace app\lib\actions;

use app\lib\core\exceptions\NotFoundException;
use app\lib\core\interfaces\ActionInterface;
use app\lib\core\interfaces\CrudActionInterface;
use app\lib\core\interfaces\EntityInterface;

abstract class BaseCRUDAction extends BaseAction implements CrudActionInterface
{

    public ?int $entityId = null;
    public ?EntityInterface $entity = null;

    public function setEntity(EntityInterface $entity, ?int $id): self
    {
        $this->entity = $entity;
        $this->entityId = $id;
        return $this;
    }


    /**
     * @return EntityInterface
     * @throws NotFoundException
     */
    protected function getOneOrError(): EntityInterface
    {
        return $this->entity::oneByPk($this->entityId) ?? throw new NotFoundException();
    }

}