<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <div id="addbox" class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Add new seminar</div>
            </div>
            <div class="panel-body" >
                <form class="form-horizontal" method="post" accept-charset="utf-8"
                    action="<?php echo base_url("index.php/internal_event/add_seminar/"); ?>">
                    <?php
                        if (form_error('name')!='') {
                            echo '<div class="col-md-12 alert alert-danger">
                                      <div class="col-md-2 text-center"><strong>Errors:</strong></div>
                                      <div class="col-md-10"><ul>';
                            echo (form_error('name')!='') ? '<li>'.form_error('name').'</li>' : FALSE;
                            echo (form_error('place')!='') ? '<li>'.form_error('place').'</li>' : FALSE;
                            echo (form_error('date')!='') ? '<li>'.form_error('date').'</li>' : FALSE;
                            echo (form_error('start_time')!='') ? '<li>'.form_error('start_time').'</li>' : FALSE;
                            echo (form_error('end_time')!='') ? '<li>'.form_error('end_time').'</li>' : FALSE;
                            echo '</ul></div></div>';
                        }
                    ?>

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" placeholder="Seminar name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="place" class="col-md-3 control-label">Place</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="place" placeholder="Seminar place">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date" class="col-md-3 control-label">Date</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="date" placeholder="Seminar date">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="start_time" class="col-md-3 control-label">Start time</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="start_time" placeholder="Seminar start time">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="end_time" class="col-md-3 control-label">End time</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="end_time" placeholder="Seminar end time">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" name="submit" class="col-md-4 btn btn-success" value="Add">
                        </div>
                    </div>
                </form>
                    
                <div id="footeradd">
                    <div class="text-center">
                        Back to the <?php echo anchor('internal_event#seminar', 'Internal event page');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>