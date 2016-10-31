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
    <?php echo $before_closing_head;?>
</head>
<body>