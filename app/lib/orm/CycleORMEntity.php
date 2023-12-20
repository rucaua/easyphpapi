<?php

declare(strict_types=1);

namespace app\lib\orm;

use app\lib\core\App;
use app\lib\core\interfaces\EntityInterface;
use app\lib\request\RequestInterface;
use Cycle\ORM\EntityManager;
use Cycle\ORM\RepositoryInterface;

abstract class CycleORMEntity implements EntityInterface
{

    public static function find(): RepositoryInterface
    {
        return App::instance()->connection()->getOrm()->getRepository(static::class);
    }


    public static function one(): ?EntityInterface
    {
        return static::find()->findOne();
    }


    public static function oneByPk(int $id): ?EntityInterface
    {
        return static::find()->findByPK($id);
    }


    /**
     * @return EntityInterface[]
     */
    public static function all(array $filters = null): array
    {
        $query = static::find()->select();
        foreach ($filters as $filter) {
            if ($filter[0] === 'or') {
                unset($filter[0]);
                $query->orWhere($filter);
            } else {
                $query->where($filter);
            }
        }
        $query->fetchAll();
        return $query->fetchAll();
    }


    public function save()
    {
        $manager = new EntityManager(App::instance()->connection()->getOrm());
        $manager->persist($this);
        $manager->run();
    }


    public function fill(RequestInterface $request): EntityInterface
    {
        foreach ($request->getData() as $attribute => $value) {
            $this->$attribute = $value;
        }
        return $this;
    }

    public function validate(): bool
    {
        // TODO: Implement validate() method.
        return true;
    }

    public function getValidationErrors(): array
    {
        // TODO: Implement getValidationErrors() method.
        return [];
    }

    public function delete(): bool
    {
        $manager = new \Cycle\ORM\EntityManager(App::instance()->connection()->getOrm());
        $manager->delete($this);
        return $manager->run()->isSuccess();
    }
}