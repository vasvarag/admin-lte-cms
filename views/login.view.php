<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>App name</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css" type="text/css" />
    <style>
      .login-form {
        width: 300px;
        margin: 0 auto;
        padding: 100px 0;
      }
  
      .container {
        max-width: 960px;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>

    <div class="container">
    <header>
        <nav>
          <?php if(isLoggedIn()): ?>
            <a href="/products/">All Products</a>
            <a href="/products/new">New Product</a>
            <a href="/users/">All Users</a>
            <a href="/users/new">New User</a>
            <a href="/logout">Logout</a>
          <?php endif; ?>
 
          <?php if(!isLoggedIn()): ?>
            <a href="/products">Admin</a>
            <a href="/login">Login</a>
          <?php endif; ?>

        </nav>
    </header>



<div class="login-form">
  <h3>Login</h3>

  <form method="POST" action="/login">
    <label for="email">Your email</label>
    <input name="email" class="u-full-width" type="email" placeholder="test@mailbox.com" id="email">

    <label for="password">Your password</label>
    <input name="password" class="u-full-width" type="password" id="password" placeholder="Password">

    <input class="button-primary" type="submit" value="Login">
  </form>
</div>

</div>
</body>
</html>

