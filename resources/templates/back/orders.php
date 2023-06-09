<?php require_once("../../resources/config.php"); ?>

<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
        All Orders
        </h1>
        <h3 class="bg-danger"><?php display_message(); ?></h3>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Transaction ID</th>
                    <th>Currency</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php display_orders(); ?>
            </tbody>
        </table>
    </div>
</div>
