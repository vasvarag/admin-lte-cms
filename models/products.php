<?php

class Product {

  function __construct($id, $name, $entry_date, $description, $intro, $subcategory, $cover_img, $featured_img, $alt_tag, $isActive = 1){
    $this->id = $id;
    $this->name = $name;
    $this->entry_date = $entry_date;
    $this->description = $description;
    $this->intro = $intro;
    $this->subcategory = $subcategory;
    $this->cover_img = $cover_img;
    $this->featured_img = $featured_img;
    $this->alt_tag = $alt_tag;
    $this->isActive = $isActive;
  }

  public function getIsActive(){
    return $this->isActive ? 'yes' : 'no';
  }
  public static function setIsActive($arg){
    return ($arg == NULL ) ? 0 : 1;
  }

  public static function toogleActive($id){
    $data = Product::findById($id);

    foreach($data as $key => $value):
      $id = $value['id']; 
      $name = $value['name'];
      $entry_date = $value['entry_date'];
      $description = $value['description'];
      $intro = $value['intro'];
      $subcategory = $value['subcategory'];
      $cover_img = $value['cover_img'];
      $featured_img = $value['featured_img'];
      $alt_tag = $value['alt_tag'];
      $value['isActive'] = ($value['isActive'] == 0 ) ? '1' : 0 ;

      Product::updateById($id, $value);

    endforeach;                  

  }
  public static function create($data) {

    $name  = $data['name'];
    $description  = $data['description'];
    $intro   = $data['intro'];
    $subcategory  = $data['subcategory'];
    $cover_img = $data['cover_img'];
    $featured_img = $data['featured_img'];
    $alt_tag = $data['alt_tag'];
    $entry_date = $data['entry_date'];
    $isActive = Product::setIsActive($data['isActive']);

    $db = connect(); 

    $query = $db->query("INSERT INTO products (name, description, intro, subcategory, cover_img, featured_img, alt_tag, entry_date, isActive) VALUES ('$name', '$description', '$intro', '$subcategory', '$cover_img', '$featured_img', '$alt_tag', '$entry_date', '$isActive') ");
    // return $new_id; // ako ovo napravim onda ce da se otvara stranica dodatog proizvoda a ne stranica sa svim proizvodima
  }

  public static function findAll() {
    $db = connect(); 
    $query = $db->query("SELECT * FROM products");

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($rows) {  // ima usera =>  vracam sve 
          return $rows;
    } else {
        // nema usera vracam null 
        return null;
    }
  }

  public static function findById($id) {
    $db = connect(); 
    $query = $db->query("SELECT * FROM products WHERE id='$id'");

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($rows) {  // ima usera =>  vracam sve 
          return $rows;
    } else {
        // nema usera vracam null 
        return null;
    }
  }

  public static function updateById($id, $data) { 
    $name  = $data['name'];
    $description  = $data['description'];
    $intro   = $data['intro'];
    $subcategory  = $data['subcategory'];
    $cover_img = $data['cover_img'];
    $featured_img = $data['featured_img'];
    $alt_tag = $data['alt_tag'];
    $isActive = Product::setIsActive($data['isActive']);


    // mora da se doda za isActive i gore i dolje

    $db = connect(); 
    $query = $db->query("UPDATE products SET name = '$name' , description = '$description' , intro = '$intro' , subcategory = '$subcategory', cover_img = '$cover_img' , featured_img = '$featured_img' , alt_tag = '$alt_tag', 'isActive' = $isActive  WHERE id='$id'");

    return $id; 
    // return $request["params"]["id"]; 
  }

  public static function deleteById($id) {
    $db = connect(); 
    $query = $db->query("DELETE FROM products WHERE id='$id'");
  }
}
