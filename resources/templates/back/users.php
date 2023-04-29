<div id="page-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="page-header"> Users </h1>
            <h2><?php display_message(); ?></h2>
            <p class="bg-success"></p>
            <a href="index.php?add_user" class="btn btn-primary">Add User</a>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php list_users_admin(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>