@extends('layouts.app')

@section('content')
<div class="table table-responsive">
    @if(is_null($products))
    <h2>No data found</h2>
    @else
    <div class="container row">
     
        @foreach($products as $product)
        <div class=" col-md-4">
            @include('components.show')
        </div>
        @endforeach
      
    </div>
    @endif
</div>
@endsection