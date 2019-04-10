<?php

$app = new Router();


$app->get("/", authenticate(), function() {
  View::render("home");
});


$app->get("/login", function() {
  View::render("login");
});


$app->post("/login", function() {
  $user = User::findByEmail($_POST["email"]);
  if(validPassword($_POST["password"])) {
    Session::create($user);
    redirect("/products");
  } else {
    redirect("/login");
  } 
});


$app->get("/logout", function() {
  Session::destroy();
  redirect("/");  
});

// products
$app->get("/products", authenticate(), function($request) {
  $products = Product::findAll();
  View::render("products", $products);
});


$app->get("/products/new", authenticate(), function($request) {
  View::render("product-new");
});


$app->get("/products/:id", authenticate(), function($request) {
  $product = Product::findById($request["params"]["id"]); // ovo nije radiilo
  View::render("product", $product);
});


$app->post("/products", authenticate(), function($request) {
  $product_id = Product::create(
    array(
      "name"        => $_POST["name"],
      "description" => $_POST["description"],
      "intro"       => $_POST["intro"],
      "subcategory" => $_POST["subcategory"],
      "cover_img"   => $_POST["cover_img"],
      "featured_img"=> $_POST["featured_img"],
      "alt_tag"     => $_POST["alt_tag"],
      "entry_date"  => date('Y-m-d')
    )
  );

  redirect("/products/" . $product_id); //nisam napravio da Product::create vraca novi id
});


$app->get("/products/:id/edit", authenticate(), function($request) {
  $product = Product::findById($request["params"]["id"]); // ovo nije radilo

  // $product = Product::findById($request["Array"]["id"]);
  View::render("product-edit", $product);
});


// $app->put("/products/:id/edit", authenticate(), function() {
// $app->put("/products/:id", authenticate(), function() {
$app->post("/products/:id", authenticate(), function() { // POST a ne PUT ! ! ! 
  if ($_POST["_method"] == "delete") {
    $product = Product::deleteById($_POST["id"]);
    redirect("/products");
  } elseif($_POST["_method"] == "active"){
    Product::toogleActive($_POST["id"]);
    redirect("/products"); 
  }
  else{
    // var_dump($_POST);
      $product = Product::updateById($_POST["id"], array(
          "name"        => $_POST["name"],
          "description" => $_POST["description"],
          "intro"       => $_POST["intro"],
          "subcategory" => $_POST["subcategory"],
          "cover_img"   => $_POST["cover_img"],
          "featured_img"=> $_POST["featured_img"],
          "alt_tag"     => $_POST["alt_tag"]
        ));
      // redirect("/products/" . $request["params"]["id"]);
      redirect("/products/" . $_POST["id"]);
  }
});


$app->delete("/products/:id", authenticate(), function() {
  // $product = Product::deleteById();
  // redirect("/products");
});


// $app->get("/api/products", function() {
//   $products = Product::findAll();
//   View::json($products);
// });

// $app->get("/api/products/:id", authenticate() , function($request) {
//   $product = Product::findById($request["params"]["id"]);
//   View::json($product);
// });


    // users

$app->get("/users", authenticate(), function($request) {
  $users = User::findAll();
  View::render("users", $users);
});


$app->get("/users/new", authenticate(), function($request) {
  View::render("user-new");
});

// ovo kad budem pravio da mogu da se edituju korisnici
// $app->get("/users/:id", authenticate(), function($request) {
//   $user = User::findById($request["params"]["id"]);
//   View::render("user", $user);
// });

$app->get("/user/", authenticate(), function($request) {
  $user = User::findById($request["params"]["id"]);
  View::render("user", $user);
});


$app->post("/users", authenticate(), function($request) {
  $user_id = User::create(
    array(
    "firstName" => $_POST['firstName'],
    "lastName" => $_POST['lastName'],
    "jobTitle" => $_POST['jobTitle'],
    "email" => $_POST['email'],
    "password" => $_POST['password'],
    "avatar" => $_POST['avatar'],
    "type" => $_POST['type'],
    "isActive" => $_POST['isActive']    
    )
  );

  redirect("/users/" . $user_id); // user id je za sad prazan
});


$app->get("/users/:id/edit", authenticate(), function($request) {
  $user = User::findById($request["params"]["id"]);
  View::render("user-edit", $user);
});


$app->put("/users/:id/edit", authenticate(), function() {
  $user = User::updateById($request["params"]["id"], array(
    "title" => $_POST["title"],
    "description" => $_POST["description"],
    "price" => (float) $_POST["price"]
  ));

  redirect("/users/" . request["params"]["id"]);
});


$app->delete("/users/:id", authenticate(), function() {
  $user = User::deleteById();
  redirect("/users");
});


// $app->get("/api/users", function() {
//   $users = User::findAll();
//   View::json($users);
// });

// $app->get("/api/users/:id", authenticate() , function($request) {
//   $user = User::findById($request["params"]["id"]);
//   View::json($user);
// });
