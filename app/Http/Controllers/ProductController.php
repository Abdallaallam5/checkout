<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class ProductController extends Controller
{
    public function show()
    {
        // $id=1;
        // $product = \App\Models\Product::findOrFail($id);
        return view('index');
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
            ]],
            'mode' => 'payment',
            'success_url' => route('product.details', ['id' => $product->id]) . '?success=true',
            'cancel_url' => route('product.details', ['id' => $product->id]) . '?success=false',
        ]);

        return redirect($session->url);
    }
}

