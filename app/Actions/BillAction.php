<?php

namespace App\Actions\BillAction;
use App\Actions\HttpClientAction;
use App\Exceptions\InvalidRequestException;
use App\Bill;

class BillAction
{
    public function execute(array $data)
    {
        try {
            return Bill::create($data);
        }catch (\Exception $exception) {
            throw new InvalidRequestException($exception->getMessage());
        }
    }
}
