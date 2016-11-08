<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <div class="row">
        <?php foreach($position_groups as $group) { ?>
            <div class="col-xs-12">
                <h2 class="page-header"><?php echo ($group['name']=='') ? 'Others' : $group['name']; ?></h2>
            </div>

            <?php foreach($group['staffs'] as $staff) { ?>
                <div class="col-lg-4 col-sm-6 text-center">
                    <a href="<?php echo base_url("index.php/profile/view/".$staff['user_id']) ?>" id="profile_link">
                        <img class="img-circle img-responsive img-center img-thumbnail" alt="avatar"
                            src="
                            <?php
                                echo base_url("assets/avatar/");
                                echo ($staff['has_avatar']==0) ? 0 : $staff['user_id'];
                                echo ".png";
                            ?>">
                        <h3>
                            <?php echo $staff['first_name'] . " " . $staff['last_name']; ?>
                            <small><?php echo $staff['title'] ?></small>
                        </h3>
                    </a>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <?php if($this->ion_auth->is_admin()) {
        echo '
        <hr>

        <div class="row">
            <div class="col-lg-4 col-sm-6 text-center" id="add_profile_div">
                <a title="Add user" href="' . base_url("index.php/dashboard/add_user") . '" >
                    <div class="img-circle img-responsive img-center img-thumbnail" id="add_profile">
                        <span class="glyphicon glyphicon-plus"></span>
                    </div>
                </a>
            </div>
        </div>
        ';
    } ?>
</div>