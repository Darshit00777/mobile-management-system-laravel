<!DOCTYPE html>
<html>
<head>
    <title>Edit Mobile Model</title>
</head>
<body>

    <h2>Edit Mobile Model</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="/mobile-models/update/{{ $model->id }}" method="POST">
        @csrf

        <label>Select Brand:</label>

        <select name="brand_id" required>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}"
                    {{ $model->brand_id == $brand->id ? 'selected' : '' }}>
                    {{ $brand->brand_name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Model Name:</label>
        <input type="text" name="model_name"
               value="{{ $model->model_name }}" required>

        <br><br>

        <button type="submit">Update Model</button>
    </form>

    <br>
    <a href="/mobile-models">Back to Mobile Models</a>

</body>
</html>
