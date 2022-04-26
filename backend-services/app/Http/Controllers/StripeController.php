<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Stripe;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        $cart = Cart::with('product')->where(['buyer_id' => session()->get('userId'), 'is_wishlist_product' => 0])->get();
        $products_total_price = 0;
        foreach($cart as $cart_data) {
            $products_total_price += $cart_data->product->price * $cart_data->quantity;
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $response = Stripe\Charge::create ([
                "amount" => $products_total_price*100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "This is test payment",
        ]);

        Cart::where(['buyer_id' => session()->get('userId'), 'is_wishlist_product' => 0])->delete();

        return redirect()->route('payment-success');
    }

    public function paymentSuccess()
    {
        return view('frontend.payment.success');
    }

    public function stripeConnect() {				
		
		Stripe\Stripe::setApiKey('sk_test_51HRaITDk8wDRTEN1bWNBMrrV8cqZjgtnmAXFnaCXpkSRI8jEZmAy7nAv4iHztBVjoJquOo9t34FL2RpMw5EMDJMO00cweYodh8');				
		$account = Stripe\Account::create([
			'country' => 'US',
			'type' => 'express',
			'capabilities' => [
				'transfers' => [
				  'requested' => true,
				],
			],
			'tos_acceptance' => [
				'service_agreement' => 'recipient',
			],
		]);		

		
		$stripe_connect = new StripeConnect();				
		$stripe_connect->insert(['user_id' => session()->get('userId'),'account_id' => $account->id,]);


	
		$account_links = \Stripe\AccountLink::create([		  
			'account' => $account->id,		  
			'refresh_url' => "https://dev-purple.herokuapp.com/",		  
			'return_url' => "https://dev-purple.herokuapp.com/",		  
			'type' => 'account_onboarding',		
		]);	
		
		$stripe_connect = StripeConnect::where(['user_id' => session()->get('userId')])->first();		
		$stripe_connect->account_url = $account_links->url;		
		$stripe_connect->save();						
		
		return Redirect::to($account_links->url);			
	
	}
	
	public function stripeConnectResponse() {			
		
		$stripe_connect = StripeConnect::where(['user_id' => session()->get('userId')])->first();		 		
		
		Stripe\Stripe::setApiKey('sk_test_51HRaITDk8wDRTEN1bWNBMrrV8cqZjgtnmAXFnaCXpkSRI8jEZmAy7nAv4iHztBVjoJquOo9t34FL2RpMw5EMDJMO00cweYodh8');				
		$account = Stripe\Account::retrieve(['id' => $stripe_connect->account_id,]); 
				
		$stripe_connect->charges_enabled = $account->charges_enabled;	
		$stripe_connect->save();				
		
		return redirect()->route('https://dev-purple.herokuapp.com/');	
	}	

}