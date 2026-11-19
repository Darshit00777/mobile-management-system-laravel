<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

    <h1>Admin Dashboard</h1>
    <h3>Welcome, Admin!</h3>

    <hr>

    <h2>Manage Shopping System</h2>

    <a href="/brand">Manage Brands</a>
    <br><br>

    <a href="/mobile-models">Manage Mobile Models</a>
    <br><br>

    <a href="/mobiles/manage">Manage Mobile Stock</a>
    <br><br>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>
