<!--Checkout page-->
@include('layouts.header')

<div class="container">  
    <div class="main">
        <div class="container">
            <div class="about-section">
                <h1>Checkout</h1>
            </div>

            <hr>

            <div class="about-section">
                <h3>Order summary</h3>
            </div>

            <br>

            <?php $total = 0 ?>

            @if(session('shoppingcart'))
            @foreach(session('shoppingcart') as $id => $details)

            <?php $total += $details['price_Product'] * $details['quantity_Product'] ?>

            <div data-th="Product">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        Product: {{ $details['name_Product'] }} || Price:$ {{ $details['price_Product'] }} || Quantity: {{ $details['quantity_Product'] }}  || Subtotal: ${{ $details['price_Product'] * $details['quantity_Product'] }}
                    </div>
                </div>
                <br>
                @endforeach
                @endif
            </div>

            <strong>Total ${{ $total }}</strong>

            <hr>
            <div class="row">
                <div class="container">
                    <form action="/action_page.php">

                        <!--Billing info--> 
                        <div class="col-50">
                            <h3>Billing & Shipping Address</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="order_name">Name</label>
                                    <input type="name" class="form-control" id="order_name" name="order_name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="order_email">Email</label>
                                    <input type="email" class="form-control" id="order_email" name="order_email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="order_address">Address</label>
                                <input type="text" class="form-control" id="order_address" name="order_address" placeholder="1234 Main St" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="City">City</label>
                                    <input type="text" class="form-control" id="City">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="State">State</label>
                                    <input type="text" class="form-control" id="State">
                                </div>
                            </div>
                        </div>

                        <br>
                        <!--Payment info-->
                        <div class="col-50"><br>
                            <h3>Payment</h3>
                            <hr>
                            <div class="form-group">
                                <label for="cname">Name on card</label>
                                <input type="text" class="form-control" id="cname" placeholder="John More Doe">
                            </div>
                            <div class="form-group">
                                <label for="ccnum">Credit card number</label>
                                <input type="text" class="form-control" id="ccnum" placeholder="1111-2222-3333-4444">
                            </div>                        
                        </div>
                    </form>
                </div>

                <div class="pull-right">
                    <a class="btn btn-success" href="{{ url('thankyou') }}"> Confirm checkout</a>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <br>
    <div class="pull-left">
        <a class="btn btn-success" href="{{ url('/cart') }}"> Back</a>
    </div>
</div>
