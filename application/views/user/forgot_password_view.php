<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <h1 class="text-center">ICTLab Dashboard</h1>
    <div id="forgotpassbox" class="col-md-6 col-md-offset-3">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Forgot Password</div>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 text-center"><p>Please enter your email address so we can send you an email to reset your password.</p></div>
                <form class="form-horizontal" method="post" accept-charset="utf-8"
                    action="<?php echo base_url("index.php/user/forgot_password"); ?>">
                    <?php
                        if ((form_error('email')!='')) {
                            echo '<div class="col-md-12 alert alert-danger">
                                      <div class="col-md-2 text-center"><strong>Errors:</strong></div>
                                      <div class="col-md-10"><ul>';
                            echo (form_error('email')!='') ? '<li>'.form_error('email').'</li>' : FALSE;
                            echo '</ul></div></div>';
                        }
                    ?>
                    <div class="col-xs-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="input-group pull-right">
                            <input type="submit" name="forgot_password" class="btn btn-info" value="Submit">
                        </div>
                    </div>
                </form>
                    
                <div id="footerforgot">
                    <div class="text-center">
                        Back to the <?php echo anchor('user/login', 'Login page');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>