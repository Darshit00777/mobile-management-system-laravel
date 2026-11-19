
<!DOCTYPE html>
<html>
<head>
    <title>Mobile Shopping Bill</title>
</head>
<body>

<h1 align="center">MOBILE SHOP</h1>
<h2 align="center">Purchase Bill</h2>

<p>Bill Date: {{ date('d-m-Y') }}</p>

<hr>

<table border="1" cellpadding="10" width="100%">
    <tr>
        <th>Mobile</th>
        <th>Storage</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>

    @foreach ($purchases as $purchase)
    <tr>
        <td>
            {{ $purchase->mobile->brand->brand_name ?? 'Brand' }}
            {{ $purchase->mobile->mobileModel->model_name ?? 'Mobile' }}
        </td>

        <td>{{ $purchase->mobile->storage }}</td>

        <td>₹{{ $purchase->mobile->price }}</td>

        <td>{{ $purchase->qty }}</td>

        <td>
            ₹{{ $purchase->mobile->price * $purchase->qty }}
        </td>
    </tr>
    @endforeach

    <tr>
        <th colspan="4">Total Amount</th>
        <th>₹{{ $total }}</th>
    </tr>
</table>

<br>

<h3>Thank you for shopping with us!</h3>

<button onclick="window.print()">Print Bill</button>

<br><br>

<a href="/mobiles">Continue Shopping</a>

</body>
</html>
