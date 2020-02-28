<?php
class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();  
        }
    }

    function index(){
        $data['title'] = "Admin Dashboard";
        $data['main'] = 'admin_home';
        $data['films'] = $this->mFilm->getAllFilms();
        $data['genres'] = $this->mGenre->getAllGenres();
        $data['producers'] = $this->mProducer->getAllProducers();
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function logout(){
        unset($_SESSION['userid']);
        unset($_SESSION['username']);
        unset($_SESSION['isAdmin']);
        redirect('user','refresh');
    }

    function getMostReviewed(){
        $data['mostReview'] = $this->mFilm->viewMostReviewed();
        $this->load->vars($data);
    }
}
?>