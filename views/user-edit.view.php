<?php
  include "./views/partials/header.php";
?>

<?php foreach($data as $key => $value):
	  $id = $value['id']; 
    $firstName = $value['firstName'];
    $lastName = $value['lastName'];
    $jobTitle = $value['jobTitle'];
    $email = $value['email'];
    $password = $value['password'];
    $avatar = $value['avatar'];
    $type = $value['type'];
    $isActive = $value['isActive'];

    $editUser = new User($id, $firstName, $lastName, $jobTitle, $email, $password, $avatar, $type, $isActive);

 endforeach; ?>


<!-- OVO NE RADI JER SAM ISKLJUCIO TU RUTU POSTO KAO NE TREBA DA IMA TA MOGUCNOST -->
<!-- TREBA DA PUSTIM U SERVER.PHP I DA TO NAPRAVIM -->


<div class="login-form">
  <h3>Edit User</h3>
<?php echo "id: ".$editUser->getId(); ?>
  <form method="POST" action="/users/<?php echo $editUser->getId(); ?>">

    <input name="id" class="u-full-width" type="hidden" value="<?php $editUser->getId(); ?>" id="id">

    <label for="firstName">First Name</label>
    <input name="firstName" class="u-full-width" type="text" value="<?php echo $editUser->getFirstName(); ?>" id="firstName">

    <label for="lastName">Last Name</label>
    <input name="lastName" class="u-full-width" type="text" value="<?php echo $editUser->getLastName(); ?>" id="lastName">

    <label for="jobTitle">User job Title</label>
    <input name="jobTitle" class="u-full-width" type="text" value="<?php echo $editUser->getJobTitle(); ?>" id="jobTitle">

    <label for="email">User email</label>
    <input name="email" class="u-full-width" type="text" value="<?php echo $editUser->getEmail(); ?>" id="email">

    <label for="password">User password</label>
    <input name="password" class="u-full-width" type="text" value="<?php echo $editUser->getPassword(); ?>" id="password">

    <label for="avatar">User avatar</label>
    <input name="avatar" class="u-full-width" type="text" value="<?php echo $editUser->getAvatar(); ?>" id="avatar">

    <label for="type">User type</label>
    <input name="type" class="u-full-width" type="text" value="<?php echo $editUser->getType(); ?>" id="type">

    <label for="isActive">User isActive</label>
    <!-- <input name="isActive" class="u-full-width" type="text" value="<?php echo $editUser->getIsActive(); ?>" id="isActive"> -->
    <input name="isActive" class="u-full-width" placeholder="isActive" type="checkbox" <?php echo $editUser->getIsActive()=="yes" ? "checked" : "" ?> id="isActive">


    <input class="button-primary" type="submit" value="Update">
  </form>
</div>

<?php
  include  "./views/partials/footer.php";
?>
