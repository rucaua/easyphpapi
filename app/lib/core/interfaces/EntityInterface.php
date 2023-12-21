<?php

namespace app\lib\core\interfaces;

use app\lib\request\RequestInterface;

interface EntityInterface
{
    public static function oneByPk(int $id): ?EntityInterface;

    /**
     * @param array $filters config for filtering values
     * @return array
     */
    public static function all(array $filters = []): array;

    /**
     * Return attribute => value list
     *
     * @return array
     */
    public function getData(): array;
    public function fill(RequestInterface $request): self;

    public function validate(): bool;

    public function getValidationErrors(): array;


    public function delete(): bool;
}