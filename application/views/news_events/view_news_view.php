<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
    <div class="col-lg-9 col-lg-offset-1">
        <h3><?php echo $news['name']; ?></h3>
        <em><?php echo $news['time']; ?></em>
        <div><?php echo $news['content']; ?></div>
    
        <div class="text-right">
            <?php if($this->ion_auth->is_admin()) {
                echo anchor('news_events/edit_news/'.$news['id'], 'Edit');
            } ?>
        </div>
    </div>
</div>