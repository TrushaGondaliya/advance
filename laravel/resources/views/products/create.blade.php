@extends('layouts.app')

@section('content')


    <form action="{{route('products.store')}}" method="post">
        @csrf
        <div class="container">
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-row">
            <label for="description">description</label>
            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
        </div>
        <div class="form-row">
            <label for="price">price</label>
            <input type="number" min="1.00" class="form-control" name="price" value="{{ old('price') }}">
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" min="0" class="form-control" name="stock" value="{{ old('stock') }}">
        </div>
        <div class="form-row">
            <label for="title">Status</label>
            <select name="status" id="" class="form-control">
                <option value="">Select</option>
                <option value="available" {{ old('status')=='available' ? 'selected' : '' }}>available</option>
                <option value="unavailable" {{ old('status')=='unavailable' ? 'selected' : '' }}>unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button class="btn btn-primary btn-lg" type="submit">Create Product </button>
        </div>
</div>
    </form>
@endsection