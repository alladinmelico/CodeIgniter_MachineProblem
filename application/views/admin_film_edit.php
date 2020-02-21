<style>
    label{
        margin-top: 2em;
    }
</style>
<div class="container">
    <h1 class="h1"><?= $title;?></h1> 
    <div class="row justify-content-center">
        <img src="<?= base_url().$film['picture']?>" alt="" width="300">
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group justify-content-center">
                <?php
                    echo form_open_multipart('admin/film/edit');
                    
                    $data = array('name'=>'picture',
                                    'type' => 'text',
                                    'id'=>'picture',
                                    'class'=>'form-control',
                                    'rules'=>'required');
                    echo form_label('Upload');
                    echo form_upload($data);

                    $data = array('name'=>'strFilmTitle',
                                    'type' => 'text',
                                    'id'=>'strFilmTitle',
                                    'size'=>25,
                                    'value'=>$film['strFilmTitle'],
                                    'class'=>'form-control');
                    echo form_label('Title');
                    echo form_input($data);

                    $data = array('name'=>'memFilmStory',
                                    'type' => 'text',
                                    'id'=>'memFilmStory',
                                    'value'=>$film['memFilmStory'],
                                    'class'=>'form-control');
                    echo form_label('Story');
                    echo form_textarea($data);

                    $data = array('name'=>'dtmFilmReleaseDate',
                                    'type' => 'date',
                                    'id'=>'dtmFilmReleaseDate',
                                    'value'=>$film['dtmFilmReleaseDate'],
                                    'class'=>'form-control');
                    echo form_label('Release Date');
                    echo form_input($data);

                    $data = array('name'=>'intFilmDuration',
                                    'type' => 'number',
                                    'id'=>'intFilmDuration',
                                    'value'=>$film['intFilmDuration'],
                                    'class'=>'form-control');
                    echo form_label('Duration (minutes)');
                    echo form_input($data);

                    $data = array('name'=>'memFilmAdditionalInfo',
                                    'type' => 'text',
                                    'id'=>'memFilmAdditionalInfo',
                                    'value'=>$film['memFilmAdditionalInfo'],
                                    'class'=>'form-control');
                    echo form_label('Additional Information');
                    echo form_input($data);

                    $data = array('name'=>'strSource',
                                    'type' => 'text',
                                    'id'=>'strSource',
                                    'value'=>$film['strSource'],
                                    'class'=>'form-control');
                    echo form_label('Source');
                    echo form_input($data);
                
                ?>
        </div>          
    </div>

        <div class="col-sm-4 py-3 px-lg-5 border-left">
            <?php
                $dropdownGenre = array();
                foreach($genres as $key=>$value){
                    $dropdownGenre[$value['lngGenreID']] = $value['strGenre'];
                }
                $htmlParams = array('class' => 'form-control');
                echo form_label('Genres');
                echo form_dropdown('lngGenreID',$dropdownGenre,$film['lngGenreID'],$htmlParams);

                $dropdownCert = array();
                foreach($certificates as $key=>$value){
                    $dropdownCert[$value['lngCertificateID']] = $value['strCertificate'];
                }
                echo form_label('Certificate');
                echo form_dropdown('lngCertificateID',$dropdownCert,$film['lngCertificateID'],$htmlParams);


            ?>
        </div>
        
    </div>
    <div class="row justify-content-center">
        <?php
            echo form_hidden('lngFilmTitleID',$film['lngFilmTitleID']);
            $data = array('name'=>'editFilm',
                            'type' => 'submit',
                            'id'=>'',
                            'value'=>'Save',
                            'class'=>'btn btn-success mt-5');
            echo form_submit($data);
            echo form_close();
        ?>
    </div>
</div>