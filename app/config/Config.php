<?php

namespace app\config;

use app\entities\Planet;
use app\entities\System;
use rucaua\epa\actions\ActionConfigTrait;
use rucaua\epa\core\interfaces\BaseAppConfigInterface;
use rucaua\epa\core\interfaces\ConnectionInterface;
use app\lib\orm\CycleORM;
use rucaua\epa\request\Request;
use rucaua\epa\request\RequestInterface;
use rucaua\epa\response\JsonResponse;
use rucaua\epa\response\ResponseInterface;


readonly class Config implements BaseAppConfigInterface
{
    use ActionConfigTrait;

    public ConnectionInterface $connection;


    public function __construct(
        public ResponseInterface $response = new JsonResponse(),
        public RequestInterface $request = new Request()
    ) {
        $this->connection = new CycleORM(
            dsn: 'mysql:host=mysql;port=3306;dbname=test',
            user: 'root',
            password: 'root',
            entityDirectory: dirname(__DIR__) . '/entities'
        );
    }

    public function getConnection(): CycleORM
    {
        return $this->connection;
    }

    public function getEntitiesMap(): array
    {
        return [
            'planet' => new Planet(),
            'system' => new System(),
        ];
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getResponse(): JsonResponse
    {
        return $this->response;
    }

    public function isDebugMode(): bool
    {
        return true;
    }
}