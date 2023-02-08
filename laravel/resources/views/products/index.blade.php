@extends('layouts.app')

@section('content')
<a href="{{route('products.create')}}" class="btn btn-success mb-3">Create</a>
<div class="table table-responsive">
@empty($products)
    <h2>No data found</h2>
    @else
<table class="table table-striped">
    
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->status}}</td>
            <td>
      
                <a class="btn btn-link" href="{{route('products.edit',['product'=>$product->id])}}">Edit</a>
                <a class="btn btn-link" href="{{route('products.show',['product'=>$product->id])}}">Show</a>
               
                <form method="post" class="d-inline" action="{{route('products.destroy',['product'=>$product->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
</div>
@endsection