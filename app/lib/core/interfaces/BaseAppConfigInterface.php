<?php

namespace app\lib\core\interfaces;


use app\lib\request\RequestInterface;
use app\lib\response\ResponseInterface;

interface BaseAppConfigInterface
{
    public function getRequest(): RequestInterface;

    public function getResponse(): ResponseInterface;

    public function getConnection(): ConnectionInterface;

    public function getEntitiesMap(): array;

    public function getCreateAction(): ActionInterface;

    public function getReadAction(): ActionInterface;

    public function getUpdateAction(): ActionInterface;

    public function getDeleteAction(): ActionInterface;

    public function getOptionsAction(): ActionInterface;

    public function isDebugMode(): bool;
}