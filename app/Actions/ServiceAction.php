<?php
namespace App\Actions\ServiceAction;
use App\Actions\HttpClientAction;
use App\Exceptions\InvalidRequestException;
use App\Bill;

class ServiceAction
{
    public function execute(array $data, HttpClientAction $clientAction, 
    InvalidRequestException $InvalidRequestException )
    {
        $api_url = config('app.api_bank');
        try {
            //comback to token if there is time
            $token = $this->auth_header();
            $payBill = $this->clientAction->execute('POST', $api_url, $data, $token);
        }catch (\Exception $exception) {
            throw new InvalidRequestException($exception->getMessage());
        }
    }

    public function auth_header(HttpClientAction $clientAction, 
    InvalidRequestException $InvalidRequestException){
       //generate token
       $api_url = config('app.api_bank') . "/auth";
       $data = [
           'appname' => $appname = config('app.api_appname'),
           'password' => $password = config('app.api_password')
       ];

       $header = [
        'content-type' => 'application/json', 
        'Accept' => 'applicatipon/json', 
        'charset' => 'utf-8'
       ];   
      try{
        return  $auth_token = $this->clientAction->excute('POST', $api_url, $data, $header);

    }catch (\Exception $exception) {
        throw new InvalidRequestException($exception->getMessage());
    }
     
    }
}
