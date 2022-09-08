<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\Transaction
     */
    public function create(Request $request)
    {
        // dd($request->toArray());
        //converting to json array
        $data=$request->toArray();
       
        // $data= [
        //     'id' => $request->id,
        //     'user_id' => $this->user_id,
        //     'transaction_amount' => $this->transaction_amount,
        //     'transaction_type' => $this->transaction_type,
        // ];

        Validator::make($data, [

            'transaction_amount' => ['required'],
            'id' => ['required'],
            'transaction_type' => ['required'],

            // 'name' => ['required', 'string', 'max:255'],
            // 'fname' => ['required', 'string', 'max:255'],
            // 'lname' => ['required', 'string', 'max:255'],
            // 'email' => [
            //     'required',
            //     'string',
            //     'email',
            //     'max:255',
            //     Rule::unique(User::class),
            // ],
            // 'password' => $this->passwordRules(),
            // 'phno'=> ['required','max:255'],
        ])->validate();

        return Transaction::create([

            'user_id' => $request->id,
            'transaction_amount' => $request->transaction_amount,
            'transaction_type' => $request->transaction_type
            
        ]);

    }
    public function showHistory(Request $request){
        $data=$request->toArray();
        $tid = $request->id;
        return $history = Transaction::where('user_id',$tid)->orderBy('created_at', 'desc')->get();
        // return test::table("transactions")->where('user_id',$tid)->get();
        // return $histo;
        


    }
}
