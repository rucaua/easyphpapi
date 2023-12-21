<?php

namespace app\lib\actions;

use app\lib\core\interfaces\ActionInterface;

trait ActionConfigTrait
{
    public function getCreateAction(): ActionInterface
    {
        return new CreateAction();
    }

    public function getReadAction(): ActionInterface
    {
        return new ReadAction();
    }

    public function getUpdateAction(): ActionInterface
    {
        return new UpdateAction();
    }

    public function getDeleteAction(): ActionInterface
    {
        return new DeleteAction();
    }


    public function getOptionsAction(): ActionInterface
    {
        return new OptionsAction();
    }

    public function isDebugMode(): bool
    {
        return false;
    }
}