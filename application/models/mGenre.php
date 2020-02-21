<?php
class mGenre extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data['title'] = "Manage Genres";
        $data['main'] = 'admin_genre';
        $this->load->var($data);
        $this->load->view('dashboard');
    }

    function getAllGenres(){
        $data = array();
        $Q = $this->db->get('tblFilmGenres');

        if ($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }

        $Q->free_result();
        return $data;
    }

    function getGenre($id){
        $data = array();
        $Genre = array('lngGenreID' => $id);
        $Q = $this->db->get_where('tblFilmGenres',$Genre,1);

        if($Q->num_rows() > 0){
            $data = $Q -> row_array();
        }

        $Q->free_result();
        return $data;
    }


    function updateGenre(){
        $data = array(
           'lngGenreID' => $_POST['lngGenreID'],
           'strGenre' => $_POST['strGenre'],
        );

        $this->db->where('lngGenreID',$_POST['lngGenreID']);
        $this->db->update('tblFilmGenres',$data);
    }

    function createGenre(){
        $data = array(
            'strGenre' => $_POST['strGenre'],
         );
 
         $this->db->insert('tblFilmGenres',$data);
    }
}
?>