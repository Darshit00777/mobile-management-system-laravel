<!DOCTYPE html>
<html>
<head>
    <title>Manage Mobiles</title>
</head>
<body>

    <h2>Manage Mobile Stock</h2>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="/mobiles/create">Add New Mobile</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Storage</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>

        @foreach ($mobiles as $mobile)
        <tr>
            <td>{{ $mobile->id }}</td>
            <td>{{ $mobile->brand->brand_name ?? 'Brand not found' }}</td>
            <td>{{ $mobile->mobileModel->model_name ?? 'Model not found' }}</td>
            <td>{{ $mobile->storage }}</td>
            <td>{{ $mobile->price }}</td>
            <td>{{ $mobile->qty }}</td>

            <td>
                @if ($mobile->photo)
                    <img src="{{ asset('upload/' . $mobile->photo) }}"
                         width="80" alt="Mobile photo">
                @else
                    No photo
                @endif
            </td>

            <td>
                <a href="/mobiles/edit/{{ $mobile->id }}">Edit</a>

                <a href="/mobiles/delete/{{ $mobile->id }}"
                   onclick="return confirm('Are you sure you want to delete this mobile?')">
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </table>

    <br>
    <a href="/brands">Manage Brands</a>
    <br><br>
    <a href="/mobile-models">Manage Mobile Models</a>
    <br><br>
    <a href="/admin/dashboard">Back to Dashboard</a>

</body>
</html>
