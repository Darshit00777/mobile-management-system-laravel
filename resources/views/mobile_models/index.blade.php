<!DOCTYPE html>
<html>
<head>
    <title>Mobile Models</title>
</head>
<body>

    <h2>Manage Mobile Models</h2>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="/mobile-models/create">Add New Model</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Brand Name</th>
            <th>Model Name</th>
            <th>Action</th>
        </tr>

        @foreach ($models as $model)
        <tr>
            <td>{{ $model->id }}</td>
            <td>{{ $model->brand->brand_name }}</td>
            <td>{{ $model->model_name }}</td>
            <td>
                <a href="/mobile-models/edit/{{ $model->id }}">Edit</a>

                <a href="/mobile-models/delete/{{ $model->id }}"
                   onclick="return confirm('Are you sure?')">
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </table>

    <br>
    <a href="/brands">Manage Brands</a>
    <br><br>
    <a href="/admin/dashboard">Back to Dashboard</a>

</body>
</html>
