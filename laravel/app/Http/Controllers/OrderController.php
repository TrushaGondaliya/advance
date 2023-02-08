<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService=$cartService;
        $this->middleware('auth');
    }

    public function create()
    {
        $cart=$this->cartService->getFromCookie();
        if(!isset($cart) || $cart->products->isEmpty()){
            return redirect()->back()->withErrors('your cart is empty');
        }
        return view('orders.create',compact('cart'));
    }

    public function store(Request $request)
    {

        return DB::transaction(function() use($request){
            $user=$request->user();

            $order=$user->orders()->create([
                'status'=>'pending',
            ]);
    
            $cart=$this->cartService->getFromCookie();
    
            $cartProductQuantity=$cart->products->mapwithKeys(function($product){
                $element[$product->id]=['quantity'=>$product->pivot->quantity];
                return $element;
            });
            $order->products()->attach($cartProductQuantity->toArray());
            return redirect()->route('orders.payments.create',['order'=>$order->id]);
        },5);
       
    }
   
}
