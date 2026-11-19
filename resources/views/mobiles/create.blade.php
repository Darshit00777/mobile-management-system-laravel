<!DOCTYPE html>
<html>
<head>
    <title>Add Mobile</title>
</head>
<body>

    <h2>Add Mobile Stock</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="/mobiles/store" method="POST"
          enctype="multipart/form-data">
        @csrf

        <label>Brand:</label>
        <select name="brand_id" required>
            <option value="">Select Brand</option>

            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">
                    {{ $brand->brand_name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Mobile Model:</label>
        <select name="mobile_model_id" required>
            <option value="">Select Model</option>

            @foreach ($models as $model)
                <option value="{{ $model->id }}">
                    {{ $model->model_name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Storage:</label>
        <select name="storage" required>
            <option value="">Select Storage</option>
            <option value="64GB">64GB</option>
            <option value="128GB">128GB</option>
            <option value="256GB">256GB</option>
            <option value="512GB">512GB</option>
        </select>

        <br><br>

        <label>Price:</label>
        <input type="number" name="price" min="0" step="0.01"
               value="{{ old('price') }}" required>

        <br><br>

        <label>Quantity:</label>
        <input type="number" name="qty" min="0"
               value="{{ old('qty', 0) }}" required>

        <br><br>

        <label>Photo:</label>
        <input type="file" name="photo" accept="image/*">

        <br><br>

        <button type="submit">Save Mobile</button>
    </form>

    <br>
    <a href="/mobiles/manage">Back to Mobile Stock</a>

</body>
</html>
