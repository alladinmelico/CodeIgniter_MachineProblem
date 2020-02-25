<?php
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION)){
            session_start();
        }
    }

    function index(){
        $data['title'] = "Login";
        $this->load->vars($data);
        $this->load->view('login');
    }

    function edit($id=0){
        if($this->input->post('lngUserID')){
    
            $this->mUser->updateUser();
            redirect('admin/User/','refresh');
        } else {
            $data['title'] = "Edit User";
            $data['main'] = 'admin_User_edit';
            $data['User'] = $this->mUser->getUser($id);
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function create(){
        if($this->input->post('strUsername')){
            $this->mUser->createUser();
            redirect('myFilm/','refresh');
        } else {
            $data['title'] = "Register";
            $this->load->vars($data);
            $this->load->view('user_register');
        }
    }

    function delete($id){
        $this->db->where('lngUserID',$id);
        $this->db->delete('tblFilmUsers');
        redirect('admin/User/','refresh');
    }

    function loginVerify(){
        $username = $this->input->post('strUsername');
        $password = $this->input->post('strPassword');
        $this->mUser->verifyUser($username,$password);  
    }

    function viewFilm($filmID){
        $data['title'] = "Films";
        $data['main'] = 'film_view';
        $data['actors'] = $this->mActor->getAllActors();
        $data['genres'] = $this->mGenre->getAllGenres();
        $data['certificates'] = $this->mFilm->getCertificates();
        $data['filmProducers'] = $this->mFilm->viewFilmProducers($filmID);
        $data['roleTypes'] = $this->mFilm->roleTypes();
        $data['film'] = $this->mFilm->selectFilm($filmID);
        $this->load->vars($data);
        $this->load->view('template');
    }

    function filmList(){
        $data['title'] = "Films";
        $data['main'] = 'film_list';
        $data['films'] = $this->mFilm->getAllFilms();
        $this->load->vars($data);
        $this->load->view('template');
    }
}
?>