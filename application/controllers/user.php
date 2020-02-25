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
            redirect('user/','refresh');
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
        $data['producers'] = $this->mFilm->viewFilmProducers($filmID);
        $data['filmProducers'] = $this->mFilm->getAllProducers();
        $data['roleTypes'] = $this->mFilm->roleTypes();
        $data['film'] = $this->mFilm->getFilm($filmID);
        $data['filmActors'] = $this->mFilm->getFilmActors($filmID);
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function filmDetail($filmID){
        $data['title'] = "Films";
        $data['main'] = 'film_detail';
        $data['actors'] = $this->mActor->getAllActors();
        $data['genres'] = $this->mGenre->getAllGenres();
        $data['certificates'] = $this->mFilm->getCertificates();
        $data['producers'] = $this->mFilm->viewFilmProducers($filmID);
        $data['filmProducers'] = $this->mFilm->getAllProducers();
        $data['roleTypes'] = $this->mFilm->roleTypes();
        $data['film'] = $this->mFilm->getFilm($filmID);
        $data['filmActors'] = $this->mFilm->getFilmActors($filmID);
        $this->load->vars($data);
        $this->load->view('template');
    }

    function filmList(){
        $data['title'] = "Films";
        $data['main'] = 'film_list';
        $data['films'] = $this->mFilm->getFilmsDetails();
        $this->load->vars($data);
        $this->load->view('template');
    }

    function watch($id){
        $data['title'] = "Films";
        $data['main'] = 'film_watch';
        $data['film'] = $this->mFilm->getFilm($id);
        $data['review'] = $this->mFilm->getUserRating($id,$_SESSION['userid']);
        
        $data['rate'] = $this->mFilm->getRate($id);
        $this->load->vars($data);
        $this->load->view('template');
    }

    function filmReview(){
        $data['title'] = "Review";
        if($this->uri->segment(3) == "create"){
            $this->mFilm->addReview();
            $this->session->set_flashdata('Success', 'Review Added!');
        } elseif ($this->uri->segment(3) == "update"){
            $this->mFilm->updateReview();
            $this->session->set_flashdata('Success', 'Review Updated!');
        }
        redirect('user/filmList');
    }
}
?>