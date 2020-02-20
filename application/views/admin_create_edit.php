<style>
    label{
        margin-top: 2em;
    }
</style>
<div class="container">
    <h1 class="h1"><?= $title;?></h1> 
    <div class="row justify-content-center">
        <img src="<?= base_url()."images/".$film['picture']?>" alt="">
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group mt-5 justify-content-center">
                <?php
                if ($isEdit){
                    echo form_open('admin/film/edit');
                    $data = array('name'=>'picture',
                                    'type' => 'text',
                                    'id'=>'pic',
                                    'class'=>'form-control');
                    echo form_label('Upload');
                    echo form_upload($data);

                    $data = array('name'=>'title',
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
                } else {

                }
                ?>
        </div>          
    </div>

        <div class="col">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti cum distinctio suscipit aspernatur porro nulla, unde aperiam deserunt itaque impedit, vel accusamus tempore provident dolore placeat error dignissimos tempora at.
        </div>
        
        
    </div>
    <div class="row justify-content-center">
        <?php
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