<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Calendar extends Auth_Controller {
    public function index() {
        $this->data['page_title'] = 'Calendar';

        $prefs['day_type'] = 'long'; 
        $prefs['template'] = '
            {table_open}<table class="calendar">{/table_open}
            {week_day_cell}<th class="day_header">{week_day}</th>{/week_day_cell}
            {cal_cell_content}<span class="day_listing">{day}</span>&nbsp;&bull; {content}&nbsp;{/cal_cell_content}
            {cal_cell_content_today}<div class="today"><span class="day_listing">{day}</span>&bull; {content}</div>{/cal_cell_content_today}
            {cal_cell_no_content}<span class="day_listing">{day}</span>&nbsp;{/cal_cell_no_content}
            {cal_cell_no_content_today}<div class="today"><span class="day_listing">{day}</span></div>{/cal_cell_no_content_today}
        ';
        $this->load->library('calendar', $prefs);

        $data = array(
                3  => 'Draft Robot Plans',
                7  => 'Delivery of Robot Parts',
                13 => 'Construction Finished',
                26 => 'Kill All Humans!'
        );

        $this->data['calendar'] =  $this->calendar->generate('', '', $data);

        $this->render('calendar/index_view');
    }
}