<?php

namespace App\Actions;


use App\Exceptions\InvalidRequestException;
use Illuminate\Support\Facades\Validator;

class ValidateAction
{
    public function execute(array $data, array $rules, array $messages)
    {
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()){
            throw new InvalidRequestException(implode(",",$validator->messages()->all()));
        }
    }
}



