<?php
class mFilm extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data['title'] = "Manage Films";
        $data['main'] = 'admin_film';
        $this->load->var($data);
        $this->load->view('dashboard');
    }

    function getAllFilms(){
        $data = array();
        $Q = $this->db->get('viewFilms');

        if ($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }

        $Q->free_result();
        return $data;
    }

    function getFilm($id){
        $data = array();
        $film = array('lngFilmTitleID' => $id);
        $Q = $this->db->get_where('viewFilms',$film,1);

        if($Q->num_rows() > 0){
            $data = $Q -> row_array();
        }

        $Q->free_result();
        return $data;
    }
}
?>