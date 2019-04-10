          <?php 

if(isLoggedIn()): 


$email = $_SESSION["user"];
// var_dump($email);
$currentUser = User::createFromEmail($email);
if (!$currentUser) {
  throw new Exception('Could not find user.');
}
endif; ?>


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

