
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
            <h3 class="text-white font-weight-lighter">Producer</h3>
                <table class="table">
                  <tbody style="color:white;">
                    <?php 
                      foreach ($producers AS $producer){ ?>
                          <tr class="showTrashRow">
                            <td class="text-left"><?= $producer['strProducerName'];?></td>
                          </tr>
                      <?php }
                    ?>
                  </tbody>
                </table>
          </td> 
          <td>
            <h3 class="text-white font-weight-lighter">Certificate</h3>
                <table class="table">
                  <tbody style="color:white;">
                          <tr>
                            <td class="text-center"><?php echo $film['strCertificate']; ?></td>
                          </tr>
                  </tbody>
                </table>
          </td>

          <td>
            <h3 class="text-white font-weight-lighter">Genre</h3>
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
            <h3 class="text-white font-weight-lighter">Cast</h3>
            <table class = "table table-bordered table-dark table-hover table-hover">
            <thead style=" background: #11998e;
                  background: -webkit-linear-gradient(to right, #11998e, #38ef7d);
                  background: linear-gradient(to right, #11998e, #38ef7d);">
              <th scope="col" class="text-center"></th>
              <th scope="col" class="text-center">Name</th>
              <th scope="col" class="text-center">Character</th>
              <th scope="col" class="text-center">Description</th>
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
                </tr>
              <?php }
                echo "</tbody>\n";
                echo "</table>\n";
              ?>
              </td>
          </tr>
          <tr scope="row">
            <td>
                <h3 class="text-white font-weight-lighter">Story</h3>
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
