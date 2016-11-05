<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
    <div class="row" style="margin-top: 25px">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
                <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Change photo</h6>
                <input type="file" class="text-center center-block well well-sm">
            </div>

            <div class="text-center">
                <?php echo anchor('profile/change_password', 'Change password', array('class' => 'btn btn-danger')); ?>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            <h3>Personal info</h3>
            <form class="form-horizontal" method="post" accept-charset="utf-8"
                action="<?php echo base_url("index.php/profile"); ?>">
                <?php
                    if ((form_error('first_name')!='') ||
                        (form_error('last_name')!='') ||
                        (form_error('title')!='') ||
                        (form_error('position')!='') ||
                        (form_error('affiliation')!='')
                    ) {
                        echo '<div class="col-md-12 alert alert-danger">
                                  <div class="col-md-2 text-center"><strong>Errors:</strong></div>
                                  <div class="col-md-10"><ul>';
                        echo (form_error('first_name')!='') ? '<li>'.form_error('first_name').'</li>' : FALSE;
                        echo (form_error('last_name')!='') ? '<li>'.form_error('last_name').'</li>' : FALSE;
                        echo (form_error('title')!='') ? '<li>'.form_error('title').'</li>' : FALSE;
                        echo (form_error('position')!='') ? '<li>'.form_error('position').'</li>' : FALSE;
                        echo (form_error('affiliation')!='') ? '<li>'.form_error('affiliation').'</li>' : FALSE;
                        echo '</ul></div></div>';
                    }
                ?>
                <div class="form-group">
                    <label for="email" class="col-lg-3 control-label">Email</label>
                    <div class="col-lg-8">
                        <input readonly class="form-control" type="email" name="email"
                            value= "<?php echo $user->email; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="first_name" class="col-lg-3 control-label">First name</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="first_name"
                            value= "<?php echo $user->first_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="last_name" class="col-lg-3 control-label">Last name</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="last_name"
                            value= "<?php echo $user->last_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-lg-3 control-label">Title</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="title"
                            value= "<?php echo $profile['title']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="position" class="col-lg-3 control-label">Position</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="position"
                            value= "<?php echo $profile['position']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="affiliation" class="col-lg-3 control-label">Affiliation</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="affiliation"
                            value= "<?php echo $profile['affiliation']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-8">
                        <input class="btn btn-primary" value="Save Changes" type="submit">
                        <span></span>
                        <?php echo anchor('dashboard', 'Cancel', array('class' => 'btn btn-default')); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>