<?php

namespace Fuz\Framework\FileLoader;

use Symfony\Component\Config\Loader\FileLoader;
use Fuz\Framework\StringLoader\JsonStringLoader;

class JsonFileLoader extends FileLoader
{

    public function load($resource, $type = null)
    {
        $stringLoader = new JsonStringLoader();
        return $stringLoader->load(file_get_contents($resource));
    }

    public function supports($resource, $type = null)
    {
        return is_string($resource) && 'json' === pathinfo(
              $resource, PATHINFO_EXTENSION
        );
    }

}