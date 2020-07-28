<?php
namespace App\Actions\BillAction;

use App\Exceptions\InvalidRequestException;
use App\Bill;

class ServiceAction
{
    public function execute(array $data)
    {
        try {
            return Bill::create($data);
        }catch (\Exception $exception) {
            throw new InvalidRequestException($exception->getMessage());
        }
    }

    public function auth_header($data){
       //generate token
       //collect app and pass from enviromen variable
       //make request
       //convert token to json
       //return

    }
}
