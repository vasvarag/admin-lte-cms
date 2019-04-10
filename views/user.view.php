<?php include "./views/partials/header.php"; ?>

<?php 
// $email = $_SESSION["user"];

// $currentUser = User::createFromEmail($email);
// if (!$currentUser) {
// 	throw new Exception('Could not find user.');
// }
?>


<h1 style="margin: 50px 0;">User profile: <?php echo $currentUser->getFitstName(); ?></h1>

<hr />


<?php foreach($data as $key => $value): ?>
  <p><?php echo $value["firstName"] ?></p>
  <p><?php echo $value["lastName"] ?></p>
  <p><?php echo $value["jobTitle"] ?></p>
  <p><a href="/users/<?php echo $value['id'] ?>/edit">edit</a></p>
  <p>ovo treda da napravim apreko ajax-a.   <a href="/users/<?php echo $value['id'] ?>">Delete</a></p>
  <form method="POST" action="/users/<?php echo $value['id'];?>">
  	<input name="_method" type="hidden" value="delete" >
  	<input name="id" type="hidden" value="<?php echo $value['id'];?>" >
  	<input class="button-primary" type="submit" value="Delete">
  </form>
  <hr>
<?php endforeach; ?>


<?php include  "./views/partials/footer.php"; ?>
