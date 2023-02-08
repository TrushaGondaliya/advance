@extends('layouts.app')

@section('content')
<div class="table table-responsive">
<h4>Your Cart</h4>
<a href="{{route('orders.create')}}" class="btn btn-success mb-3">Start Order</a>

    @if(!isset($carts) || $carts->products->isEmpty())
    <h2>No data found</h2>
    @else
    <h3 class="text-center mt-3 mb-3">Your Cart Total : <strong>${{ $carts->total }}</strong></h3>
    <div class="container row">
    @foreach($carts->products as $product)
    <div class=" col-md-4">
    @include('components.show')
</div>
    @endforeach
</div>
    @endif
</div>
@endsection