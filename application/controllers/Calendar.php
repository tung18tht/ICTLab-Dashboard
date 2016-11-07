<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Calendar extends Auth_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('calendar_model');
    }

    public function index($year = '', $month = '') {
        $this->data['page_title'] = 'Calendar';

        $year = ($year=='') ? date('Y') : $year;
        $month = ($month=='') ? date('m') : $month;

        $prefs = array(
            'start_day' => 'monday',
            'month_type' => 'long',
            'day_type' => 'long',
            'show_next_prev' => TRUE,
            'show_other_days' => TRUE
        );
        $prefs['template'] = '
            {table_open}<table class="calendar">{/table_open}

            {heading_row_start}<tr id="title_row">{/heading_row_start}

            {heading_previous_cell}<th class="text-center"><a href="{previous_url}"><div style="width:100%;height:100%;"><span class="glyphicon glyphicon-chevron-left"></span></div></a></th>{/heading_previous_cell}
            {heading_title_cell}<th class="text-center" colspan="{colspan}">{heading}</th>{/heading_title_cell}
            {heading_next_cell}<th class="text-center"><a href="{next_url}"><div style="width:100%;height:100%;"><span class="glyphicon glyphicon-chevron-right"></span></div></a></th>{/heading_next_cell}

            {week_day_cell}<th class="day_header">{week_day}</th>{/week_day_cell}

            {cal_cell_content}<span class="day_listing">{day}</span>{content}{/cal_cell_content}
            {cal_cell_content_today}<div class="today"><span class="day_listing">{day}</span>{content}</div>{/cal_cell_content_today}

            {cal_cell_no_content}<span class="day_listing">{day}</span>{/cal_cell_no_content}
            {cal_cell_no_content_today}<div class="today"><span class="day_listing">{day}</span></div>{/cal_cell_no_content_today}

            {cal_cell_other}<span class="day_listing other">{day}</span>&nbsp;{/cal_cell_other}
        ';
        $this->load->library('calendar', $prefs);

        $data = $this->calendar_model->get_calendar_data($year, $month);

        $this->data['calendar'] =  $this->calendar->generate($year, $month, $data);

        $this->render('calendar/index_view');
    }
}