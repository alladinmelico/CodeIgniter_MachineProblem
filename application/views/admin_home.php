<style>
    .text-dim{
        color: rgb(43, 155, 127);
    }
</style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawPieChart);
        google.charts.setOnLoadCallback(drawBarChart);
        google.charts.setOnLoadCallback(drawLineChart);


        function drawLineChart(){
            var data = google.visualization.arrayToDataTable([
                ['date','count'],
                <?php
                    foreach($numOfRate AS $row){ ?>
                        ['<?= $row[0];?>',<?= $row[1];?>],
                <?php    }
                ?>
            ]);
            var options = {
                title: 'Numbers of Ratings per date',
                hAxis: {
                title: 'Date'
                },
                vAxis: {
                title: 'Number of Rates '
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }

        function drawBarChart(){
            var data = google.visualization.arrayToDataTable([
                ['Film','Directing', 'Writing', 'Cinematography', 'Editing',
                'Acting', 'Production Design','Sound'],
                <?php
                    foreach($reviewAvg AS $row){ ?>
                        ['<?= $row[0];?>',<?= $row[1];?>,<?= $row[2];?>,<?= $row[3];?>,<?= $row[4];?>,<?= $row[5];?>,<?= $row[6];?>,<?= $row[7];?>],
                <?php    }
                ?>
            ]);
            var options = {
                title: 'Film Ratings by Criteria',
                height: 400,
                legend: { position: 'top', maxLines: 3 },
                bar: { groupWidth: '75%' },
                isStacked: true,
                backgroundColor: 'none'
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));
            chart.draw(data, options);
        }

        function drawPieChart() {
            var data = new google.visualization.arrayToDataTable([
                ['Films','Reviews'],
                <?php
                    foreach($mostReview AS $row){
                        echo "['".$row[0]."',".$row[1]."],";
                    }
                ?>
            ]);
            var options = {
                title: 'Most Reviewed Films'
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>

<div class="container">
    <h1 class="h1"><i class="fas fa-chart-line mr-3"></i>Analytics</h1>
    <div class="row card mb-5" id="barchart" >
    </div>
    <div class="row">
        <div class="col rounded-lg bg-white mr-5" id="piechart" >
        </div>
        <div class="col rounded-lg bg-white" id="linechart">
        </div>
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