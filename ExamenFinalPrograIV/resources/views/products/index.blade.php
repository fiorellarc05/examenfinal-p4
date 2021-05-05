@extends('layouts.app')  
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Products</h2>
                </div>
                <hr>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                </div>
            </div>
        </div>

    <br>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    
        <table class="table table-bordered">
            <tr>
                <th width="40px">id No.</th>
                <th width="150px">Name</th>
                <th width="280px">Description</th>
                <th width="100px">Price ($)</th>
                <th width="100px">Quantity</th>
                <th width="240px">Action</th>
                <th width="150px">Add to Cart</th>
            </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name_Product }}</td>
                        <td>{{ $product->description_Product }}</td>
                        <td>${{ $product->price_Product }}</td>
                        <td>{{ $product->quantity_Product }}</td>
                        <td>
                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
            
                                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                
                                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
      
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
 
                            
  
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{url('showcart')}}" >add to cart</a>
                        </td>
                    </tr>
                @endforeach
        </table>
        {!! $products->links() !!}
    </div>
@endsection