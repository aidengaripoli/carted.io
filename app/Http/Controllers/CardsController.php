<?php

namespace App\Http\Controllers;

use Stripe\{Customer};

class CardsController extends Controller
{
    public function index()
    {
        $cards = Customer::retrieve(auth()->user()->stripe_customer_id)
            ->sources
            ->all(['object' => 'card']);

        if (request()->wantsJson()) {
            return $cards->data;
        }

        return view('dashboard.cards', compact('cards'));
    }
}
