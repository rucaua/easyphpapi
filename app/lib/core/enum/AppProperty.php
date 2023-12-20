<?php

namespace app\lib\core\enum;

use app\lib\core\App;

enum AppProperty:string
{
    /**
     * @see App::$request
     */
    case REQUEST = 'request';
    case RESPONSE = 'response';
    case ROUTING = 'routing';
    case CONNECTION = 'connection';
}
