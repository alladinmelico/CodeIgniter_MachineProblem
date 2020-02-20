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

    function edit($id=0){
        // if($this->input->post('lngFilmTitleID')){
           
        // } else {
            $data['title'] = "Edit Film";
            $data['main'] = 'admin_create_edit';
            $data['isEdit'] = true;
            $data['film'] = $this->mFilm->getFilm($id);
            $data['genres'] = $this->mFilm->getGenres();
            $data['certificates'] = $this->mFilm->getCertificates();
            $this->load->vars($data);
            $this->load->view('dashboard');
        // }
    }

    function editFilm(){
        $this->mFilm->updateFilm();
        redirect('admin/film/','refresh');
    }

}
?>