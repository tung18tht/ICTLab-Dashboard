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
    <link rel="stylesheet" href="<?php echo base_url("assets/css/dashboard.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>"/>

    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.1.1.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/bootstrap/js/bootstrap.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/notify.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/script.js"); ?>"></script>

    <style>
        .container:not(:first-child) {
            margin-top: 50px;
        }
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

    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <ul class="nav navbar-nav">
                <li <?php echo ($page_title=='Dashboard') ? 'class="active"' : FALSE ?>><?php echo anchor('dashboard', '<strong>Dashboard</strong>'); ?></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Public Information
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li <?php echo ($page_title=='About') ? 'class="active"' : FALSE ?>><?php echo anchor('information/about', 'About'); ?></li>
                        <li <?php echo ($page_title=='Contact') ? 'class="active"' : FALSE ?>><?php echo anchor('information/contact', 'Contact'); ?></li>
                        <li <?php echo ($page_title=='Research Topics') ? 'class="active"' : FALSE ?>><?php echo anchor('information/research_topic', 'Research Topic'); ?></li>
                        <li <?php echo ($page_title=='SWARMS') ? 'class="active"' : FALSE ?>><?php echo anchor('information/swarms', 'Project SWARMS'); ?></li>
                        <li <?php echo ($page_title=='ARCHIVES') ? 'class="active"' : FALSE ?>><?php echo anchor('information/archives', 'Project ARCHIVES'); ?></li>
                        <?php
                            if (!($this->ion_auth->is_admin())) {
                                echo '<li';
                                echo ($page_title=='News & Events') ? ' class="active"' : FALSE;
                                echo '>' . anchor('news_events', 'News & Events').'</li>';
                            }
                        ?>
                    </ul>
                </li>
                <?php
                    if ($this->ion_auth->is_admin()) {
                        echo '<li';
                        echo ($page_title=='News & Events') ? ' class="active"' : FALSE;
                        echo '>' . anchor('news_events', 'News & Events').'</li>';
                    }
                ?>

                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li <?php echo ($page_title=='SWARMS') ? 'class="active"' : FALSE ?>><?php echo anchor('information/swarms', 'SWARMS'); ?></li>
                        <li <?php echo ($page_title=='ARCHIVES') ? 'class="active"' : FALSE ?>><?php echo anchor('information/archives', 'ARCHIVES'); ?></li>
                    </ul>
                </li> -->

                
                <li <?php echo ($page_title=='Calendar') ? 'class="active"' : FALSE ?>><?php echo anchor('calendar', 'Calendar'); ?></li>
                <li <?php echo ($page_title=='Staffs') ? 'class="active"' : FALSE ?>><?php echo anchor('dashboard/staff', 'Staffs'); ?></li>
                <?php
                    if ($this->ion_auth->is_admin()) {
                        echo '<li';
                        echo ($page_title=='Internal Events') ? ' class="active"' : FALSE;
                        echo '>' . anchor('internal_event', 'Internal Seminars').'</li>';
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Hello, 
                        <?php echo "<strong>" . $user->last_name . "</strong>"; ?>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url("assets/avatar/".$avatar.".png"); ?>" id="navbar-avatar" class="img-thumbnail" alt="avatar">
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong>
                                            <?php echo $user->first_name . " " . $user->last_name; ?>
                                        </strong></p>
                                        <p class="text-left small"><?php echo $user->email; ?></p>
                                        <p class="text-left">
                                            <?php echo anchor('profile', 'Profile', array('class' => 'btn btn-primary btn-block btn-sm'));?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <?php echo anchor('user/logout', 'Logout', array('class' => 'btn btn-danger btn-block'));?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>