<?php
class mUser extends CI_Model{
    public function __construct(){
        parent::__construct();
        
    }

    function index(){
        $data['title'] = "Manage Users";
        $this->load->var($data);
        $this->load->view('login');
    }

    function getAllUsers(){
        $data = array();
        $Q = $this->db->get('tblFilmUsers');

        if ($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }

        $Q->free_result();
        return $data;
    }

    function getUser($id){
        $data = array();
        $User = array('lngUserID' => $id);
        $Q = $this->db->get_where('tblFilmUsers',$User,1);

        if($Q->num_rows() > 0){
            $data = $Q -> row_array();
        }

        $Q->free_result();
        return $data;
    }


    function updateUser(){
        $data = array(
           'lngUserID' => $_POST['lngUserID'],
           'strUser' => $_POST['strUser'],
        );

        $this->db->where('lngUserID',$_POST['lngUserID']);
        $this->db->update('tblFilmUsers',$data);
    }

    function createUser(){
        $data = array(
            'strUsername' => $_POST['strUsername'],
            'strFirstName	' => $_POST['strFirstName'],
            'strLastName' => $_POST['strLastName'],
            'strMiddleName' => $_POST['strMiddleName'],
            'strEmailAddress' => $_POST['strEmailAddress'],
            'strPassword' => $_POST['strPassword']
         );
 
         $this->db->insert('tblUser',$data);
    }

    function verifyUser($username,$password){
        $this->db->select('idUser,strUsername');
        $this->db->where('strUsername',$username);
        $this->db->where('strPassword',$password);
        $this->db->limit(1);
        $Q = $this->db->get('tblUser');
        if ($Q->num_rows() > 0){
            $row = $Q->row_array();
            $_SESSION['userid'] = $row['idUser'];
            $_SESSION['username'] = $row['strUsername'];
            if($row['strUsername']=="admin"){
                $_SESSION['isAdmin'] = true;
                redirect('admin/dashboard');
            } else {
                (redirect('user/filmList'));
            }
        }else{
            redirect('user');
        }
    }

}
?>