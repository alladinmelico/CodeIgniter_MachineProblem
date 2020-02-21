<?php
class Producer extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data['title'] = "Producer";
        $data['main'] = 'admin_producer';
        $data['producers'] = $this->mProducer->getAllProducers();
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function edit($id=0){
        if($this->input->post('lngProducerID')){
    
            $this->mProducer->updateProducer();
            redirect('admin/producer/','refresh');
        } else {
            $data['title'] = "Edit Producer";
            $data['main'] = 'admin_producer_edit';
            $data['producer'] = $this->mProducer->getProducer($id);
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function create(){
        if($this->input->post('strProducerName')){
            $this->mProducer->createProducer();
            redirect('admin/producer/','refresh');
        } else {
            $data['title'] = "Add producer";
            $data['main'] = 'admin_producer_create';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function delete($id){
        $this->db->where('lngProducerID',$id);
        $this->db->delete('tblProducers');
        redirect('admin/producer/','refresh');
    }
}
?>