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
                    echo form_open_multipart('admin/genre/create');
                    
                    $data = array('name'=>'strGenre',
                                    'type' => 'text',
                                    'id'=>'strGenre',
                                    'size'=>25,
                                    'class'=>'form-control');
                    echo form_label('Name');
                    echo form_input($data);

                    $data = array('name'=>'editGenre',
                                    'type' => 'submit',
                                    'id'=>'',
                                    'value'=>'Add',
                                    'class'=>'btn btn-success mt-5');
                    echo form_submit($data);
                    echo form_close();
                ?>
        </div>          
    </div>
    </div>
</div>