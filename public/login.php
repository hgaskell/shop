<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <div class="container login-page">
        <h1 class="text-center heading">Login</h1>
        <h2 class="text-center"><?php display_message(); ?></h2>
        <div class="">         
            <form class="login-form" action="" method="post" enctype="multipart/form-data">
                <?php login_user(); ?>
                <div class="form-group"><label for="">
                    Email<input type="email" name="email" class=""></label>
                </div>
                <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class=""></label>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit-login" class="btn login-btn" >
                </div>
            </form>
        </div>  
    </div>
</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>