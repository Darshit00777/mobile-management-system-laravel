
<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
</head>
<body>

<h2>My Shopping Cart</h2>

<a href="/mobiles">Continue Shopping</a>

@php $total = 0; @endphp

@if ($purchases->count() > 0)

    @foreach ($purchases as $purchase)
        <hr>

        <h3>
            {{ $purchase->mobile->brand->brand_name ?? 'Brand' }}
            {{ $purchase->mobile->mobileModel->model_name ?? 'Mobile' }}
        </h3>

        <p>Storage: {{ $purchase->mobile->storage }}</p>
        <p>Price: ₹{{ $purchase->mobile->price }}</p>
        <p>Quantity: {{ $purchase->qty }}</p>

        <p>
            Subtotal: ₹{{ $purchase->mobile->price * $purchase->qty }}
        </p>

        @php
            $total += $purchase->mobile->price * $purchase->qty;
        @endphp

        <a href="/cart/remove/{{ $purchase->id }}">Remove</a>
    @endforeach

    <hr>

    <h3>Total Amount: ₹{{ $total }}</h3>

    <a href="/bill">Generate Bill</a>

@else

    <p>Your cart is empty.</p>

@endif

</body>
</html>
