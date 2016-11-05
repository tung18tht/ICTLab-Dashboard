<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('templates/_parts/auth_master_header_view');

echo $the_view_content;

$this->load->view('templates/_parts/auth_master_footer_view');