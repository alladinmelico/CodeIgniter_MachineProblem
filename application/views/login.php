
<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title;?></title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>css/main.css">
    <link href="<?= base_url()?>css/all.css" rel="stylesheet">
    <script defer src="<?= base_url()?>js/all.js"></script>
    <link href="<?= base_url()?>css/solid.css" rel="stylesheet">
    <script defer src="<?= base_url()?>js/solid.js"></script>
  </head>
  <body>
      <div class="container mt-5 text-dark" style="width: 25rem;">
      <div class="card text-left">
        <img class="card-img-top "alt="" >
        <div class="card-body">
          <h4 class="card-title text-dark">Login</h4>
          <?php
            unset($_SESSION['isAdmin']);
            echo form_open("user/loginVerify");

            $data = array('name'=>'strUsername',
                            'type' => 'text',
                            'id'=>'strUsername',
                            'size'=>25,
                            'class'=>'form-control');
            echo form_label('Username');
            echo form_input($data);

            $data = array('name'=>'strPassword',
                            'type' => 'password',
                            'id'=>'strPassword',
                            'size'=>25,
                            'class'=>'form-control');
            echo form_label('Password');
            echo form_input($data);

            $data = array('name'=>'login',
                            'type' => 'submit',
                            'id'=>'',
                            'value'=>'Login',
                            'class'=>'btn btn-success mt-5 mb-5');
            echo form_submit($data);
            echo form_close();
            
          ?>
          
            <a href="user/create" class="mt-5">Not a Member yet? Register here!</a>
        </div>
      </div>
          
      </div>
        <div class="justify-content-center" id="footer">
            <?php $this->load->view('admin_footer');?>
        </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>