<?php add_user(); ?>
<div id="page-wrapper">
        <div class="container-fluid">
                <div class="col-md-12">
                        <div class="row">
                                <h1 class="page-header"> Add User </h1>
                                <h2><?php display_message(); ?></h2>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                        <label for="product-price">Username</label>
                                        <input type="text" name="username" class="form-control" size="60">
                                </div>
                                <div class="form-group">
                                        <label for="product-price">Email</label>
                                        <input type="email" name="email" class="form-control" size="60">
                                </div>
                                <div class="form-group">
                                        <label for="product-price">First Name</label>
                                        <input type="text" name="first_name" class="form-control" size="60">
                                </div>
                                <div class="form-group">
                                        <label for="product-price">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" size="60">
                                </div>
                                <div class="form-group">
                                        <label for="product-price">Password</label>
                                        <input type="password" name="password" class="form-control" size="60">
                                </div>
                                <div class="form-group">
                                        <input type="submit" name="add_user" class="btn btn-primary btn-lg" value="Publish">
                                </div>
                        </form>
                </div>
        </div>