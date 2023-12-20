<?php

declare(strict_types=1);

require __DIR__ . '/../app/vendor/autoload.php';

use app\config\Config;
use app\lib\core\App;



App::instance(new Config())->run();