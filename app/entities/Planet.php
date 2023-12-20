<?php

declare(strict_types=1);

namespace app\entities;

use app\lib\orm\CycleORMEntity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity]
class Planet extends CycleORMEntity
{
    #[Column(type: "primary")]
    protected  int $id;
    #[Column(type: "string")]
    protected  string $name;

    /**
     * @var string kg x 10 to the power of 25
     */
    #[Column(type: "integer")]
    protected  string $mass;


    public function getData(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mass' => $this->mass,
        ];
    }
}