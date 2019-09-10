<?php

namespace Paylot;

use Paylot\Exceptions\PaylotException;
use Paylot\Helpers\Router;

class Paylot
{
    private $secretKey;

    public function __construct($secretKey)
    {
        if (is_null($secretKey))
            throw new PaylotException('No secret key provided');
        
        $this->secretKey = $secretKey;
    }

    public function __get($name)
    {
        return Router::getRoute($name, $this->secretKey);
    }
}
