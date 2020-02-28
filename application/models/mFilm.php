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

    function getFilmsDetails(){
        $data = array();
        $Q = $this->db->get('viewFilmDetails');

        if ($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }

        $Q->free_result();
        return $data;
    }

    function getFilmActor($id){
        $data = array();
        $Q = $this->db->get_where('viewFilmActor',array('lngFilmTitleID' => $id),1);

        if ($Q->num_rows() > 0){
            $data = $Q -> row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getFilmActors($id){
        $data = array();
        $Q = $this->db->get_where('viewFilmActor',array('lngFilmTitleID' => $id));

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

    function getGenres(){
        $data = array();
        $Q = $this->db->get('tblFilmGenres');

        if($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }
        
        $Q->free_result();
        return $data;
    }

    function getCertificates(){
        $data = array();
        $Q = $this->db->get('tblFilmCertificates');

        if($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }
        
        $Q->free_result();
        return $data;
    }

    function updateFilm(){
        $data = array(
           'lngFilmTitleID' => $_POST['lngFilmTitleID'],
           'strFilmTitle' => $_POST['strFilmTitle'],
           'memFilmStory' => $_POST['memFilmStory'],
           'dtmFilmReleaseDate' => $_POST['dtmFilmReleaseDate'],
           'intFilmDuration' => $_POST['intFilmDuration'],
           'memFilmAdditionalInfo' => $_POST['memFilmAdditionalInfo'],
           'lngGenreID' => $_POST['lngGenreID'],
           'lngCertificateID' => $_POST['lngCertificateID'],
           'strSource' => $_POST['strSource']
        );

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
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
            $data['picture'] = "images/".$image['file_name'];
        }

        $this->db->where('lngFilmTitleID',$_POST['lngFilmTitleID']);
        $this->db->update('tblFilmTitles',$data);
    }

    function updateFilmGenre(){
        $data = array(
            'lngGenreID' => $_POST['lngGenreID']
         );
 
         $this->db->where('lngFilmTitleID',$_POST['lngFilmTitleID']);
         $this->db->update('tblFilmTitles',$data);
    }

    function updateFilmCertificate(){
        $data = array(
            'lngCertificateID' => $_POST['lngCertificateID']
         );
 
         $this->db->where('lngFilmTitleID',$_POST['lngFilmTitleID']);
         $this->db->update('tblFilmTitles',$data);
    }

    function createFilm(){
        $data = array(
            'strFilmTitle' => $_POST['strFilmTitle'],
            'memFilmStory' => $_POST['memFilmStory'],
            'dtmFilmReleaseDate' => $_POST['dtmFilmReleaseDate'],
            'intFilmDuration' => $_POST['intFilmDuration'],
            'memFilmAdditionalInfo' => $_POST['memFilmAdditionalInfo'],
            'lngGenreID' => $_POST['lngGenreID'],
            'lngCertificateID' => $_POST['lngCertificateID'],
            'strSource' => $_POST['strSource']
         );
 
         $config['upload_path'] = './images/';
         $config['allowed_types'] = 'gif|jpg|png|jpeg   ';
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
             $data['picture'] = "images/".$image['file_name'];
         }
 
         $this->db->insert('tblFilmTitles',$data);
    }

    function getUserRating($film,$user){
        $data = array();
        $this->db->where('lngFilmTitleID',$film);
        $this->db->where('idUser',$user);
        $Q = $this->db->get('tblFilmReview');

        if($Q->num_rows() > 0){
            $data = $Q -> row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getRate($id){
        $data = array();
        $Q = $this->db->query('CALL getFilmRateAverage(?,@rate)',array($id));
        if($Q->num_rows() > 0){
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function addReview(){
        $data = array(
                'idUser'=>$_POST['idUser'],
                'lngFilmTitleID'=>$_POST['lngFilmTitleID'],
                'decDirecting'=>$_POST['decDirecting'],
                'decWriting'=>$_POST['decWriting'],
                'decCinematography'=>$_POST['decCinematography'],
                'decEditing'=>$_POST['decEditing'],
                'decActing'=>$_POST['decActing'],
                'decProdDesign'=>$_POST['decProdDesign'],
                'decSound'=>$_POST['decSound'],
                'strComment'=>$_POST['strComment'],
        );
        $this->db->insert('tblFilmReview',$data);
    }

    function updateReview(){
        $data = array(
                'decDirecting'=>$_POST['decDirecting'],
                'decWriting'=>$_POST['decWriting'],
                'decCinematography'=>$_POST['decCinematography'],
                'decEditing'=>$_POST['decEditing'],
                'decActing'=>$_POST['decActing'],
                'decProdDesign'=>$_POST['decProdDesign'],
                'decSound'=>$_POST['decSound'],
                'strComment'=>$_POST['strComment'],
        );

        $this->db->where('idUser',$_POST['idUser']);
        $this->db->where('lngFilmTitleID',$_POST['lngFilmTitleID']);
        $this->db->update('tblFilmReview',$data);
    }

    function viewFilmProducers($id){
        $data = array();
        $film = array('lngFilmTitleID' => $id);
        $Q = $this->db->get_where('viewFilmProducers',$film);

        if($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }

        $Q->free_result();
        return $data;
    }

    function roleTypes(){
        $data = array();
        $Q = $this->db->get('tblRoleTypes');

        if ($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }

        $Q->free_result();
        return $data;
    }

    function getPic($id){
        $data = array();

        $this->db->select('picture');
        $Q = $this->db->get_where('tblFilmTitles',array('lngFilmTitleID' => $id));

        if($Q->num_rows() > 0){
            foreach( $Q->result_array() as $row){
                $data[] = $row;

            }
        }
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

    function viewMostReviewed(){
        $data = array();

        $Q = $this->db->get('viewMostReviewed');

        if($Q->num_rows() > 0){
            foreach($Q->result_array() AS $row){
                $data[] = array($row['strFilmTitle'],$row['review']);
            }   
        }
        $Q->free_result();
        
        return $data;
    }

    function viewReviewAvg(){
        $data = array();

        $Q = $this->db->get('viewReviewAvg');

        if($Q->num_rows() > 0){
            foreach($Q->result_array() AS $row){
                $data[] = array(
                    $row['strFilmTitle'],$row['directing'],$row['writing'],
                    $row['cinematography'],$row['editing'],
                    $row['acting'],$row['proddesign'],$row['sound']
                );
            }   
        }
        $Q->free_result();
        
        return $data;
    }

    function viewNumOfRate(){
        $data = array();

        $Q = $this->db->get('viewNumOfRate');

        if($Q->num_rows() > 0){
            foreach($Q->result_array() AS $row){
                $data[] = array($row['dtmTimeStamp'],$row['count']);
            }   
        }
        $Q->free_result();
        
        return $data;
    }
}
?>