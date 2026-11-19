<!DOCTYPE html>
<html>
<head>
    <title>Add Mobile Model</title>
</head>
<body>

    <h2>Add Mobile Model</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="/mobile-models/store" method="POST">
        @csrf

        <label>Select Brand:</label>

        <select name="brand_id" required>
            <option value="">Select Brand</option>

            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">
                    {{ $brand->brand_name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Model Name:</label>
        <input type="text" name="model_name"
               value="{{ old('model_name') }}" required>

        <br><br>

        <button type="submit">Save Model</button>
    </form>

    <br>
    <a href="/mobile-models">Back to Mobile Models</a>

</body>
</html>
