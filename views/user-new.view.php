<?php include "./views/partials/header.php"; ?>

<div class="login-form">
  <h3>New User</h3>

  <form method="POST" action="/users">

    <label for="firstName">First Name</label>
    <input name="firstName" class="u-full-width" placeholder="firstName" type="text" id="firstName">

    <label for="lastName">Last Name</label>
    <input name="lastName" class="u-full-width" placeholder="lastName" type="text" id="lastName">

    <label for="jobTitle">User job Title</label>
    <input name="jobTitle" class="u-full-width" placeholder="jobTitle" type="text" id="jobTitle">

    <label for="email">User email</label>
    <input name="email" class="u-full-width" placeholder="email" type="text" id="email">

    <label for="password">User password</label>
    <input name="password" class="u-full-width" placeholder="password" type="text" id="password">

    <label for="avatar">User avatar</label>
    <input name="avatar" class="u-full-width" placeholder="avatar" type="text" id="avatar">

    <label for="type">User type</label>
    <input name="type" class="u-full-width" placeholder="type" type="text" id="type">

    <label for="isActive">User isActive</label>
    <input name="isActive" class="u-full-width" placeholder="isActive" type="checkbox" checked id="isActive">

    <input class="button-primary" type="submit" value="Create">
  </form>
</div>

<?php include  "./views/partials/footer.php"; ?>
