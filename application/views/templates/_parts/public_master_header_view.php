<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php
        echo 'ICTLab';
        echo ($page_title=='') ? FALSE : (' | ' . $page_title);
    ?></title>

    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>"/>

    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.1.1.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/bootstrap/js/bootstrap.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/notify.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/script.js"); ?>"></script>

    <style>
        .container:not(:last-child) {
            margin-bottom: 50px;
        }
    </style>

    <?php echo $before_closing_head;?>
</head>
<body>
    <?php
        if (isset($_SESSION['auth_message'])) {
            echo '<script type="text/javascript">$.notify("'.$_SESSION['auth_message'].'", "info");</script>';
        }
    ?>