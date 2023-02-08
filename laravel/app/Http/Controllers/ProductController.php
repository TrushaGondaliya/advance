<?php

namespace App\Http\Controllers;
use App\Models\PanelProduct;
use App\Scopes\AvailableScope;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
       
    }

    function index(){
        $products=PanelProduct::without('images')->get();
        return view('products/index',compact('products'));
    }
    function create(){
        return view('products/create');
    }
    function show(PanelProduct $product){
        return view('products/show')->with(['product'=>$product]);
    }
    function store(ProductRequest $request){
       
           
    $products=PanelProduct::create($request->all());
    session()->flash('success',"New Product with id {$products->id} was created");
    return redirect()->route('products/index');

    }

    function edit(PanelProduct $product)
    {
        
        return view('products/edit')->with([
            'products'=>$product,
        ]);
    }
    function update(ProductRequest $request,PanelProduct $product){
      
        if(request()->stock==0 && request()->status=='available'){
            session()->flash('error','if available must have stock');
      return redirect()->back()->withInput(request()->all());      
  }
  $product->update(request()->all());

        return redirect()->route('products.index')->withSuccess("New Product with id {$product->id} was updated");

    }

    function destroy($product)
    {
        $products=PanelProduct::findOrFail($product);
        $products->delete();
        return redirect()->back();
    }
}
