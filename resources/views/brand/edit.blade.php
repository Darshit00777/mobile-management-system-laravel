<!DOCTYPE html>
<html>
<head>
    <title>Edit Brand</title>
</head>
<body>

    <h2>Edit Mobile Brand</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="/brand/update/{{ $brand->id }}" method="POST">
        @csrf

        <label>Brand Name:</label>
        <input type="text" name="brand_name"
               value="{{ $brand->brand_name }}" required>

        <br><br>

        <button type="submit">Update Brand</button>
    </form>

    <br>
    <a href="/brand">Back to Brands</a>

</body>
</html>