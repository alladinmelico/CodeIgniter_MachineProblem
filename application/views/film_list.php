<h1 class="h1 mx-auto"><?= $title;?></h1>
<style>
    .text-dim{
        color: rgb(43, 155, 127);
    }
    .popover-title { 
        color: #4CB8C4;
    }
</style>

<table class="table table-borderless table-inverse">
        <tbody> 
            <?php foreach($films as $row){?>
                    <tr>
                        <td>
                        <div class="container-fluid mx-auto " style="width: 60rem;margin-top:5rem;">
                            <div class="card mb-3 box shadow p-2 cardBg" style="max-width: 60rem; background-image: url('images\5c289afb9a157510e6893a57_29. Pale Cornflower Blue.jpg');" >
                                <div class="row no-gutters ">
                                    <div class="col-md-4 ">
                                        <img src="<?php echo base_url().$row['picture'];?>?>" class="card-img rounded-lg shadow p-2" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title font-weight-bold text-center mb-5"><?php echo $row['strFilmTitle'] ?>
                                            <a href="<?= base_url()?>user/filmDetail/<?= $row['lngFilmTitleID'];?>"
                                                class="float-right "><i class="fas fa-arrow-right"></i></h5></a>
                                            <p class="card-text"><strong>Cast: </strong><?php echo $row['actors']?></p>
                                            <?php
                                                $tempGenre = explode("," ,$row['genres']);
                                                $tempGenreUniq = array_unique($tempGenre);
                                                $tempStringGenre = "";
                                                    foreach($tempGenreUniq AS $tempGenreData)
                                                    {
                                                    $tempStringGenre .= (", ". $tempGenreData);
                                                    }
                                                    $tempStringGenre = substr($tempStringGenre, 1);
                                            ?>
                                            <p class="card-text"><strong>Genre:</strong><?= $tempStringGenre?></p>
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
                                            <div class="text-truncate wrap bd-highlight">
                                                <?php echo $row['memFilmStory']?>
                                            </div>
                                                <button type="button" class="btn btn-sm btn-info shadow p-2" data-toggle="popover" title="Film Story"
                                                data-content="<?php echo $row['memFilmStory'];?>">read more</button>
                                            </small></p>

                                            <a href="<?= base_url()?>user/watch/<?= $row['lngFilmTitleID'];?>"
                                                class="float-right text-danger display-1"><i class="fa fa-play-circle" aria-hidden="true"></i></a>
                                            
                                            <script>
                                                $(document).ready(function(){
                                                $('[data-toggle="popover"]').popover();   
                                                });
                                            </script>
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