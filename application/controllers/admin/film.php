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
        if($this->input->post('lngFilmTitleID')){
    
            $this->mFilm->updateFilm();
            redirect('admin/film/','refresh');
        } else {
            $data['title'] = "Edit Film";
            $data['main'] = 'admin_film_edit';
            $data['film'] = $this->mFilm->getFilm($id);
            $data['genres'] = $this->mFilm->getGenres();
            $data['certificates'] = $this->mFilm->getCertificates();
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function create(){
        if($this->input->post('strFilmTitle')){
            $this->mFilm->createFilm();
            redirect('admin/film/','refresh');
        } else {
            $data['title'] = "Add Film";
            $data['main'] = 'admin_film_create';
            $data['genres'] = $this->mFilm->getGenres();
            $data['certificates'] = $this->mFilm->getCertificates();
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function delete($id,$path,$image){
        unlink($path."/".$image);
        $this->db->where('lngFilmTitleID',$id);
        $this->db->delete('tblFilmTitles');
        redirect('admin/film/','refresh');
    }

}
?>