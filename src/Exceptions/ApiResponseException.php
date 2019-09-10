<?php
/**
 * Created by PhpStorm.
 * User: Dozie
 * Date: 9/10/2019
 * Time: 11:22 AM
 */

namespace Paylot\Exceptions;

class ApiResponseException extends PaylotException
{
    private $responseObject;

    public function __construct($message, $responseObject)
    {
        parent::__construct($message);
        $this->responseObject = $responseObject;
    }

    public function getResponseObject()
    {
        return $this->responseObject;
    }
}