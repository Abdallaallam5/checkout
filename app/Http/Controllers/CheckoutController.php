<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    public $stripe;
    public function __construct()
    {
        $this->stripe= new StripeClient(
            config('stripe.api_key.secret')
        );
    }

    public function checkout(Request $request)
    {
        $product = \App\Models\Product::findOrFail($request->product_id);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => 1,
                'image'=>'https://m.media-amazon.com/images/I/61O5U9RQIZL._AC_SX679_.jpg'
            ]],
            'mode' => 'payment',
            'success_url' => route('product.details', ['id' => $product->id]) . '?success=true',
            'cancel_url' => route('product.details', ['id' => $product->id]) . '?success=false',
        ]);

        return redirect($session->url);
    }
    
}
