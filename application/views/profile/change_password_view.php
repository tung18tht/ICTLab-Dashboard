<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <div id="changepassbox" class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Change password</div>
            </div>  
            <div class="panel-body" >
                <form class="form-horizontal" method="post" accept-charset="utf-8"
                    action="<?php echo base_url("index.php/profile/change_password"); ?>">
                    <?php
                        if ((form_error('old_password')!='') ||
                            (form_error('password')!='') ||
                            (form_error('confirm_password')!='')
                        ) {
                            echo '<div class="col-md-12 alert alert-danger">
                                      <div class="col-md-2 text-center"><strong>Errors:</strong></div>
                                      <div class="col-md-10"><ul>';
                            echo (form_error('old_password')!='') ? '<li>'.form_error('old_password').'</li>' : FALSE;
                            echo (form_error('password')!='') ? '<li>'.form_error('password').'</li>' : FALSE;
                            echo (form_error('confirm_password')!='') ? '<li>'.form_error('confirm_password').'</li>' : FALSE;
                            echo '</ul></div></div>';
                        }
                    ?>

                    <div class="form-group">
                        <label for="old_password" class="col-md-3 control-label">Old Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="old_password" placeholder="Old Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">New Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" placeholder="New Password (8~20 characters)">
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
                            <input type="submit" name="register" class="col-md-4 btn btn-danger" value="Submit">
                        </div>
                    </div>
                </form>
                    
                <div id="footerprofile">
                    <div class="text-center">
                        Back to the <?php echo anchor('profile', 'Profile page');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>