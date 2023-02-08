<div class="row">
    <div class="card">


        

        <div id="carousel{{$product->id}}" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($product->images as $image)
                <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                    <img src="{{ $image->path }}" height="300" class="d-block w-100 card-img-top" alt="">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{$product->id}}"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{$product->id}}"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



        <div class="card-body">
            <h4 class="text-end"><strong>${{$product->price}}</strong></h4>
            <h5 class="card-tite">{{$product->title}}</h5>
            <p class="card-text">{{$product->description}}</p>
            <p class="card-text"><strong>{{$product->stock}} left</strong></p>

            @if(isset($carts))
            <p class="card-text">{{$product->pivot->quantity}}<strong>({{$product->total}}) </strong></p>

            <form class="d-inline" method="post"
                action="{{route('products.carts.destroy',['product'=>$product->id,'cart'=>$carts->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @else
            <form class="d-inline" method="post" action="{{route('products.carts.store',['product'=>$product->id])}}">
                @csrf
                <button type="submit" class="btn btn-success">Add to cart</button>
            </form>
            @endif

        </div>

    </div>
</div>