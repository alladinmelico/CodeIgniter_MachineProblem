<h1 class="h1 mt-5"><?= $title;?><a href="<?php echo base_url();?>admin/film/create"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h1>
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
                        <td scope="row"><a href="<?= base_url()?>user/viewFilm/<?= $row['lngFilmTitleID'];?>"><?= $row['strFilmTitle'];?></a></td>
                        <td scope="row"><?= $row['memFilmStory'];?></td>
                        <td scope="row"><?= $row['dtmFilmReleaseDate'];?></td>
                        <td scope="row"><?= $row['intFilmDuration'];?></td>
                        <td scope="row"><?= $row['memFilmAdditionalInfo'];?></td>
                        <td scope="row"><?= $row['strGenre'];?></td>
                        <td scope="row"><?= $row['strCertificate'];?></td>
                        <td><a name="" id="" class="btn btn-primary" 
                            href="<?= base_url();?>admin/film/edit/<?= $row['lngFilmTitleID'];?>" role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        </td>
                        <td><a name="" id="" class="btn btn-danger" 
                            href="<?= base_url();?>admin/film/delete/<?= $row['lngFilmTitleID'];?>/<?= $row['picture'];?>" 
                            role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php }?>
        </tbody>
</table>