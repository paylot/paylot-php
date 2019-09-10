<?php
/**
 * Created by PhpStorm.
 * User: Dozie
 * Date: 9/10/2019
 * Time: 11:24 AM
 */

namespace Paylot\Exceptions;


class PaylotException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}