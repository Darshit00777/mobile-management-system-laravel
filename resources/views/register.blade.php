
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
<div class="container mt-5">
    <h2>Customer Registration</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="/register" method="POST">
        @csrf

        <label>Name : </label>
        <input type="text" name="name"
               class="form-control mb-3"
               placeholder="Name"
               value="{{ old('name') }}" required>
        <br/><br/>

        <label>Email : </label>
        <input type="email" name="email"
               class="form-control mb-3"
               placeholder="Email"
               value="{{ old('email') }}" required>
        <br/><br/>

        <label>Password : </label>
        <input type="password" name="password"
               class="form-control mb-3"
               placeholder="Password" required>
        <br/><br/>

        <button class="btn btn-primary">Register</button>
        <a href="/login" class="btn btn-secondary">Login</a>
    </form>
</div>
</body>
</html>
