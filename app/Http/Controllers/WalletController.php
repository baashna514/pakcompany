<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function my_wallet(){
        $wallet = Wallet::with('wallet_transactions')->where('user_id', Auth::user()->id)->first();
        return view('admin.wallet.my-wallet')->with('wallet', $wallet);
    }

    public function deposit_balance(){
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        // dd($wallet);
        return view('admin.wallet.deposit-balance')->with('wallet', $wallet);
    }

    public function add_balance_to_wallet(Request $request){
        // dd($request->all());
        if($request->type == 'jazzcash'){
            $this->validate($request, [
                'amount' => 'required',
                'jazzcash_number' => 'required',
                'cnic_number' => 'required',
            ],
            [
                'amount.required' => 'Deposit amount is required',
                'jazzcash_number.required' => 'Jazzcash number is required',
                'cnic_number.required' => 'CNIC number is required',
            ]
            );
            $wallet = Wallet::find(1);
            $wallet_transaction = new WalletTransaction();
            $wallet_transaction->wallet_id = $wallet->id;
            $wallet_transaction->payment_type = $request->type;
            $wallet_transaction->amount = $request->amount;
            $wallet_transaction->number = $request->jazzcash_number;
            $wallet_transaction->cnic = $request->cnic_number;
            $wallet_transaction->save();

            Wallet::where('id', 1)->update([
                'balance' => $wallet->balance + $request->amount,
            ]);
            $request->session()->flash('alert-success', 'Thank you for your Transaction.');
            return back();
        }
        else{
            if($request->type == 'mastercard'){
                $this->validate($request, [
                    'amount' => 'required',
                    'card_number' => 'required',
                    'exp_month' => 'required',
                    'exp_year' => 'required',
                    'csc' => 'required',
                    'f_name' => 'required',
                    'l_name' => 'required',
                ],
                [
                    'amount.required' => 'Deposit amount is required',
                    'card_number.required' => 'Card number is required',
                    'exp_month.required' => 'Expiry Month is required',
                    'exp_year.required' => 'Expiry Year is required',
                    'csc.required' => 'CSC is required',
                    'f_name.required' => 'First Name is required',
                    'l_name.required' => 'Last Name is required',
                ]
                );
            }
            if($request->type == 'paypal'){
                $this->validate($request, [
                    'amount' => 'required',
                    'card_number' => 'required',
                    'exp_month' => 'required',
                    'exp_year' => 'required',
                    'csc' => 'required',
                    'f_name' => 'required',
                    'l_name' => 'required',
                ],
                [
                    'amount.required' => 'Deposit amount is required',
                    'card_number.required' => 'Card number is required',
                    'exp_month.required' => 'Expiry Month is required',
                    'exp_year.required' => 'Expiry Year is required',
                    'csc.required' => 'CSC is required',
                    'f_name.required' => 'First Name is required',
                    'l_name.required' => 'Last Name is required',
                ]
                );
            }
            if($request->type == 'visa'){
                $this->validate($request, [
                    'amount' => 'required',
                    'card_number' => 'required',
                    'exp_month' => 'required',
                    'exp_year' => 'required',
                    'csc' => 'required',
                    'f_name' => 'required',
                    'l_name' => 'required',
                ],
                [
                    'amount.required' => 'Deposit amount is required',
                    'card_number.required' => 'Card number is required',
                    'exp_month.required' => 'Expiry Month is required',
                    'exp_year.required' => 'Expiry Year is required',
                    'csc.required' => 'CSC is required',
                    'f_name.required' => 'First Name is required',
                    'l_name.required' => 'Last Name is required',
                ]
                );
            }
            
            $wallet = Wallet::find(1);
            $wallet_transaction = new WalletTransaction();
            
        }

    }
}
