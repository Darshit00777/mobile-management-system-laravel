<!DOCTYPE html>
<html>
<head>
    <title>Manage Brands</title>
</head>
<body>

    <h2>Manage Mobile Brands</h2>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="/brand/create">Add New Brand</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Brand Name</th>
            <th>Action</th>
        </tr>

        @foreach ($brands as $brand)
        <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->brand_name }}</td>
            <td>
                <a href="/brand/edit/{{ $brand->id }}">Edit</a>

                <a href="/brand/delete/{{ $brand->id }}"
                   onclick="return confirm('Are you sure you want to delete this brand?')">
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </table>

    <br>
    <a href="/admin/dashboard">Back to Dashboard</a>

</body>
</html>
