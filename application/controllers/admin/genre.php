<?php
class Genre extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data['title'] = "Genre";
        $data['main'] = 'admin_genre';
        $data['genres'] = $this->mGenre->getAllGenres();
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function edit($id=0){
        if($this->input->post('lngGenreID')){
    
            $this->mGenre->updateGenre();
            redirect('admin/genre/','refresh');
        } else {
            $data['title'] = "Edit Genre";
            $data['main'] = 'admin_genre_edit';
            $data['genre'] = $this->mGenre->getGenre($id);
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function create(){
        if($this->input->post('strGenre')){
            $this->mGenre->createGenre();
            redirect('admin/Genre/','refresh');
        } else {
            $data['title'] = "Add Genre";
            $data['main'] = 'admin_genre_create';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function delete($id){
        $this->db->where('lngGenreID',$id);
        $this->db->delete('tblFilmGenres');
        redirect('admin/Genre/','refresh');
    }
}
?>