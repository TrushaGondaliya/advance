@extends('layouts.app')

@section('content')

<h4 class="text-center"><strong>Grand Total: </strong>$ {{ $cart->total }}</h4>
<div class="text-center mb-3">
<form class="d-inline" method="post" action="{{route('orders.store')}}">
        @csrf
        <button type="submit" class="btn btn-success">Confirm Order</button>
    </form>
</div>
<table class="table table-striped mt-3">
    
    <thead class="thead-light">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>

        </tr>
    </thead>
    <tbody>
        @foreach($cart->products as $product)
        <tr>
            <td>
            <img src="{{asset($product->images->first()->path)}}" style="height:80px;width:60px" alt="">    
            {{$product->title}}</td>
            <td>${{$product->price}}</td>
            <td>{{$product->pivot->quantity}}</td>
            <td>${{$product->total}}</td>
            
        </tr>
        @endforeach
    </tbody>
    
</table>
</div>
@endsection