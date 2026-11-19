<!DOCTYPE html>
<html>
<head>
    <title>Add Brand</title>
</head>
<body>

    <h2>Add Mobile Brand</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="/brand/store" method="POST">
        @csrf

        <label>Brand Name:</label>
        <input type="text" name="brand_name"
               value="{{ old('brand_name') }}" required>

        <br><br>

        <button type="submit">Save Brand</button>
    </form>

    <br>
    <a href="/brand">Back to Brands</a>

</body>
</html>
