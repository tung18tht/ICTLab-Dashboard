<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
    <h1 class="text-center">News & Events</h1>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#news">News</a></li>
        <li><a data-toggle="tab" href="#events">Events</a></li>
    </ul>

    <div class="tab-content">
        <div id="news" class="tab-pane fade in active">
            <div class="col-lg-9 col-lg-offset-1">
                <?php foreach($news as $new){ ?>
                    <h3><?php echo anchor('news_events/view_news/'.$new['id'], $new['name']); ?></h3>
                    <em class="news_time"><?php echo $new['time']; ?></em>
                    <p><?php echo substr($new['content'], 0, 500); ?> ...</p>
                    <hr>
                <?php } ?>
                <?php 
                    if ($this->ion_auth->is_admin()) {
                        echo '<div class="text-right add_link">';
                        echo '<strong>' . anchor("news_events/add_news", "+ Add News") . '</strong>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>

        <div id="events" class="tab-pane fade">
            <div class="col-lg-9 col-lg-offset-1">
                <?php foreach($events as $event){ ?>
                    <h3><?php echo anchor('news_events/view_event/'.$event['id'], $event['topic']); ?></h3>
                    <strong>Speaker: </strong><?php echo $event['speaker'] ?><br>
                    <strong>Location: </strong><?php echo $event['location'] ?><br>
                    <strong>Date: </strong><?php echo $event['date'] ?>
                    <hr>
                <?php } ?>
                <?php 
                    if ($this->ion_auth->is_admin()) {
                        echo '<div class="text-right add_link">';
                        echo '<strong>' . anchor("news_events/add_event", "+ Add Event") . '</strong>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>