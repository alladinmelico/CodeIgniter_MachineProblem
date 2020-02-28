<style>
    label{
        margin-top: 2em;
    }
</style>

<div class="container">
    <h1 class="h1"><?= $title;?></h1> 
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group justify-content-center">
                <?php
                    echo form_open_multipart('admin/actor/create');
                    
                    $data = array('name'=>'picture',
                                    'type' => 'text',
                                    'id'=>'picture',
                                    'class'=>'form-control',
                                    'rules'=>'required');
                    echo form_label('Upload');
                    echo form_upload($data);

                    $data = array('name'=>'strActorFullName',
                                    'type' => 'text',
                                    'id'=>'strActorFullName',
                                    'size'=>25,
                                    'class'=>'form-control');
                    echo form_label('Name');
                    echo form_input($data);

                    $data = array('name'=>'memActorNotes',
                                    'type' => 'text',
                                    'id'=>'memActorNotes',
                                    'class'=>'form-control');
                    echo form_label('Notes');
                    echo form_textarea($data);
                    $data = array('name'=>'createActor',
                                    'type' => 'submit',
                                    'id'=>'',
                                    'value'=>'Save',
                                    'class'=>'btn btn-success mt-5');
                    echo form_submit($data);
                    echo form_close();
                ?>
        </div>          
    </div>
    </div>
</div>