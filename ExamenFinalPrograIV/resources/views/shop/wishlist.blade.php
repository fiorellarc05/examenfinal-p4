@include ('layouts.header')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>

        <?php $total = 0 ?>

        @if(session('wishlist'))
        @foreach(session('wishlist') as $id => $details)

        <?php $total += $details['price_Product'] * $details['quantity_Product'] ?>

        <tr>
            <td data-th="Product">
                <div class="row">

                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $details['name_Product'] }}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">${{ $details['price_Product'] }}</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['quantity_Product'] }}" class="form-control quantity" />
            </td>
            <td data-th="Subtotal" class="text-center">
                ${{ $details['price_Product'] * $details['quantity_Product'] }}</td>
            <td class="actions">
                <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">Refresh</button>
                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">Delete</button>
            </td>
        </tr>
        @endforeach
        @endif

    </tbody>
    <tfoot>
        <tr>
            <td><a href="{{ url('shop') }}" class="btn btn-success">Continue Shopping</a></td>

            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        <td>
            <a href="{{ url('/cart') }}" class="btn btn-primary">Go to Shopping Cart</a>
        </td>
    </tfoot>
</table>

<script type="text/javascript">

    $(".update-cart").click(function (e) {
    e.preventDefault();
    var ele = $(this);
    $.ajax({
    url: '{{ url('updateWishlist-cart2') }}',
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity_Products: ele.parents("tr").find(".quantity_Products").val()},
            success: function (response) {
            window.location.reload();
            }
    });
    });
    $(".remove-from-cart").click(function (e) {
    e.preventDefault();
    var ele = $(this);
    if (confirm("Are you sure")) {
    $.ajax({
    url: '{{ url('removeWishlist-from-cart2') }}',
            method: "DELETE",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
            success: function (response) {
            window.location.reload();
            }
    });
    }
    });

</script>