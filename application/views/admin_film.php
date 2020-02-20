<h1 class="h1 mt-5"><?= $title;?></h1>
<table class="table table-striped table-inverse text-light mt-5">
    <thead class="thead-inverse">
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
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($films as $row){?>
                    <tr>
                        <td scope="row"><img src="<?php echo base_url()."images/".$row['picture'];?>" alt="" width="100"></td>
                        <td scope="row"><?= $row['lngFilmTitleID'];?></td>
                        <td scope="row"><?= $row['strFilmTitle'];?></td>
                        <td scope="row"><?= $row['memFilmStory'];?></td>
                        <td scope="row"><?= $row['dtmFilmReleaseDate'];?></td>
                        <td scope="row"><?= $row['intFilmDuration'];?></td>
                        <td scope="row"><?= $row['memFilmAdditionalInfo'];?></td>
                        <td scope="row"><?= $row['strGenre'];?></td>
                        <td scope="row"><?= $row['strCertificate'];?></td>
                        <td><a name="" id="" class="btn btn-primary" 
                            href="<?= base_url();?>/admin/film/edit/<?= $row['lngFilmTitleID'];?>?>" role="button">EDIT</a>
                        </td>
                    </tr>
                <?php }?>
        </tbody>
</table>