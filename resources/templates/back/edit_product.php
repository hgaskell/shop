<?php

if(isset($_GET['id'])){

  $query = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
  validateQuery($query);

  while($row = fetch_array($query)){

    $product_image = display_product_image($row['product_image']);

    $product_title       = escape_string($row['product_title']);
    $product_category_id = escape_string($row['product_category_id']);
    $product_description = escape_string($row['product_description']);
    $product_short_desc  = escape_string($row['product_short_desc']);
    $product_price       = escape_string($row['product_price']);
    $product_stock       = escape_string($row['product_stock']);

  }

  update_product();

}

?>
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">
        <h1 class="page-header"> Edit Product </h1>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
          <div class="form-group">
            <label for="product-title">Product Title </label>
            <input type="text" name="product_title" class="form-control" value="<?php echo $product_title; ?>">
          </div>
          <div class="form-group">
            <label for="product-title">Product Description</label>
            <textarea name="product_description" id="" cols="30" rows="10" class="form-control"><?php echo $product_description; ?></textarea>
          </div>
          <div class="form-group">
            <label for="product-title">Product Short Description</label>
            <textarea name="product_short_desc" id="" cols="30" rows="3" class="form-control"><?php echo $product_short_desc; ?></textarea>
          </div>
        </div>
        <aside id="admin_sidebar" class="col-md-4">
          <div class="form-group">
            <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
            <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
          </div>
          <div class="form-group">
            <label for="product-title">Product Category</label>
            <select name="product_category_id" id="" class="form-control">
            <option value="<?php echo $product_category_id; ?>"><?php echo show_product_category($product_category_id); ?></option>
              <?php list_categories(); ?>
            </select>
          </div>
          <div class="form-group row">
            <div class="col-xs-3">
              <label for="product-price">Product Price</label>
              <input type="number" name="product_price" class="form-control" size="60" value="<?php echo $product_price; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="product-title">Stock</label>
            <input class="form-control" type="number" name="product_stock" value="<?php echo $product_stock; ?>">
          </div>
          <!-- <div class="form-group">
            <label for="product-title">Product Keywords</label>
            <hr>
            <input type="text" name="product_tags" class="form-control">
          </div> -->
          <div class="form-group">
            <label for="product-title">Product Image</label>
            <input type="file" name="file"><br>
            <img src="../../resources/<?php echo $product_image; ?>" alt="" width="200">
          </div>
        </aside>
      </form>
    </div>
  </div>