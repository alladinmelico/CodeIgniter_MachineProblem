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
                    echo form_open_multipart('admin/producer/edit');
                    
                    $data = array('name'=>'strProducerName',
                                    'type' => 'text',
                                    'id'=>'strProducerName',
                                    'size'=>25,
                                    'value'=>$producer['strProducerName'],
                                    'class'=>'form-control');
                    echo form_label('Name');
                    echo form_input($data);

                    $data = array('name'=>'hypWebsite',
                                    'type' => 'email',
                                    'id'=>'hypWebsite',
                                    'value'=>$producer['hypWebsite'],
                                    'class'=>'form-control');
                    echo form_label('Email');
                    echo form_input($data);

                    $data = array('name'=>'hypContactEmailAddress',
                                    'type' => 'website',
                                    'id'=>'hypContactEmailAddress',
                                    'value'=>$producer['hypContactEmailAddress'],
                                    'class'=>'form-control');
                    echo form_label('website');
                    echo form_input($data);

                    echo form_hidden('lngProducerID',$producer['lngProducerID']);
                    $data = array('name'=>'editProducer',
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