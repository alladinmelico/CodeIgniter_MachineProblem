<?php
class Actor extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data['title'] = "Actor";
        $data['main'] = 'admin_actor';
        $data['actors'] = $this->mActor->getAllActors();
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function edit($id=0){
        if($this->input->post('lngActorID')){
    
            $this->mActor->updateActor();
            redirect('admin/actor/','refresh');
        } else {
            $data['title'] = "Edit Actor";
            $data['main'] = 'admin_actor_edit';
            $data['actor'] = $this->mActor->getActor($id);
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function create(){
        if($this->input->post('strActorFullName')){
            $this->mActor->createActor();
            redirect('admin/actor/','refresh');
        } else {
            $data['title'] = "Add Actor";
            $data['main'] = 'admin_actor_create';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function delete($id,$path,$image){
        unlink($path."/".urldecode($image));
        $this->db->where('lngActorID',$id);
        $this->db->delete('tblActors');
        redirect('admin/actor/','refresh');
    }

    function role($film,$actor,$action){
        if($this->input->post('lngFilmTitleID') || isset($film)){
            if($action=="CREATE"){
                $this->mActor->createRole();
                redirect('user/viewFilm/'.$film,'refresh');

            } elseif($action=="EDIT"){
                $this->mActor->updateRole($film,$actor);
                redirect('user/viewFilm/'.$film,'refresh');

            } elseif ($action=="REMOVE"){
                $this->db->where('lngFilmTitleID',$film);
                $this->db->where('lngActorID',$actor);
                $this->db->delete('tblFilmsActorRoles');
                redirect('user/viewFilm/'.$film,'refresh');
            } else redirect('user/viewFilm/'.$film,'refresh');
            
        }
    }
}

?>