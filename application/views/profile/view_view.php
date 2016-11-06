<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
    <div class="row" style="margin-top: 25px">
        <div class="col-md-4 col-xs-12">
            <div class="text-center">
                <img src="<?php echo base_url("assets/avatar/".$view_avatar.".png"); ?>" id="avatar" class="img-circle img-thumbnail" alt="avatar">
            </div>
        </div>
        <div class="col-md-8 col-xs-12 personal-info">
            <h3>Personal info</h3>
            <hr>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email</label>
                    <div class="col-lg-8">
                        <input readonly class="form-control" value= "<?php echo $view_user['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name</label>
                    <div class="col-lg-8">
                        <input readonly class="form-control" value= "<?php echo $view_user['first_name']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name</label>
                    <div class="col-lg-8">
                        <input readonly class="form-control" value= "<?php echo $view_user['last_name']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Title</label>
                    <div class="col-lg-8">
                        <input readonly class="form-control" value= "<?php echo $view_profile['title']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Position</label>
                    <div class="col-lg-8">
                        <input readonly class="form-control" value= "<?php echo $view_profile['position']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Affiliation</label>
                    <div class="col-lg-8">
                        <input readonly class="form-control" value= "<?php echo $view_profile['affiliation']; ?>">
                    </div>
                </div>
            </form>

            <h3>Publications</h3>
            <hr>
            <table class="table table-striped table-bordered">
                <?php foreach($view_publications as $publication){ ?>
                <tr>
                    <td><?php echo $publication['publication_name']; ?></td>
                </tr>
                <?php } ?>
            </table>

            <h3>Supervised Students</h3>
            <hr>
            <table class="table table-striped table-bordered">
                <?php foreach($view_students as $student){ ?>
                <tr>
                    <td><?php echo $student['student_name']; ?></td>
                </tr>
                <?php } ?>
            </table>

            <h3>Research Projects</h3>
            <hr>
            <table class="table table-striped table-bordered">
                <?php foreach($view_projects as $project){ ?>
                <tr>
                    <td><?php echo $project['project_name']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>