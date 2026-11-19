<!DOCTYPE html>
<html>
<head>
    <title>Mobile Shopping</title>
</head>
<body>

    <h2>Available Mobiles</h2>

    @if (session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
@endif

    <a href="/cart">View Cart</a>

    @foreach ($mobiles as $mobile)

        <hr>

        <h3>{{ $mobile->brand->brand_name ?? 'Brand' }}
            {{ $mobile->mobileModel->model_name ?? 'Mobile' }}</h3>

        <p>Storage: {{ $mobile->storage }}</p>

        <p>Price: ₹{{ $mobile->price }}</p>

        <p>Stock: {{ $mobile->qty }}</p>

        <form action="/cart/add/{{ $mobile->id }}" method="POST">
            @csrf

            Quantity:
            <input type="number" name="qty" value="1" min="1" required>

            <br/><br/>

            <button type="submit">Add to Cart</button>
        </form>

    @endforeach

    <br>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>
