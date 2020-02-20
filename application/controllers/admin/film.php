<?php
class Film extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data['title'] = "Films";
        $data['main'] = 'admin_film';
        $data['films'] = $this->mFilm->getAllFilms();
        $this->load->vars($data);
        $this->load->view('dashboard');
    }
}
?>