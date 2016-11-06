<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <div class="row">
        <?php foreach($position_groups as $group) { ?>
            <div class="col-lg-12">
                <h2 class="page-header"><?php echo $group['group_name']; ?></h2>
            </div>

            <?php foreach($group['staffs'] as $staff) { ?>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center img-thumbnail" alt="avatar"
                        src="<?php echo base_url("assets/avatar/".$staff['avatar'].".png"); ?>">
                    <h3>
                        <?php echo $staff['first_name'] . " " . $staff['last_name']; ?>
                        <small><?php echo $staff['title'] ?></small>
                    </h3>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>