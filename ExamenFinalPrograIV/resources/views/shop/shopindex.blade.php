@include('layouts.header')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <hr>
        </div>
    </div>
</div>

<div class="container products">

    <div class="row">

        @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="card" style="width: 15rem;">
                <img src="images/logo.png" class="card-img-top"  width="300" height="150">
                <div class="card-body px-3">
                    <h5 class="card-title">{{ $product->name_Product }}</h5>
                    <p class="card-text">{{ $product->description_Product }}</p>
                    <p><strong>Price: </strong> $ {{ $product->price_Product }}</p>
                    <p><strong>Quantity: </strong> {{ $product->quantity_Product }}</p>
                    
                    @if ($product->quantity_Product>=1){
                    
                    
                    <a id="btnresult" type="button" class="btn btn-success" href="{{ url('add-to-cart/'.$product->id) }}"  class=" btn-block text-center" role="button">Add to cart</a>
                    
                    }
                    @else{
                    
                    function function_alert($message) {

                        // Display the alert box  
                        echo "<script>alert('$message');</script>";
                    }
                    function_alert("not enough");
                    
                    }
                    @endif
                    <a class="btn btn-warning" href="{{ url('add-to-cart2/'.$product->id) }}"  class=" btn-block text-center" role="button">Add to wishlist</a>
                </div>
            </div>
            <br>
        </div>
        @endforeach

    </div>

</div>