<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <!-- <?php
    echo isset($_SESSION['auth_message']) ? $_SESSION['auth_message'] : FALSE;
    ?>
    <?php
    echo form_open();
    echo form_label('First name:','first_name').'<br />';
    echo form_error('first_name');
    echo form_input('first_name',set_value('first_name')).'<br />';
    echo form_label('Last name:','last_name').'<br />';
    echo form_error('last_name');
    echo form_input('last_name',set_value('last_name')).'<br />';
    echo form_label('Email:','email').'<br />';
    echo form_error('email');
    echo form_input('email',set_value('email')).'<br />';
    echo form_label('Password:', 'password').'<br />';
    echo form_error('password');
    echo form_password('password').'<br />';
    echo form_label('Confirm password:', 'confirm_password').'<br />';
    echo form_error('confirm_password');
    echo form_password('confirm_password').'<br /><br />';
    echo form_submit('register','Register');
    echo form_close();
    ?> -->

    <div id="signupbox" class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
            </div>  
            <div class="panel-body" >
                <form id="signupform" class="form-horizontal" method="post" accept-charset="utf-8"
                    action="<?php echo base_url("index.php/register"); ?>"
                >
                    
                    <!-- <?php
                        if (form_error('first_name')==='') {
                            echo 'lmao';
                        } else {
                            echo 'lol';
                        }
                        
                        // <div id="signupalert" style="display:none" class="alert alert-danger">
                        //     <p>Error:</p>
                        //     <span></span>
                        // </div>
                    ?> -->
                                
                    <div class="form-group">
                        <label for="first_name" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" placeholder="Password (8~20 characters)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password" class="col-md-3 control-label">Confirm Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Re-enter Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" name="register" class="col-md-4 btn btn-info" value="Register">
                        </div>
                    </div>
                </form>
                    
                <div id="footersignin">
                    <div class="text-center">
                        Already a member? <?php echo anchor('user/login', 'Login here');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>