<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function TransactDetails()
    {

        return view('frontend.transaction.transaction_view');
    } // End Method

    public function TransactComplete(){

        if (Auth::check()) {


            $notification = array(
                'message' => 'Successfull Transaction',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        } else {

            $notification = array(
                'message' => 'Plz Login Your Account First',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }
    }

    public function TransactionUpdate(Request $request){
        
    }

}
