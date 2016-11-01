<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <?php
    echo isset($_SESSION['auth_message']) ? $_SESSION['auth_message'] : FALSE;
    ?>
    <!-- <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->

    <div id="signupbox" class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
            </div>  
            <div class="panel-body" >
                <form class="form-horizontal" method="post" accept-charset="utf-8"
                    action="<?php echo base_url("index.php/register"); ?>"
                >
                    
                    <?php
                        if ((form_error('first_name')!='') ||
                            (form_error('last_name')!='') ||
                            (form_error('email')!='') ||
                            (form_error('password')!='') ||
                            (form_error('confirm_password')!='')
                        ) {
                            echo '<div class="col-md-12 alert alert-danger">
                                      <div class="col-md-2 text-center"><strong>Errors:</strong></div>
                                      <div class="col-md-10"><ul>';
                            echo (form_error('first_name')!='') ? '<li>'.form_error('first_name').'</li>' : FALSE;
                            echo (form_error('last_name')!='') ? '<li>'.form_error('last_name').'</li>' : FALSE;
                            echo (form_error('email')!='') ? '<li>'.form_error('email').'</li>' : FALSE;
                            echo (form_error('password')!='') ? '<li>'.form_error('password').'</li>' : FALSE;
                            echo (form_error('confirm_password')!='') ? '<li>'.form_error('confirm_password').'</li>' : FALSE;
                            echo '</ul></div></div>';
                        }
                        
                        
                    ?>   
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