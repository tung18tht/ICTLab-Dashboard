<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
    <div class="col-lg-9 col-lg-offset-1">
        <h3><?php echo $event['topic']; ?></h3>
        <strong>Speaker: </strong><?php echo $event['speaker']; ?><br>
        <strong>Location: </strong><?php echo $event['location']; ?><br>
        <strong>Date: </strong><?php echo $event['date']; ?><br>
        <div><?php echo $event['content']; ?></div>
    
        <div class="text-right">
            <?php if($this->ion_auth->is_admin()) {
                echo anchor('news_events/edit_event/'.$event['id'], 'Edit');
            } ?>
        </div>
    </div>
</div>