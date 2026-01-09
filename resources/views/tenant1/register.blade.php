<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<style>
    * { box-sizing: border-box; font-family: Arial, sans-serif; }
    body {
        margin: 0; padding: 0;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        display: flex; justify-content: center; align-items: center;
        height: 100vh;
    }
    .container {
        background: #fff; padding: 40px;
        border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        width: 350px; max-width: 90%;
    }
    h2 { text-align: center; color: #333; }
    input { width: 100%; padding: 12px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc; }
    button {
        width: 100%; padding: 12px; margin-top: 10px;
        border: none; border-radius: 5px; background: #2575fc; color: #fff; font-size: 16px; cursor: pointer;
    }
    button:hover { background: #6a11cb; }
    .footer { text-align: center; margin-top: 15px; font-size: 14px; }
    .footer a { color: #2575fc; text-decoration: none; }
    .footer a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div class="container">
    <h2>Register</h2>
   <form action="{{ route('tenant1.register.post') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
</form>

    <div class="footer">
        Already have an account? <a href="{{ route('tenant1.login') }}">Login</a>
    </div>
</div>
</body>
</html>
