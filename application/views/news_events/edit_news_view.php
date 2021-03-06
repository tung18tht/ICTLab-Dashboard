<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <h1>Edit news</h1>
    <form class="form-horizontal" method="post" accept-charset="utf-8"
        action="<?php echo base_url("index.php/news_events/edit_news/".$news['id']); ?>">
        <?php
            if ((form_error('name')!='') || (form_error('content')!='')) {
                echo '<div class="col-md-12 alert alert-danger">
                          <div class="col-md-2 text-center"><strong>Errors:</strong></div>
                          <div class="col-md-10"><ul>';
                echo (form_error('name')!='') ? '<li>'.form_error('name').'</li>' : FALSE;
                echo (form_error('content')!='') ? '<li>'.form_error('content').'</li>' : FALSE;
                echo '</ul></div></div>';
            }
        ?>

        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Name</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" value="<?php echo $news['name']; ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <textarea rows="22" class="form-control" name="content"><?php echo $news['content'] ?></textarea>
            </div>
        </div>

        <div class="col-md-8 form-group text-right pull-right">
            <input type="submit" name="submit" class="btn btn-primary" value="Save changes">
            <?php echo anchor('news_events', 'Cancel', array('class' => 'btn btn-default')); ?>
        </div>

        <div class="col-md-4 pull-left">
            <?php
                echo anchor('news_events/delete_news/'.$news['id'], 'Delete', array('class' => 'btn btn-danger'));
            ?>
        </div>
    </form>
</div>