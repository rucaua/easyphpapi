<?php

namespace app\lib\core\interfaces;

use app\lib\request\RequestInterface;
use app\lib\response\ResponseInterface;
use JetBrains\PhpStorm\NoReturn;

interface ActionInterface
{
    #[NoReturn] public function run(): void;

    /**
     * Method for passing request data into an action
     * @return $this
     */
    public function setRequest(RequestInterface $request): self;
    public function setResponse(ResponseInterface $response): self;
}