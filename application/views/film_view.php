
<?php 
  $lngFilmTitleID = $this->uri->segment(3);
  // $pic = $this->uri->segment(5);
  $pic = $film['picture'];
  $lngActorID = $this->uri->segment(4);
?>
<body>


<style>
label{
  color: #4CB8C4;
}
.content:before {
  content: "";
  position: fixed;
  top: -5%;
  left: -5%;
  right: 0;
  bottom: 0;
  z-index: -1;
  
  display: block;
  background-image: url("<?= base_url()?><?= $pic?>");
  background-size:cover;
  width: 110%;
  height: 110%;
  filter: brightness(10%);
}

.popBg{
  background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
}
.content {
  /* overflow: auto;
  position: relative; */
}

.content p {
  margin: 15px;
  background: rgba(255, 255, 255, 0.3);
  padding: 5px;
  box-shadow: 0 0 5px gray;
}

.table {
   margin: auto;
}
</style>
<div class="container mx-auto">
<span class="text-center text-info font-weight-lighter mb-5 display-4"><?php echo $film['strFilmTitle'] ?></span>
<table class="content table table-borderless table-responsive mt-5">
  <tbody>
    <tr scope="row">
      <td>
        <img src="<?= base_url()?><?= $pic?>" class="border border-white rounded-lg" alt="" width="70%">
      </td>
          <td>
            <h3 class="text-white font-weight-lighter">Producer  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#ModalCenter">
            <i class="fa fa-plus-circle" aria-hidden="true"></i></button></h3>
                <table class="table">
                  <tbody style="color:white;">
                    <?php 
                      foreach ($producers AS $producer){ ?>
                          <tr class="showTrashRow">
                            <td class="text-left"><?= $producer['strProducerName'];?></td>
                            <td>
                                  <a href="<?= base_url()?>/admin/producer/removeProducer/<?= $lngFilmTitleID?>/<?= $producer['lngProducerID']?>" 
                                    class="btn-sm btn-danger">
                                    X</a>
                            </td>
                          </tr>
                      <?php }
                    ?>
                  </tbody>
                </table>
          </td> 
          <td>
            <h3 class="text-white font-weight-lighter">Certificate<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#ModalCert">
            <i class="fas fa-cog"></i></button></h3>
                <table class="table">
                  <tbody style="color:white;">
                          <tr>
                            <td class="text-center"><?php echo $film['strCertificate']; ?></td>
                          </tr>
                  </tbody>
                </table>
          </td>

          <td>
            <h3 class="text-white font-weight-lighter">Genre  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#ModalGenre">
            <i class="fas fa-cog"></i></button></h3>
              <table class="table">
                <tbody style="color:white;">
                        <tr>
                          <td class="text-center"><?php echo $film['strGenre']; ?></td>
                        </tr>
                </tbody>
              </table>
          </td>
        </tr>
        </tbody>
</table>
<table class="table table-borderless table-responsive">
  <tbody>
    <tr scope="row">
          <td>
            <h3 class="text-white font-weight-lighter">Cast <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#ModalActEmpty">
            <i class="fas fa-cog"></i></button> </h3>
            <table class = "table table-bordered table-dark table-hover table-hover">
            <thead style=" background: #11998e;
                  background: -webkit-linear-gradient(to right, #11998e, #38ef7d);
                  background: linear-gradient(to right, #11998e, #38ef7d);">
              <th scope="col" class="text-center"></th>
              <th scope="col" class="text-center">Name</th>
              <th scope="col" class="text-center">Character</th>
              <th scope="col" class="text-center">Description</th>
              <th scope="col" class="text-center"></th>
            </thead>
            <tbody>
              <?php
              // echo "<pre>";
              // print_r($film);
              // echo "</pre>";
              foreach ($filmActors AS $row)
              { ?>
                <tr style="color:white;" class="showTrashRow">
                  <td  class="text-center"><img src="<?php echo base_url();echo $row['actor_picture'];?>" alt="" width="80px"></td>
                  <td class="text-center"><a data-toggle="modal" data-target="#ModalAct" href="#" onclick="<?php $lngActorID = $row['lngActorID'] ?>" class="text-white">
                    <?php echo $row['strActorFullName']; ?></a></td>
                  <td class = "text-center"><?php echo $row['strCharacterName']; ?></td>
                  <td class = "text-center"><?php echo $row['memCharaterDescription']; ?></td>
                  <td class = "text-center">
                    <div class="showTrash">
                      <a href="<?= base_url()?>admin/actor/role/<?= $row['lngFilmTitleID']?>/<?= $row['lngActorID']?>/REMOVE" 
                        class="btn-sm btn-danger">X</a>
                    </div>
                  </td>
                </tr>
              <?php }
                echo "</tbody>\n";
                echo "</table>\n";
              ?>
              </td>
          </tr>
          <tr scope="row">
            <td>
                <h3 class="text-white font-weight-lighter">Story <a href="<?= base_url()?>admin/film/edit/<?= $lngFilmTitleID?>"><button type="button" class="btn btn-outline-info">
                <i class="fas fa-cog"></i></button></a>
                </h3>
                <table class = "table table-bordered table-dark table-hover table-hover">
                <tbody>
                  <tr style="color:white;">
                      <td class="text-justify font-weight-light p-3 "><p>&emsp;&emsp;&emsp;<?php echo $film['memFilmStory']; ?></p></td>
                  </tr>
                </tbody>
                </table>
          </td>
          </tr>
  </tbody>
</table>
</div>


<!-- MODALS -->
<!-- Producer -->
    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="modal-header text-white bg-info">
              <h5 class="modal-title" id="ModalCenterTitle">Choose the Producer you want to add</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="<?= base_url()?>admin/producer/addProducer/<?= $lngFilmTitleID?>" method="POST">
              <label>Producer</label>
                    <input type="hidden" name="lngFilmTitleID" value="<?= $lngFilmTitleID?>">
                    <select class="custom-select" name="lngProducerID" required>
                    <option name="strProducerName" value="" required>Choose...</option>;
                    <?php foreach($filmProducers AS $prod)
                    {?>
                        <tr>
                            <td><option name="lngProducerID" value="<?= $prod['lngProducerID'];?>" required><?= $prod['strProducerName'];?></option></td>
                        </tr>
                <?php }?>
                </select> <br>
                <br>
              </div>
          <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="Submit" value="CREATE">Add</button>
              </form>
          </div>
          </div>
      </div>
    </div>


<!-- Genre -->
<div class="modal fade" id="ModalGenre" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="modal-header text-white bg-info">
              <h5 class="modal-title" id="ModalCenterTitle">Please select the Genre</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="<?= base_url()?>admin/film/updateGenre/<?= $lngFilmTitleID?>" method="POST">
              <label>Genre </label>
                    <input type="hidden" name="lngFilmTitleID" value="<?= $lngFilmTitleID?>">
                    <select class="custom-select" name="lngGenreID" required>
                    <option name="lngGenreID" value="" required>Choose...</option>;
                    <?php foreach($genres AS $gen)
                    {?>
                        <tr>
                            <td><option name="lngGenreID" value="<?php echo $gen['lngGenreID'];?>" required><?php echo $gen['strGenre'];?></option></td>
                        </tr>
                <?php }?>
                </select> <br>
                <br>
              </div>
          <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="Submit" value="CREATE">Edit</button>
              </form>
          </div>
          </div>
      </div>
    </div>


<!-- Certificate -->
<div class="modal fade" id="ModalCert" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="modal-header text-white bg-info">
              <h5 class="modal-title" id="ModalCenterTitle">Please select the Genre</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="<?= base_url()?>admin/film/updateCertificate/<?= $lngFilmTitleID?>" method="POST">
              <label>Certificate </label>
                    <input type="hidden" name="lngFilmTitleID" value="<?= $lngFilmTitleID?>">
                    <select class="custom-select" name="lngCertificateID" required>
                    <option name="lngCertificateID" value="" required>Choose...</option>;
                    <?php foreach($certificates AS $cert)
                    {?>
                        <tr>
                            <td><option name="lngCertificateID" value="<?= $cert['lngCertificateID']?>" required><?= $cert['strCertificate'];?></option></td>
                        </tr>
                <?php }?>
                </select> <br>
                <br>
              </div>
          <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="Submit" value="CREATE">Edit</button>
              </form>
          </div>
          </div>
      </div>
    </div>


<!-- Actors -->
<?php
if (isset($lngActorID))
{
  foreach($filmActors AS $row)
  {
    if ($lngActorID == $row['lngActorID'])
    {
      $strCharacterName = $row['strCharacterName'];
      $strRoleType = $row['strRoleType'];
      $lngRoleTypeId = $row['lngRoleTypeID'];
      $memCharaterDescription = $row['memCharaterDescription'];
      $strActorFullName = $row['strActorFullName'];
      $process = "EDIT";
    }
  }
} else{
  $strCharacterName = "";
  $strRoleType = "Choose...";
  $memCharaterDescription = "";
  $strActorFullName = "Choose...";
  $process = "CREATE";
}
?>
<div class="modal fade" id="ModalAct" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="modal-header text-white bg-info">
              <h5 class="modal-title" id="ModalCenterTitle">Actors</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="<?= base_url()?>admin/actor/role/<?= $lngFilmTitleID?>/<?= $lngActorID?>/EDIT" method="POST">
                    <input type="hidden" name="pic" value="<?php echo $pic; ?>">
                    <input type="hidden" name="lngFilmTitleID" value="<?php echo $lngFilmTitleID?>">
                    <label>Actor</label>
                    <select class="custom-select" name="lngActorID" required>
                    <option name="lngActorID" value="<?= $lngActorID ?>" required><?php echo $strActorFullName ?></option>;
                    <?php foreach($actors AS $act)
                    {?>
                        <tr>
                            <td><option name="lngActorID" value="<?php echo $act['lngActorID']?>" required><?php echo $act['strActorFullName'];?></option></td>
                        </tr>
                    <?php }?>
                    </select> <br>
                    <br>

                    <label>Role</label><br>
                    <select class="custom-select" name="lngRoleTypeID" required>
                    <option name="lngRoleTypeID" value="<?= $lngRoleTypeId?>" required><?php echo $strRoleType?></option>;
                    
                    <?php foreach($roleTypes AS $role)
                    {?>
                        <tr>
                            <td><option name="lngRoleTypeID" value="<?php echo $role['lngRoleTypeID']?>" required><?php echo $role['strRoleType'];?></option></td>
                        </tr>
                    <?php }?>
                    </select> <br>
                    <br>
                    <label>Character</label><br>
                    <input type="text" name="strCharacterName" value="<?php echo $strCharacterName?>" class="form-control"><br><br>
                    <label>Description</label>
                    <textarea name="memCharaterDescription" cols="30" rows="10" class="form-control" value="<?php echo $memCharaterDescription?>" required><?php echo $memCharaterDescription?></textarea> <br>
              </div>
              <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="submit" value="EDIT"><?php echo $process;?></button>
                  </form>
              </div>
          </div>
      </div>
    </div>


    <div class="modal fade" id="ModalActEmpty" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="modal-header text-white bg-info">
              <h5 class="modal-title" id="ModalCenterTitle">Actors</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="<?= base_url()?>admin/actor/role/<?= $lngFilmTitleID?>/<?= $lngActorID?>/CREATE" method="POST">
                    <input type="hidden" name="pic" value="<?php echo $pic; ?>">
                    <input type="hidden" name="lngFilmTitleID" value="<?php echo $lngFilmTitleID?>">
                    <label>Actor</label>
                    <select class="custom-select" name="lngActorID" required>
                    <option name="lngActorID" value="" required></option>;
                    <?php foreach($actors AS $act)
                    {?>
                        <tr>
                            <td><option name="lngActorID" value="<?php echo $act['lngActorID']?>" required><?php echo $act['strActorFullName'];?></option></td>
                        </tr>
                    <?php }?>
                    </select> <br>
                    <br>

                    <label>Role</label><br>
                    <select class="custom-select" name="lngRoleTypeID" required>
                    <option name="lngRoleTypeID" value="" required></option>;
                    
                    <?php foreach($roleTypes AS $role)
                    {?>
                        <tr>
                            <td><option name="lngRoleTypeID" value="<?php echo $role['lngRoleTypeID']?>" required><?php echo $role['strRoleType'];?></option></td>
                        </tr>
                    <?php }?>
                    </select> <br>
                    <br>
                    <label>Character</label><br>
                    <input type="text" name="strCharacterName" value="" class="form-control"><br><br>
                    <label>Description</label>
                    <textarea name="memCharaterDescription" cols="30" rows="10" class="form-control" value="" required></textarea> <br>
              </div>
              <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="submit" value="CREATE">CREATE</button>
                  </form>
              </div>
          </div>
      </div>
    </div>