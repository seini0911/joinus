<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class MobileBookServiceController extends Controller
{

    public function createTransaction(Request $request){

        //validate fields send through the request
        $attributes = $request->validate([
            'name'=> 'required|string',
            'reference'=>'required|string',
            'service_id'=>'required|integer',
            'sprovider_id'=>'required|integer',
            'customer_id'=>'required|integer',
        ]);
        $transaction = transaction::create([
            'name'=>$attributes['name'],
            'reference'=>$attributes['reference'],
            'amount'=>$attributes['amount'],
            'sprovider_id'=>$attributes['sprovider_id'],
            'customer_id'=>$attributes['customer_id'],
            
        ]);
    }

    
    //get all booked services from the transaction table
    public function getTransactions()
    {
        return response([
            'transactions'=> transaction::orderBy('created_at','desc')->where('status',1)->get(),
        ],200);
    }

    
    //get details about a transaction
    public function showTransaction($transaction_id)
    {
        //$service  = 
        return response([
            'transaction'=> transaction::where('id',$transaction_id)->get(),
        ],200);
    }

    //Accept a transaction by a service provider


}
