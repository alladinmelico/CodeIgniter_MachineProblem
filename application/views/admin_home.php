<style>
    .text-dim{
        color: rgb(43, 155, 127);
    }
</style>
    <script type="text/javascript">
google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // Define the chart to be drawn.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Element');
      data.addColumn('number', 'Percentage');
      data.addRows([
        ['Nitrogen', 0.78],
        ['Oxygen', 0.21],
        ['Other', 0.01]
      ]);

      // Instantiate and draw the chart.
      var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
      chart.draw(data, null);
    }
    </script>

<div class="container">
    <div class="row" id="myPieChart">

    </div>
    <div class="row">
        <div class="col-8 py-3 px-lg-5">
        <h1 class="h1">Films<a href="<?php echo base_url();?>admin/film/create"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h1>
        <table class="table table-striped table-inverse text-light ">
            <thead class="thead-inverse text-dim">
                <tr>
                    <th></th>
                    <th>Title</th>
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
                                <td scope="row"><a href="<?= base_url()?>user/viewFilm/<?= $row['lngFilmTitleID'];?>"><?= $row['strFilmTitle'];?></a></td>
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
        </div>
        <div class="col-3 mt-5">
            <div class="row card bg-dark p-3">
                <h2 class="h2">Genre<a href="<?php echo base_url();?>admin/genre/create"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h2>
                <table class="table table-striped table-inverse text-light">
                    <thead class="thead-inverse text-dim">
                        <tr>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($genres as $row){?>
                                    <tr>
                                        <td scope="row"><?= $row['strGenre'];?></td>
                                        <td><a name="" id="" class="btn btn-danger" 
                                            href="<?= base_url();?>admin/genre/delete/<?= $row['lngGenreID'];?>" 
                                            role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php }?>
                        </tbody>
                </table>
            </div>
            <div class="row card bg-dark mt-5 p-3">
                <h2 class="h2">Producers<a href="<?php echo base_url();?>admin/producer/create"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h2>
                <table class="table table-striped table-inverse text-light">
                    <thead class="thead-inverse text-dim">
                        <tr>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($producers as $row){?>
                                    <tr>
                                        <td scope="row"><?= $row['strProducerName'];?></td>
                                        <td><a name="" id="" class="btn btn-danger" 
                                            href="<?= base_url();?>admin/producer/delete/<?= $row['lngProducerID'];?>" 
                                            role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php }?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>