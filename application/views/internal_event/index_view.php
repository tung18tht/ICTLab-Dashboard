<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
    <h1 class="text-center">Internal ICTLab events</h1>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#seminar">Seminars</a></li>
        <li><a data-toggle="tab" href="#meeting">Meetings</a></li>
        <li><a data-toggle="tab" href="#discussion">Discussions</a></li>
    </ul>

    <div class="tab-content">
        <div id="seminar" class="tab-pane fade in active">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Name</th>
                    <th class="place">Place</th>
                    <th class="date">Date</th>
                    <th class="time">Start</th>
                    <th class="time">End</th>
                    <th>Action</th>
                </tr>
                <?php foreach($seminars as $seminar){ ?>
                <tr>
                    <td><?php echo $seminar['name']; ?></td>
                    <td class="place"><?php echo $seminar['place']; ?></td>
                    <td class="date"><?php echo $seminar['date']; ?></td>
                    <td class="time"><?php echo $seminar['start_time']; ?></td>
                    <td class="time"><?php echo $seminar['end_time']; ?></td>
                    <td id="table_buttons">
                        <a href="<?php echo base_url("index.php/internal_event/edit_seminar/".$seminar['id']); ?>"
                            class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="<?php echo base_url("index.php/internal_event/delete_seminar/".$seminar['id']); ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"
                            data-toggle="tooltip" title="Delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="6">
                        <a href="<?php echo base_url("index.php/internal_event/add_seminar"); ?>"
                            class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </a>
                    </td>
                </tr>
            </table>
        </div>

        <div id="meeting" class="tab-pane fade">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Name</th>
                    <th class="place">Place</th>
                    <th class="date">Date</th>
                    <th class="time">Start</th>
                    <th class="time">End</th>
                    <th>Action</th>
                </tr>
                <?php foreach($meetings as $meeting){ ?>
                <tr>
                    <td><?php echo $meeting['name']; ?></td>
                    <td class="place"><?php echo $meeting['place']; ?></td>
                    <td class="date"><?php echo $meeting['date']; ?></td>
                    <td><?php echo $meeting['start_time']; ?></td>
                    <td><?php echo $meeting['end_time']; ?></td>
                    <td id="table_buttons">
                        <a href="<?php echo base_url("index.php/internal_event/edit_meeting/".$meeting['id']); ?>"
                            class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="<?php echo base_url("index.php/internal_event/delete_meeting/".$meeting['id']); ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"
                            data-toggle="tooltip" title="Delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="6">
                        <a href="<?php echo base_url("index.php/internal_event/add_meeting"); ?>"
                            class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </a>
                    </td>
                </tr>
            </table>
        </div>

        <div id="discussion" class="tab-pane fade">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Name</th>
                    <th class="place">Place</th>
                    <th class="date">Date</th>
                    <th class="time">Start</th>
                    <th class="time">End</th>
                    <th>Action</th>
                </tr>
                <?php foreach($discussions as $discussion){ ?>
                <tr>
                    <td><?php echo $discussion['name']; ?></td>
                    <td class="place"><?php echo $discussion['place']; ?></td>
                    <td class="date"><?php echo $discussion['date']; ?></td>
                    <td><?php echo $discussion['start_time']; ?></td>
                    <td><?php echo $discussion['end_time']; ?></td>
                    <td id="table_buttons">
                        <a href="<?php echo base_url("index.php/internal_event/edit_discussion/".$discussion['id']); ?>"
                            class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="<?php echo base_url("index.php/internal_event/delete_discussion/".$discussion['id']); ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"
                            data-toggle="tooltip" title="Delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="6">
                        <a href="<?php echo base_url("index.php/internal_event/add_discussion"); ?>"
                            class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>