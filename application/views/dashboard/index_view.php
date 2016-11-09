<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <h1 class="text-center" id="welcome">Welcome to ICTLab Dashboard</h1>
    <div class="row" style="margin-top: 100px;">
        <?php if (!($this->ion_auth->is_admin())) { ?>
            <div class="col-lg-3 col-md-6"></div>
        <?php } ?>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <span style="font-size: 60px; margin-top: 8px;" class="glyphicon glyphicon-user"></span>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">11</div>
                            <div>Members</div>
                        </div>
                    </div>
                </div>
                <a href="http://[::1]/ICTLab/index.php/dashboard/staff">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <?php if ($this->ion_auth->is_admin()) { ?>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <span style="font-size: 60px; margin-top: 8px;" class="glyphicon glyphicon-list-alt"></span>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">3</div>
                                <div>News</div>
                            </div>
                        </div>
                    </div>
                    <a href="http://[::1]/ICTLab/index.php/news_events#news">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <span style="font-size: 60px; margin-top: 8px;" class="glyphicon glyphicon-calendar"></span>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">3</div>
                                <div>Events</div>
                            </div>
                        </div>
                    </div>
                    <a href="http://[::1]/ICTLab/index.php/news_events#events">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <span style="font-size: 60px; margin-top: 8px;" class="glyphicon glyphicon-check"></span>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">1</div>
                            <div>Internal seminars today</div>
                        </div>
                    </div>
                </div>
                <a href="http://[::1]/ICTLab/index.php/calendar">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>