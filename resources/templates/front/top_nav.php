<div class="top-level-menu">
    <div class="">
        <a class="" href="index.php">IT</a>
    </div>
    <div class="">
        <a class="" href="index.php">My Shop</a>
    </div>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="hamburger-icon">
            <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="text-transform: uppercase;">
                <path d="M0.375 1.46154H11.625" stroke="white" stroke-width="1.2"></path>
                <path d="M0.375 12.5384H11.625" stroke="white" stroke-width="1.2"></path>
                <path d="M0.375 7.00011H11.625" stroke="white" stroke-width="1.2"></path>
            </svg>
        </div>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a href="shop.php">Shop All</a>
            <?php get_categories_menu(); ?>
            <?php 
                if(!isset($_SESSION['email'])){
                    echo "<a href='login.php'>Login</a>";
                } else {
                    echo "<a href='../public/admin/logout.php'>Logout</a>";
                }
            ?>
        </div>
    </div>
</div>
<div class="user-message">
    <?php display_message(); ?>
</div>

<?php
    if(isset($_SESSION['user_id'])){
        $loggedInMenu = <<<DELIMETER
        <div class="lower-level-menu">
            <div class="">
                <a class="" href="admin">Account</a>
            </div>
            <div class="">
                <a class="" href="checkout.php">Cart</a>
            </div>
        </div>
        DELIMETER;
        echo $loggedInMenu;
    } else {
        $login_user = login_user();
        $register_user = register_user();
        $loggedOutMenu = <<<DELIMETER
        <div class="lower-level-menu">
            <div class="">
                <a class="showAccount" href="#">Account</a>
            </div>
            <div class="">
                <a class="" href="checkout.php">Cart</a>
            </div>
        </div>
        <div class="menu-login">
            <header class="login-header">
                <h2 class="">Login</h2>
            </header>
            <div class="login-section">         
                <form class="" action="index.php" method="post" enctype="multipart/form-data">
                    {$login_user}
                    <div class=""><label for="">
                        Email<input type="email" name="email" class="login-input" placeholder="Email address"></label>
                    </div>
                    <div class=""><label for="password">
                        Password<input type="password" name="password" class="login-input" placeholder="Password"></label>
                    </div>
                    <div class="login-submit">
                        <input type="submit" name="submit-login" class="" value="Sign In">
                    </div>
                </form>
            </div>
            <div class="register-form">
                <form role="form" action="index.php" method="post" id="login-form" autocomplete="off">
                {$register_user}
                <div class="">
                    <label for="user_firstname" class="sr-only"></label>
                    First Name<input type="text" name="user_firstname" id="user_firstname" class="login-input" placeholder="First Name">
                </div>
                <div class="">
                    <label for="user_lastname" class="sr-only"></label>
                    Last Name<input type="text" name="user_lastname" id="user_lastname" class="login-input" placeholder="Last Name">
                </div>
                <div class="">
                    <label for="email" class="sr-only"></label>
                    Email<input type="email" name="email" id="email" class="login-input" placeholder="Email address">
                </div>
                <div class="">
                    <label for="password" class="sr-only">Password</label>
                    Password<input type="password" name="password" id="key" class="login-input" placeholder="Password">
                </div>
                    <button type="submit" name="submit-register" id="btn-login" class="register-button" value="Register">Create</button>
                </form>
            </div>
            <div class="menu-register">
                <div class="register-message">
                    <p class="">Not signed in? Click the button below and register.</p>
                </div>
                <div class="register-header">
                    <h2 class="">Register</h2>
                </div>
            </div>
        </div>

        DELIMETER;
        echo $loggedOutMenu;
    }
?>
