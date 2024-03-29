<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class StripePaymentController extends Controller
{
    public function session(Request $request)
    {
        //$user         = auth()->user();
        $productItems = [];

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        foreach (session('cart') as $id => $details) {

            $product_name = $details['product_name'];
            $total = $details['price'];
            $quantity = $details['quantity'];

            $unit_amount =  $total * 100;

            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency'     => 'USD',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $quantity,
            ];
        }

        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'            => [$productItems],
            'mode'                  => 'payment',
            'allow_promotion_codes' => false,
            'metadata'              => [
                'user_id' => "0001"
            ],
            'customer_email' => "customer@gmail.com", //$user->email,
            'success_url' => route('success'),
            'cancel_url'  => route('cancel'),
        ]);



        return redirect()->away($checkoutSession->url);
    }

    public function success()
    {
        // To remove all session data
        Session::flush();

        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }

    public function cancel()
    {
        return view('cancel');
    }
}
