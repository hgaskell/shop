<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <h1 class="page-header"> All Products </h1>
      <h3 class="bg-danger"><?php display_message(); ?></h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
          </tr>
        </thead>
        <tbody>
          <?php get_all_products_admin(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>