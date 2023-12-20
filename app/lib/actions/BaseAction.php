<?php

declare(strict_types=1);

namespace app\lib\actions;

use app\lib\core\interfaces\ActionInterface;
use app\lib\request\RequestInterface;
use app\lib\response\ResponseInterface;

abstract class BaseAction implements ActionInterface
{

    public ?ResponseInterface $response = null;
    public ?RequestInterface $request = null;

    public function setRequest(RequestInterface $request): ActionInterface
    {
        $this->request = $request;
        return $this;
    }

    public function setResponse(ResponseInterface $response): ActionInterface
    {
        $this->response = $response;
        return $this;
    }
}