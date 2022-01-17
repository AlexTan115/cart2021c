@extends('layout')
@section('content')
<div class="row justify-content-center">
    @if($products)
        @foreach($products as $product)
            <div class="card m-2" class="ml- 5 mt-5 ml-5 p-2" style="width: 20rem;">
                <img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="100%" class="card-image-top">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->price}}</p>
                    <a href="{{ route('productdetail',['id'=>$product->id])}}" target="_blank" class="btn btn-danger">Add to cart</a>
                </div>
            </div>
        @endforeach
        @endif
</div>
<div class="d-flex justify-content-center">
    {!! $products->links() !!}
</div>
@endsection
