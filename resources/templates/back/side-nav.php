<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a href="index.php?orders"><i class="fa fa-fw fa-wrench"></i>Orders</a>
        </li>
        <?php
            if($_SESSION['user_role'] == 'admin'){
                $links = <<<DELIMETER
                <li>
                    <a href="index.php?reports"><i class="fa fa-fw fa-wrench"></i>Reports</a>
                </li>
                <li>
                    <a href="index.php?products"><i class="fa fa-fw fa-bar-chart-o"></i> View Products</a>
                </li>
                <li>
                    <a href="index.php?add_products"><i class="fa fa-fw fa-table"></i> Add Product</a>
                </li>
                <li>
                    <a href="index.php?categories"><i class="fa fa-fw fa-desktop"></i> Categories</a>
                </li>
                <li>
                    <a href="index.php?users"><i class="fa fa-fw fa-wrench"></i>Users</a>
                </li>
                DELIMETER;
                echo $links;
            }
        ?>
    </ul>
</div>