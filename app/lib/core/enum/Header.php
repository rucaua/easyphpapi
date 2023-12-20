<?php

namespace app\lib\core\enum;

enum Header:string
{
    case CONTENT_TYPE = 'Content-Type';
    case X_REWRITE_URL = 'X-Rewrite-Url';
}
