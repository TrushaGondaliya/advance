<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Image;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users=User::factory(10)->create();

        // $orders=Order::factory(5)
        // ->make()
        // ->each(function($order) use ($users){
        //     $order->customer_id=$users->random()->id;
        //     $order->save();

        //     $payment=Payment::factory()->make();
        //     $order->payment()->save($payment);
        // });
        
        $product=Product::factory(10)->create()->each(function($product){
            $product->images()->saveMany(Image::factory(2)->make());
        });

        $user=User ::all()->each(function($user){
            $user->image()->save(Image::factory()->make());
        });
        

        // $products = Product::factory(10)->create();

        // Cart::factory(10)->create()->each(function($cart) use($products){
        //         $cart->products()->attach($products->random(2),['quantity'=>random_int(1,10)]);
            
        // });//many to many add into cart_product

        // $products = Product::factory(5)->create();
  
        //     User::factory(20)->create()
        //     ->each(function($users) use($products){
        //     Order::create([
        //         'customer_id' => $users->id,
        //     ])->each(function($order) use($products){
        //         $order->products()->attach($products->random(2),['quantity'=>random_int(1,10)]);
        //     });
        // });//many to many with foreign key add into order_product
    
}
}
