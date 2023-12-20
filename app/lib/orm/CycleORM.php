<?php

declare(strict_types=1);

namespace app\lib\orm;

use app\lib\core\interfaces\ConnectionInterface;
use Cycle\Annotated;
use Cycle\Database;
use Cycle\Database\Config\MySQL\DsnConnectionConfig;
use Cycle\ORM;
use Cycle\ORM\Schema;
use Cycle\Schema\Compiler;
use Cycle\Schema\Generator\GenerateRelations;
use Cycle\Schema\Generator\GenerateTypecast;
use Cycle\Schema\Generator\RenderRelations;
use Cycle\Schema\Generator\RenderTables;
use Cycle\Schema\Generator\ResetTables;
use Cycle\Schema\Generator\SyncTables;
use Cycle\Schema\Generator\ValidateEntities;
use Cycle\Schema\Registry;
use Spiral\Tokenizer;
use Spiral\Tokenizer\Config\TokenizerConfig;

final class CycleORM implements ConnectionInterface
{

    private Database\DatabaseManager $database;
    private ORM\ORM $orm;

    /**
     * @return ORM\ORM
     */
    public function getOrm(): ORM\ORM
    {
        return $this->orm;
    }

    public function __construct(string $dsn, string $user, string $password, $entityDirectory)
    {

        $dbConfig = new Database\Config\DatabaseConfig([
            'databases' => [
                'default' => ['connection' => 'mysql'],
            ],
            'connections' => [
                'mysql' => new Database\Config\MySQLDriverConfig(
                    connection: new DsnConnectionConfig($dsn, $user, $password),
                ),
            ],
        ]);

        $this->database = new Database\DatabaseManager($dbConfig);

        $cl = (new Tokenizer\Tokenizer(
            new TokenizerConfig([
                'directories' => [$entityDirectory],
            ])
        ))->classLocator();


        $schema = (new Compiler())->compile(new Registry($this->database), [
            //Recognize embeddable entities
            new Annotated\Embeddings($cl),
            // register embeddable entities
            new Annotated\Entities($cl),
            // register annotated entities
            new ResetTables(),
            // re-declared table schemas (remove columns)
            new Annotated\MergeColumns(),
            // copy column declarations from all related classes (@Table annotation)
            new GenerateRelations(),
            // generate entity relations
            new ValidateEntities(),
            // make sure all entity schemas are correct
            new RenderTables(),
            // declare table schemas
            new RenderRelations(),
            // declare relation keys and indexes
            new Annotated\MergeIndexes(),
            // copy index declarations from all related classes (@Table annotation)
            new SyncTables(),
            // sync table changes to database
            new GenerateTypecast(),
            // typecast non string columns
        ]);


        $this->orm = new ORM\ORM(new ORM\Factory($this->database),new Schema($schema));
    }

    public function table($name): Database\TableInterface
    {
        return $this->database->database('default')->table($name);
    }
}