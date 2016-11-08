<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <h1 class="text-center">Research Topics</h1>
    <?php echo $content ?>
    
    <div class="text-right">
        <?php if($this->ion_auth->is_admin()) {
            echo anchor('information/edit_research_topic', 'Edit');
        } ?>
    </div>
</div>