<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <h1 class="text-center">ICTLab Dashboard</h1>
    <div id="loginbox" class="col-md-6 col-md-offset-3">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div id="forgotpass" class="pull-right"><a href="#">Forgot password?</a></div>
            </div>     

            <div id="loginbody" class="panel-body">
                <form class="form-horizontal" method="post" accept-charset="utf-8"
                    action="<?php echo base_url("index.php/user/login"); ?>">
                    <?php
                        if ((form_error('email')!='') ||
                            (form_error('password')!='')
                        ) {
                            echo '<div class="col-md-12 alert alert-danger">
                                      <div class="col-md-2 text-center"><strong>Errors:</strong></div>
                                      <div class="col-md-10"><ul>';
                            echo (form_error('email')!='') ? '<li>'.form_error('email').'</li>' : FALSE;
                            echo (form_error('password')!='') ? '<li>'.form_error('password').'</li>' : FALSE;
                            echo '</ul></div></div>';
                        }
                    ?>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Email Address">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                        
                    <div class="col-xs-6">
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="remember" checked="checked"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-6">
                        <div class="input-group pull-right">
                            <input type="submit" name="login" class="btn btn-success" value="Login">
                        </div>
                    </div>
                </form>
                    
                <div id="footersignup">
                    <div class="text-center">
                        Don't have an account? <?php echo anchor('register', 'Register here');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>