<h1 class="h1 mt-5 mx-auto"><?= $title;?></h1>
<style>
    .text-dim{
        color: rgb(43, 155, 127);
    }
    td{
        
    }
</style>
<table class="table table-striped table-inverse text-light mt-5">
    <thead class="thead-inverse text-dim">
        <tr>
            <th></th>
            <th>ID</th>
            <th>Title</th>
            <th>Story</th>
            <th>Release Date</th>
            <th>Duration</th>
            <th>Additional Info</th>
            <th>Genre</th>
            <th>Certificate</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($films as $row){?>
                    <tr>
                        <td scope="row"><img src="<?php echo base_url().$row['picture'];?>" alt="" width="100"></td>
                        <td scope="row"><?= $row['lngFilmTitleID'];?></td>
                        <td scope="row"><?= $row['strFilmTitle'];?></td>
                        <td scope="row"><?= $row['memFilmStory'];?></td>
                        <td scope="row"><?= $row['dtmFilmReleaseDate'];?></td>
                        <td scope="row"><?= $row['intFilmDuration'];?></td>
                        <td scope="row"><?= $row['memFilmAdditionalInfo'];?></td>
                        <td scope="row"><?= $row['strGenre'];?></td>
                        <td scope="row"><?= $row['strCertificate'];?></td>
                        <td scope="row jumbotron">
                            <span class="display-3 text-warning"><?= $row['rate'];?></span><span class="display-4 text-dim">/10</span>
                        </td>
                        <td  scope="row jumbotron"><a name="" id="" class="btn btn-danger" 
                            href="<?= base_url();?>user/watch/<?= $row['lngFilmTitleID'];?>" 
                            role="button"><i class="fa fa-play-circle display-4" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php }?>
        </tbody>
</table>