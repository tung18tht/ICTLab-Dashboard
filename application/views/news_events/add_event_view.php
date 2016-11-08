<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <h1>Add event</h1>
    <form class="form-horizontal" method="post" accept-charset="utf-8"
        action="<?php echo base_url("index.php/news_events/add_event"); ?>">
        <?php
            if ((form_error('speaker')!='') ||
                (form_error('topic')!='') ||
                (form_error('location')!='') ||
                (form_error('date')!='') ||
                (form_error('content')!='')) {
                echo '<div class="col-md-12 alert alert-danger">
                          <div class="col-md-2 text-center"><strong>Errors:</strong></div>
                          <div class="col-md-10"><ul>';
                echo (form_error('speaker')!='') ? '<li>'.form_error('speaker').'</li>' : FALSE;
                echo (form_error('topic')!='') ? '<li>'.form_error('topic').'</li>' : FALSE;
                echo (form_error('location')!='') ? '<li>'.form_error('location').'</li>' : FALSE;
                echo (form_error('date')!='') ? '<li>'.form_error('date').'</li>' : FALSE;
                echo (form_error('content')!='') ? '<li>'.form_error('content').'</li>' : FALSE;
                echo '</ul></div></div>';
            }
        ?>

        <div class="form-group">
            <label for="speaker" class="col-md-3 control-label">Speaker</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="speaker">
            </div>
        </div>

        <div class="form-group">
            <label for="topic" class="col-md-3 control-label">Topic</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="topic">
            </div>
        </div>

        <div class="form-group">
            <label for="location" class="col-md-3 control-label">Location</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="location">
            </div>
        </div>

        <div class="form-group">
            <label for="date" class="col-md-3 control-label">Date</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="date">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <textarea rows="15" class="form-control" name="content"></textarea>
            </div>
        </div>

        <div class="col-lg-12 form-group text-right">
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            <?php echo anchor('news_events', 'Cancel', array('class' => 'btn btn-default')); ?>
        </div>
    </form>
</div>