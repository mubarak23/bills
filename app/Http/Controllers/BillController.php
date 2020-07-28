<?php

namespace App\Http\Controllers;
use App\Actions\ValidateAction;
use App\Actions\BillAction;
use App\Exceptions\InvalidRequestException;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //


    public function createTransaction(Request $request, 
            ValidateAction $ValidateAction, BillAction $BillAction ){
           $data = $request->all();
           try{
               $this->validateAction->execute($data, $this->billsRules(), $this->validationMessage());
               $bills = $BillAction->execute($data);
               //send request to external api
               return response()->json($bills);
           }catch(InvalidRequestException $exception){
            throw new InvalidRequestException($exception->getMessage());
           }
                

    }



    private function billsRules()
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
