<?php

declare(strict_types=1);

namespace app\entities;

use app\lib\orm\CycleORMEntity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity]
class System extends CycleORMEntity
{
    #[Column(type: "primary")]
    protected  int $id;
    #[Column(type: "string")]
    protected  string $name;

    /**
     * @var int a million years
     */
    #[Column(type: "integer")]
    protected int $age;


    public function getData(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'humanReadableAge' => $this->getHumanReadableAge(),
        ];
    }

    public function getHumanReadableAge(): string
    {
        return $this->age / 1000 . ' billion years';
    }
}