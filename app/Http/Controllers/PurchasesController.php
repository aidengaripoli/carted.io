<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Support\Facades\Auth;
use Stripe\{Customer, Charge};

class PurchasesController extends Controller
{
    public function store(Cart $cart)
    {
        $user = Auth::user();

        try {
            if ($user->isStripeCustomer()) {
                $id = $user->stripe_customer_id;
            } else {
                $customer = Customer::create([
                    'email' => $user->email,
                    'source' => request('token')
                ]);
                $id = $customer->id;
                $user->stripe_customer_id = $customer->id;
                $user->save();
            }

            Charge::create([
                'customer' => $id,
                'amount' => $cart->price,
                'currency' => 'aud'
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => $e->getMessage()], 422);
        }

        $user->purchase($cart);

        return [
            'message' => 'success'
        ];
    }
}
