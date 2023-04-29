<?php add_category(); ?>

<div id="page-wrapper">
          <div class="container-fluid">
            <h1 class="page-header"> Product Categories </h1>
            <h2><?php display_message(); ?></h2>
            <div class="col-md-4">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="category-title">Title</label>
                  <input required="required" type="text" class="form-control" name="cat_title">
                </div>
                <div class="form-group">
                  <label for="category-image">Category Image</label>
                  <input type="file" name="file">
                </div>
                <div class="form-group">
                  <input name="add_cat" type="submit" class="btn btn-primary" value="Add Category">
                </div>
              </form>
            </div>
            <div class="col-md-8">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                  </tr>
                </thead>
                <tbody>
                    <?php list_categories_admin(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div> 