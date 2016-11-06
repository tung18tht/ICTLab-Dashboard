<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
    <div class="row" style="margin-top: 25px">
        <div class="col-md-4 col-xs-12">
            <div class="text-center">
                <img src="<?php echo base_url("assets/avatar/".$avatar.".png"); ?>" id="avatar" class="img-circle img-thumbnail" alt="avatar">
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"
                action="<?php echo base_url("index.php/profile/upload_avatar"); ?>">
                <div class="text-center">

                    <input type="file" class="text-center center-block well well-sm" name="avatar"/>

                    <input type="submit" value="Upload" class="btn btn-info"/>
                    <?php echo anchor('profile/change_password', 'Change password', array('class' => 'btn btn-danger')); ?>
                </div>
            </form>
        </div>
        <div class="col-md-8 col-xs-12 personal-info">
            <h3>Personal info</h3>
            <hr>
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

            <h3>Publications</h3>
            <hr>
            <table class="table table-striped table-bordered">
                <?php foreach($publications as $publication){ ?>
                <tr>
                    <td><?php echo $publication['publication_name']; ?></td>
                    <td id="table_buttons">
                        <a href="<?php echo base_url("index.php/profile/edit_publication/".$publication['id']); ?>"
                            class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="<?php echo base_url("index.php/profile/delete_publication/".$publication['id']); ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"
                            data-toggle="tooltip" title="Delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="2">
                        <a href="<?php echo base_url("index.php/profile/add_publication"); ?>"
                            class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </a>
                    </td>
                </tr>
            </table>

            <h3>Supervised Students</h3>
            <hr>
            <table class="table table-striped table-bordered">
                <?php foreach($students as $student){ ?>
                <tr>
                    <td><?php echo $student['student_name']; ?></td>
                    <td id="table_buttons">
                        <a href="<?php echo base_url("index.php/profile/edit_student/".$student['id']); ?>"
                            class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="<?php echo base_url("index.php/profile/delete_student/".$student['id']); ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"
                            data-toggle="tooltip" title="Delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="2">
                        <a href="<?php echo base_url("index.php/profile/add_student"); ?>"
                            class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </a>
                    </td>
                </tr>
            </table>

            <h3>Research Projects</h3>
            <hr>
            <table class="table table-striped table-bordered">
                <?php foreach($projects as $project){ ?>
                <tr>
                    <td><?php echo $project['project_name']; ?></td>
                    <td id="table_buttons">
                        <a href="<?php echo base_url("index.php/profile/edit_project/".$project['id']); ?>"
                            class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="<?php echo base_url("index.php/profile/delete_project/".$project['id']); ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"
                            data-toggle="tooltip" title="Delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="2">
                        <a href="<?php echo base_url("index.php/profile/add_project"); ?>"
                            class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>