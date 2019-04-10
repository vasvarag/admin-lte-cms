<?php
  include "./views/partials/header.php";
?>

<?php foreach($data as $key => $value):
	$id = $value['id']; 
  	$name  = $value['name'];
    $description  = $value['description'];
    $intro   = $value['intro'];
    $subcategory  = $value['subcategory'];
    $cover_img = $value['cover_img'];
    $featured_img = $value['featured_img'];
    $alt_tag = $value['alt_tag'];
 endforeach; ?>

<div class="login-form">
  <h3>Edit Product</h3>
<?php echo "id:".$id; ?>
  <form method="POST" action="/products/<?php echo $id; ?>">

    <input name="id" class="u-full-width" type="hidden" value="<?php echo $id; ?>" id="id">

    <label for="name">Product name</label>
    <input name="name" class="u-full-width" type="text" value="<?php echo $name; ?>" id="name">

    <label for="description">Product description</label>
    <input name="description" class="u-full-width" type="text" value="<?php echo $description; ?>" id="description">

    <label for="intro">Product intro</label>
    <input name="intro" class="u-full-width" type="text" value="<?php echo $intro; ?>" id="intro">

    <label for="subcategory">Product subcategory</label>
    <input name="subcategory" class="u-full-width" type="text" value="<?php echo $subcategory; ?>" id="subcategory">

    <label for="cover_img">Product cover_img</label>
    <input name="cover_img" class="u-full-width" type="text" value="<?php echo $cover_img; ?>" id="cover_img">

    <label for="featured_img">Product featured_img</label>
    <input name="featured_img" class="u-full-width" type="text" value="<?php echo $featured_img; ?>" id="featured_img">

    <label for="alt_tag">Product alt_tag</label>
    <input name="alt_tag" class="u-full-width" type="text" value="<?php echo $alt_tag; ?>" id="alt_tag">


    <input class="button-primary" type="submit" value="Update">
  </form>
</div>

<?php
  include  "./views/partials/footer.php";
?>
