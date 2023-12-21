<?php

declare(strict_types=1);

namespace app\lib\response;

use SimpleXMLElement;

class XmlResponse implements ResponseInterface
{
    public function makeString(array $data): string
    {
        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($data, array ($xml, 'addChild'));
        return $xml->asXML();
    }

    public function getContentType(): string
    {
        return 'application/xml; charset=utf-8';
    }
}