@extends('layouts.app')

@section('content')

    <form action="{{route('products.update',['product'=>$products->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title') ?? $products->title}}" >
        </div>
        <div class="form-row">
            <label for="description">description</label>
            <input type="text" class="form-control" name="description" value="{{old('description') ?? $products->description}}" >
        </div>
        <div class="form-row">
            <label for="price">price</label>
            <input type="number" class="form-control" value="{{old('price') ?? $products->price}}" name="price" >
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" value="{{old('stock') ?? $products->stock}}" >
        </div>
        <div class="form-row">
            <label for="title">Status</label>
            <select name="status" id="" class="form-control">
                
                <option value="available" {{ old('status')=='available' ? 'selected' : ($products->status=='available' ? 'selected' : '') }}>available</option>
                <option value="unavailable" {{old('status')=='unavailable' ? 'selected' :($products->status=='unavailable' ? 'selected' : '')}}>unavailable</option>
               
            </select>
        </div>
        <div class="form-row">
            <button class="btn btn-primary btn-lg" type="submit">Update Product </button>
        </div>
</div>
    </form>
   
@endsection