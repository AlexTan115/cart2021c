@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>quantity</td>
                    <td>Image</td>
                    <td>Category</td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50" class="img-fluid"></td>
                    <td>{{ $product->catName }}</td>
                    <td><a href="{{route('editProduct',['id'=>$product->id])}}"class="btn btn-warning">edit</a> 
                    <a href="{{ route('deleteProduct',['id'=>$product->id])}}" class="btn btn-danger btn-xs"
                     onClick="return confirm('Are you sure to delete?')">Delete</a>
                     </td>
                @endforeach
            </tbody>
        </table>
      

    </div>
    <div class="col-sm-3"></div>
</div>
@endsection