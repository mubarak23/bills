<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller
{
    //



    private function merchantRules()
    {
        return [
            'username' => 'required|unique:bills,username',
            'mobile_number' => 'required',
            'amount_to_bill' => 'required',
        ];
    }


    private function validationMessage()
    {
        return $messages = [
            'required' => 'The :attribute field is required.',
            'username.unique' => 'Already have :attribute registered'
        ];
    }



}
