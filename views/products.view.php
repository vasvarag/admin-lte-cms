<?php include "./views/partials/header.php"; ?>

<!-- <h3>Homepage</h3> -->

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigacija</li>
        <li class="active menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Proizvodi</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
         <!--  <ul class="treeview-menu">
            <li class="active"><a href="index.php"><i class="fa fa-circle-o"></i> Svi proizvodi</a></li>
            <li class=""><a href="index.php"><i class="fa fa-circle-o"></i> Dodaj proizvod</a></li>
          </ul> -->
        </li>

        <li class=" treeview ">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Blog</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
         <!--  <ul class="treeview-menu">
            <li class=""><a href="index.php"><i class="fa fa-circle-o"></i> Svi blogovi</a></li>
            <li class=""><a href="index.php"><i class="fa fa-circle-o"></i> Nov blog</a></li>
          </ul> -->
        </li>

        <li class=" treeview ">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Kompanija</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
        </li>

        <li class=" treeview ">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Karijera</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          <!-- <ul class="treeview-menu">
            <li class=""><a href="index.php"><i class="fa fa-circle-o"></i> Sve karijere</a></li>
            <li class=""><a href="index.php"><i class="fa fa-circle-o"></i> Nova karijera</a></li>
          </ul> -->
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--     <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> -->


        <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">All Products</h3>

              <div class="box-tools pull-right">
                <button id="modalActivate" type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#addProductModal">
                Dodaj proizvod
              </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Entry</th>
                    <th>Edit</th>
                    <th>Deactivate</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php foreach($data as $key => $value): ?>

                    <?php 

                    $id = $value['id']; 
                    $name = $value['name'];
                    $entry_date = $value['entry_date'];
                    $description = $value['description'];
                    $intro = $value['intro'];
                    $subcategory = $value['subcategory'];
                    $cover_img = $value['cover_img'];
                    $featured_img = $value['featured_img'];
                    $alt_tag = $value['alt_tag'];
                    $isActive = $value['isActive'];

                    $editProduct = new Product($id, $name, $entry_date, $description, $intro, $subcategory, $cover_img, $featured_img, $alt_tag, $isActive);

                     ?>

                    <tr>
                      <td><?php echo $value["id"] ?></td>
                      <td><?php echo $value["name"] ?></td>
                      <td><?php echo $value["entry_date"] ?></td>
                      <!-- <td><a href="/products/<?php echo $value['id'] ?>/edit">Edit</a></td> -->
                      <td>
                        <!-- Button trigger edit Product modal -->
                        <!-- <button id="modalActivate" data-id="<?php echo $value["id"] ?>" type="button" class="editModalButton btn btn-danger" data-toggle="modal" data-target="#editProductModal">
                          Izmijeni proizvod dugme
                        </button> -->
                        <a 
                          data-id="<?php echo $id; ?>"  
                          data-name="<?php echo $name; ?>"  
                          data-entry_date="<?php echo $entry_date; ?>"  
                          data-description="<?php echo $description; ?>"  
                          data-intro="<?php echo $intro; ?>"  
                          data-subcategory="<?php echo $subcategory; ?>"  
                          data-cover_img="<?php echo $cover_img; ?>"  
                          data-featured_img="<?php echo $featured_img; ?>"  
                          data-alt_tag="<?php echo $alt_tag; ?>"  
                          data-isActive="<?php echo $isActive; ?>"  
                          title="Edit this item" class="editModalButton btn btn-primary" href="#editProductModal" data-toggle="modal">Izmijeni proizvod</a>
                      </td>
                      <td>
                        <form method="POST" action="/products/<?php echo $value['id'];?>">
                          <input name="_method" type="hidden" value="active" >
                          <input name="id" type="hidden" value="<?php echo $value['id'];?>" >
                          <!-- <label for="isActive">isActive</label> -->
                          <!-- <input name="isActive" class="" type="checkbox" <?php echo $editProduct->getIsActive()=="yes" ? "checked" : "" ?> id="isActive"> -->
                          <input class="button-primary" type="submit" value="<?php echo $editProduct->getIsActive()=="yes" ? "Deactivate" : "Activate" ?>">
                        </form>
                      </td>
                      <td>
                        <form method="POST" action="/products/<?php echo $value['id'];?>">
                          <input name="_method" type="hidden" value="delete" >
                          <input name="id" type="hidden" value="<?php echo $value['id'];?>" >
                          <input class="button-primary" type="submit" value="Delete">
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>  

<!--                   <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr> -->

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <!-- Button trigger Add Product modal -->
              <button id="modalActivate" type="button" class="btn btn-danger" data-toggle="modal" data-target="#addProductModal">
                Dodaj proizvod
              </button>
              <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Dodaj proizvod</a> -->
              <!-- <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- Add Product Modal -->
<div class="modal fade right" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/products">
          <div class="form-group">
            <label for="name">Product name</label>
            <input name="name" class="u-full-width" type="text" placeholder="Product name" id="name">
          </div>
          <div class="form-group">
            <label for="description">Product description</label>
            <input name="description" class="u-full-width" type="text" placeholder="Product Description" id="description">
          </div>
          <div class="form-group">
            <label for="intro">Product intro</label>
            <input name="intro" class="u-full-width" type="text" placeholder="Product intro" id="intro">
          </div>
          <div class="form-group">
            <label for="subcategory">Product subcategory</label>
            <input name="subcategory" class="u-full-width" type="text" placeholder="Product subcategory" id="subcategory">
          </div>
          <div class="form-group">
            <label for="cover_img">Product cover_img</label>
            <input name="cover_img" class="u-full-width" type="text" placeholder="Product cover_img" id="cover_img">
          </div>
          <div class="form-group">
            <label for="featured_img">Product featured_img</label>
            <input name="featured_img" class="u-full-width" type="text" placeholder="Product featured_img" id="featured_img">
          </div>
          <div class="form-group">
            <label for="alt_tag">Product alt_tag</label>
            <input name="alt_tag" class="u-full-width" type="text" placeholder="Product alt_tag" id="alt_tag">
          </div>

          <!-- <input class="button-primary" type="submit" value="Create"> -->
          <div class="modal-footer">
            <input class="btn btn-secondary" type="submit" data-dismiss="modal" value="Close">
            <input class="btn btn-primary" type="submit" value="Create">
          </div>
        </form>
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Add Product Modal -->

<!-- Edit Product Modal -->
<div class="modal fade right" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/products/">
          <input name="id" class="u-full-width" type="hidden" value="" id="id">
          <div class="form-group">
            <label for="name">Product name</label>
            <input name="name" class="u-full-width" type="text" value="" id="name">
          </div>
          <div class="form-group">
            <label for="description">Product description</label>
            <input name="description" class="u-full-width" type="text" value="" id="description">
          </div>
          <div class="form-group">
            <label for="intro">Product intro</label>
            <input name="intro" class="u-full-width" type="text" value="" id="intro">
          </div>
          <div class="form-group">
            <label for="subcategory">Product subcategory</label>
            <input name="subcategory" class="u-full-width" type="text" value="" id="subcategory">
          </div>
          <div class="form-group">
            <label for="cover_img">Product cover_img</label>
            <input name="cover_img" class="u-full-width" type="text" value="" id="cover_img">
          </div>
          <div class="form-group">
            <label for="featured_img">Product featured_img</label>
            <input name="featured_img" class="u-full-width" type="text" value="" id="featured_img">
          </div>
          <div class="form-group">
            <label for="alt_tag">Product alt_tag</label>
            <input name="alt_tag" class="u-full-width" type="text" value="" id="alt_tag">
          </div>

    <!-- <input class="button-primary" type="submit" value="Update"> -->

          <div class="modal-footer">
            <input class="btn btn-secondary" type="submit" data-dismiss="modal" value="Close">
            <input class="btn btn-primary" type="submit" value="Update">
          </div>
        </form>
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Edit Product Modal -->









<?php include  "./views/partials/footer.php"; ?>
