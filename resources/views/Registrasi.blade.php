<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="stylesheet" href="\css\register.css">
</head>
<body>
    <form action="{{ route('register.store') }}" method="POST" class="register_form">
        @csrf
        <h2>SIGN UP</h2>
        <div class="items">

        <label for="username">username</label> 
        <input type="text" name="username" required>
        
        <label for="email">email</label>
        <input type="email" name="email" required>
        
        <label for="password">password</label>
        <input type="password" name="password" required>
        
        <label for="confirm">confirm password</label>
        <input type="password" name="password_confirmation"  required>
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
