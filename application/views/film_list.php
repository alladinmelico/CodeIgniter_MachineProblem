<h1 class="h1 mt-5 mx-auto"><?= $title;?></h1>
<style>
    .text-dim{
        color: rgb(43, 155, 127);
    }
    td{
        
    }
</style>
<table class="table table-striped table-inverse text-light mt-5">
        <tbody>
            <?php foreach($films as $row){?>
                    <tr style="color:white;" ">
                        <td>
                        <div class="container-fluid mx-auto " style="width: 40rem;margin-top:5rem;">
                            <div class="card mb-3 box shadow p-2 cardBg" style="max-width: 40rem; background-image: url('images\5c289afb9a157510e6893a57_29. Pale Cornflower Blue.jpg');" >
                                <div class="row no-gutters ">
                                    <div class="col-md-4 ">
                                        <img src="<?php echo base_url().$row['picture'];?>?>" class="card-img rounded-lg shadow p-2" alt="" style="margin-left:0.1rem;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title font-weight-bold text-center mb-5"><?php echo $row['strFilmTitle'] ?>
                                            <a href="<?= base_url()?>user/filmDetail/<?= $row['lngFilmTitleID'];?>"
                                                class="float-right "><i class="fas fa-arrow-right"></i></h5>
                                            <p class="card-text"><strong>Cast: </strong><?php echo $row['actors']?></p>
                                            <p class="card-text"><strong>Genre:</strong><?php echo $row['genres']?></p>
                                            <?php
                                                $tempProds = explode("," ,$row['producers']);
                                                $tempProdUniq = array_unique($tempProds);
                                                $tempString = "";
                                                    foreach($tempProdUniq AS $tempProdData)
                                                    {
                                                    $tempString .= (", ". $tempProdData);
                                                    }
                                                    $tempString = substr($tempString, 1);
                                            ?>
                                            <p class="card-text"><strong>Producers:</strong><?php echo $tempString;?></p>
                                            <strong><p>
                                            <?php echo intdiv($row['intFilmDuration'],60)?>hr 
                                            <?php echo fmod($row['intFilmDuration'],60)?> mins</p></strong>
                                            <p class="card-text"><small class="text-muted">
                                            <div class="text-truncate wrap bd-highlight" style="max-width: 55ch;">
                                                <?php echo $row['memFilmStory']?>
                                            </div>
                                            <!-- <a href='script/editFilm.php?lngFilmTitleID="<?php echo ($row['lngFilmTitleID']);?>"'><i>read more</i></a> -->
                                            <button type="button" class="btn btn-sm btn-info shadow p-2" data-toggle="popover" title="Film Story"
                                            data-content="<?php echo $row['memFilmStory'];?>">read more</button>
                                            </small></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    </tr>
                <?php }?>
        </tbody>
</table>