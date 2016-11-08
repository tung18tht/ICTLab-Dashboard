<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <h1 class="text-center">About ICTLab</h1>
    <?php echo $content ?>
    
    <div class="text-right">
        <?php if($this->ion_auth->is_admin()) {
            echo anchor('information/edit_about', 'Edit');
        } ?>
    </div>
</div>