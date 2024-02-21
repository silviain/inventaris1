<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Inventaris</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <h1>Register</h1>
<form action="/sesi/create" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" value="{{ Session:: get('name') }}" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" value="{{ Session:: get('email') }}" name="email" class="form-control">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3 d-grid">
        <button name="submit" type="submit" class="btn btn-primary">Register</button>
    </div>
</form>
      </div>
          </div>
</body>

</html>
