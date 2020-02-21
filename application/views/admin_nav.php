<?php
    if(!$_SESSION['isAdmin']){
        redirect('user');
    }
?>
<style>
    .nav-link{
        color:white;
    }
</style>

<nav class="navbar navbar-expand-sm navbar-light">
    <a class="navbar-brand text-light" href="#">Dashboard</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url()?>admin/film">Films</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url()?>admin/actor">Actors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url()?>admin/producer">Producers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url()?>admin/genre">Genre</a>
            </li>
            
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Create</a>
                    <a class="dropdown-item" href="#">Action 2</a>
                </div>
            </li> -->
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <a name="" id="" class="btn btn-outline-info ml-5" href="<?php echo base_url()?>admin/dashboard/logout" role="button">
            LOG OUT</a>

    </div>
</nav>