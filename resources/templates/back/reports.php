<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <h1 class="page-header"> All Products </h1>
      <h3 class="bg-danger"><?php display_message(); ?></h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Quantity</th>
          </tr>
        </thead>
        <tbody>
          <?php get_all_reports(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>