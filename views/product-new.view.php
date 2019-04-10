<?php include "./views/partials/header.php"; ?>

<div class="login-form">
  <h3>New Product</h3>

  <form method="POST" action="/products">

    <label for="name">Product name</label>
    <input name="name" class="u-full-width" type="text" placeholder="Product name" id="name">

    <label for="description">Product description</label>
    <input name="description" class="u-full-width" type="text" placeholder="Product Description" id="description">

    <label for="intro">Product intro</label>
    <input name="intro" class="u-full-width" type="text" placeholder="Product intro" id="intro">

    <label for="subcategory">Product subcategory</label>
    <input name="subcategory" class="u-full-width" type="text" placeholder="Product subcategory" id="subcategory">

    <label for="cover_img">Product cover_img</label>
    <input name="cover_img" class="u-full-width" type="text" placeholder="Product cover_img" id="cover_img">

    <label for="featured_img">Product featured_img</label>
    <input name="featured_img" class="u-full-width" type="text" placeholder="Product featured_img" id="featured_img">

    <label for="alt_tag">Product alt_tag</label>
    <input name="alt_tag" class="u-full-width" type="text" placeholder="Product alt_tag" id="alt_tag">

    <input class="button-primary" type="submit" value="Create">
  </form>
</div>

<?php include  "./views/partials/footer.php"; ?>
