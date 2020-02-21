<?php
class mProducer extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data['title'] = "Manage Producers";
        $data['main'] = 'admin_producer';
        $this->load->var($data);
        $this->load->view('dashboard');
    }

    function getAllProducers(){
        $data = array();
        $Q = $this->db->get('tblProducers');

        if ($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }

        $Q->free_result();
        return $data;
    }

    function getProducer($id){
        $data = array();
        $Producer = array('lngProducerID' => $id);
        $Q = $this->db->get_where('tblProducers',$Producer,1);

        if($Q->num_rows() > 0){
            $data = $Q -> row_array();
        }

        $Q->free_result();
        return $data;
    }


    function updateProducer(){
        $data = array(
           'lngProducerID' => $_POST['lngProducerID'],
           'strProducerName' => $_POST['strProducerName'],
           'hypContactEmailAddress' => $_POST['hypContactEmailAddress'],
           'hypWebsite' => $_POST['hypWebsite']
        );

        $this->db->where('lngProducerID',$_POST['lngProducerID']);
        $this->db->update('tblProducers',$data);
    }

    function createProducer(){
        $data = array(
            'strProducerName' => $_POST['strProducerName'],
            'hypContactEmailAddress' => $_POST['hypContactEmailAddress'],
            'hypWebsite' => $_POST['hypWebsite']
         );
 
         $this->db->insert('tblProducers',$data);
    }
}
?>