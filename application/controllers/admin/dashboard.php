<?php
class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data['title'] = "Admin Dashboard";
        $data['main'] = 'admin_home';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }
}
?>