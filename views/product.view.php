<?php include "./views/partials/header.php"; ?>

<br />
<h1>product.view.php</h1>
<!-- <?php var_dump($data); ?>
<?php var_dump($_SERVER["REQUEST_METHOD"]); ?> -->

<?php foreach($data as $key => $value): ?>
  <p><?php echo $value["name"] ?></p>
  <p><?php echo $value["description"] ?></p>
  <p><?php echo $value["intro"] ?></p>
  <p><a href="/products/<?php echo $value['id'] ?>/edit">edit</a></p>
  <p><a href="/products/<?php echo $value['id'] ?>">delete</a></p>

<button class="delete_entry" id="product<?php echo $value['id']; ?>	" type="button">Delete</button>



<?php endforeach; ?>

<?php include  "./views/partials/footer.php"; ?>
