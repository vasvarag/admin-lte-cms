<?php include "./views/partials/header.php"; ?>

<h1 style="margin: 50px 0;">All users</h1>

<hr />

<?php 
// $email = $_SESSION["user"];


// $currentUser = User::createFromEmail($email);
// if (!$currentUser) {
// 	throw new Exception('Could not find user.');
// }

?>

<h2>Hello <?php echo $currentUser->getFirstName(); ?></h2> 


<?php foreach($data as $key => $value): 
	// $userId = $value[0];
	// $userFirstName = $value[1];
	// $username = $value[2];
	?>
  <!-- <h3><a href="/users/<?php echo $userId ?>">First Name: <?php echo $userFirstName ?></a></h3> -->

<!--   <p>Id: <?php echo $userId ?></p>
  <p>First Name: <?php echo $userFirstName ?></p>
  <p>Email: <?php echo $username ?></p>
  <hr> -->
<?php endforeach; ?>

<?php foreach($data as $key => $value): ?>
  <p><?php echo $value["firstName"] ?></p>
  <p><?php echo $value["lastName"] ?></p>
  <p><?php echo $value["jobTitle"] ?></p>
  <p><a href="/users/<?php echo $value['id'] ?>/edit">edit</a></p>
  <!-- <p>ovo treda da napravim apreko ajax-a.   <a href="/users/<?php echo $value['id'] ?>">Delete</a></p> -->
  <form method="POST" action="/users/<?php echo $value['id'];?>">
  	<input name="_method" type="hidden" value="delete" >
  	<input name="id" type="hidden" value="<?php echo $value['id'];?>" >
  	<input class="button-primary" type="submit" value="Delete">
  </form>
  <hr>
<?php endforeach; ?>

<?php include  "./views/partials/footer.php"; ?>