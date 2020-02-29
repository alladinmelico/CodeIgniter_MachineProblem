<?php
class mActor extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data['title'] = "Manage Actors";
        $data['main'] = 'admin_actor';
        $this->load->var($data);
        $this->load->view('dashboard');
    }

    function getAllActors(){
        $data = array();
        $Q = $this->db->get('tblActors');

        if ($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }

        $Q->free_result();
        return $data;
    }

    function getActor($id){
        $data = array();
        $actor = array('lngActorID' => $id);
        $Q = $this->db->get_where('tblActors',$actor,1);

        if($Q->num_rows() > 0){
            $data = $Q -> row_array();
        }

        $Q->free_result();
        return $data;
    }


    function updateActor(){
        $data = array(
           'lngActorID' => $_POST['lngActorID'],
           'strActorFullName' => $_POST['strActorFullName'],
           'memActorNotes' => $_POST['memActorNotes']
        );

        if(isset($_FILES['picture']['name']) && !empty($_FILES['picture']['tmp_name'])){
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '500';
            $config['remove_spaces'] = false;
            $config['overwrite'] = false;
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->load->library('upload',$config);

            
            if(! $this->upload->do_upload('picture')){
                $this->upload->display_errors();
                exit();
            }

            $image = $this->upload->data();
            if($image['file_name']){
                $data['actor_picture'] = "images/".$image['file_name'];
            }
        } else{
            $data['actor_picture'] = $_POST['oldPicture'];
        }

        $this->db->where('lngActorID',$_POST['lngActorID']);
        $this->db->update('tblActors',$data);
    }

    function createActor(){
        $data = array(
            'strActorFullName' => $_POST['strActorFullName'],
            'memActorNotes' => $_POST['memActorNotes']
         );
 
         $config['upload_path'] = './images/';
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size'] = '500';
         $config['remove_spaces'] = false;
         $config['overwrite'] = false;
         $config['max_width'] = '0';
         $config['max_height'] = '0';
 
         $this->load->library('upload',$config);
 
         
         if(! $this->upload->do_upload('picture')){
             $this->upload->display_errors();
             exit();
         }
 
         $image = $this->upload->data();
         if($image['file_name']){
             $data['actor_picture'] = "images/".$image['file_name'];
         }
 
         $this->db->insert('tblActors',$data);
    }

    function createRole(){
        $data = array(
            'strCharacterName' => $_POST['strCharacterName'],
            'memCharaterDescription' => $_POST['memCharaterDescription'],
            'lngActorID' => $_POST['lngActorID'],
            'lngRoleTypeID' => $_POST['lngRoleTypeID'],
            'lngFilmTitleID' => $_POST['lngFilmTitleID']
         );

         $this->db->insert('tblFilmsActorRoles',$data);
    }

    function updateRole($film,$actor){
        $data = array(
            'strCharacterName' => $_POST['strCharacterName'],
            'memCharaterDescription' => $_POST['memCharaterDescription'],
            'lngActorID' => $_POST['lngActorID'],
            'lngRoleTypeID' => $_POST['lngRoleTypeID'],
            'lngFilmTitleID' => $_POST['lngFilmTitleID']
         );

         $this->db->where('lngActorID',$actor);
         $this->db->where('lngFilmTitleID',$film);
         $this->db->update('tblFilmsActorRoles',$data);
    }
}
?>