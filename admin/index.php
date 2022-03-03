<?php
session_start();
require('../inc/pdo.php');
require('../inc/fonction.php');
require('../inc/request.php');

$errors = array();

include('../inc/header.php'); ?>
    <div class="wrap">
        <h2>Admin Home Page</h2>

<?php include('../inc/footer.php');
