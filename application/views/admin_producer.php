<h1 class="h1 mt-5"><?= $title;?><a href="<?php echo base_url();?>admin/producer/create"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h1>
<style>
    .text-dim{
        color: rgb(43, 155, 127);
    }
</style>
<table class="table table-striped table-inverse text-light mt-5">
    <thead class="thead-inverse text-dim">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Notes</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($producers as $row){?>
                    <tr>
                        <td scope="row"><?= $row['lngProducerID'];?></td>
                        <td scope="row"><?= $row['strProducerName'];?></td>
                        <td scope="row"><?= $row['hypWebsite'];?></td>
                        <td scope="row"><?= $row['hypContactEmailAddress'];?></td>
                        <td><a name="" id="" class="btn btn-primary" 
                            href="<?= base_url();?>admin/producer/edit/<?= $row['lngProducerID'];?>" role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        </td>
                        <td><a name="" id="" class="btn btn-danger" 
                            href="<?= base_url();?>admin/producer/delete/<?= $row['lngProducerID'];?>" 
                            role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php }?>
        </tbody>
</table>