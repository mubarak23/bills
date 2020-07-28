<?php
namespace App\Actions;


use App\Exceptions\PaymentException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class HttpClientAction
{
    public function execute(string $method, string $url, $body, $headers)
    {
        $client = new Client($headers);
        try{
            $response = $client->request($method, $url, $body);
            return $response->getBody()->getContents();
        }catch (ClientException | ServerException $exception) {
            // Log exception and throw new one
            throw new PaymentException($exception->getMessage());
        }
    }


}