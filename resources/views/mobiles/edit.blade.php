<!DOCTYPE html>
<html>
<head>
    <title>Edit Mobile</title>
</head>
<body>

    <h2>Edit Mobile Stock</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="/mobiles/update/{{ $mobile->id }}"
          method="POST" enctype="multipart/form-data">
        @csrf

        <label>Brand:</label>
        <select name="brand_id" required>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}"
                    {{ $mobile->brand_id == $brand->id ? 'selected' : '' }}>
                    {{ $brand->brand_name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Mobile Model:</label>
        <select name="mobile_model_id" required>
            @foreach ($models as $model)
                <option value="{{ $model->id }}"
                    {{ $mobile->mobile_model_id == $model->id ? 'selected' : '' }}>
                    {{ $model->model_name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Storage:</label>
        <select name="storage" required>
            @foreach (['64GB', '128GB', '256GB', '512GB'] as $storage)
                <option value="{{ $storage }}"
                    {{ $mobile->storage == $storage ? 'selected' : '' }}>
                    {{ $storage }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Price:</label>
        <input type="number" name="price" min="0" step="0.01"
               value="{{ $mobile->price }}" required>

        <br><br>

        <label>Quantity:</label>
        <input type="number" name="qty" min="0"
               value="{{ $mobile->qty }}" required>

        <br><br>

        <label>Current Photo:</label><br>

        @if ($mobile->photo)
            <img src="{{ asset('upload/' . $mobile->photo) }}"
                 width="100" alt="Current mobile photo">
        @else
            No photo uploaded
        @endif

        <br><br>

        <label>Choose New Photo (optional):</label>
        <input type="file" name="photo" accept="image/*">

        <br><br>

        <button type="submit">Update Mobile</button>
    </form>

    <br>
    <a href="/mobiles/manage">Back to Mobile Stock</a>

</body>
</html>
