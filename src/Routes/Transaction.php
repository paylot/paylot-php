<?php
/**
 * Created by PhpStorm.
 * User: Dozie
 * Date: 9/10/2019
 * Time: 10:20 AM
 */

namespace Paylot\Routes;

use GuzzleHttp\Client;
use Paylot\Exceptions\ApiResponseException;
use Paylot\Exceptions\PaylotException;

class Transaction
{
    private $client;

    /**
     * Transaction constructor.
     * @param $secretKey
     */
    public function __construct($secretKey)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.paylot.co/',
            'headers' => ['Authorization' => "Bearer $secretKey"]
        ]);
    }

    public function verify($reference)
    {
        try {
            $response = $this->client->get("transactions/verify/$reference");

            if ($response->getStatusCode() == 200) {
                $body = $response->getBody()->getContents();
                $data = json_decode($body);

                return $data;
            } else {
                throw new ApiResponseException("Could not get transaction data", $response);
            }
        } catch (\Exception $bug) {
            throw new PaylotException($bug->getMessage());
        }
    }
}