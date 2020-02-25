<?php
    if(!(isset($_SESSION['userid']) && isset($_SESSION['username']))){
        redirect('user');
    } 
?>
<style>
    .nav-link{
        color:white;
    }
</style>

<nav class="navbar navbar-expand-sm navbar-light mb-5 container-fluid bg-dark">
    <a class="navbar-brand text-light" href="<?php echo base_url()?>user/filmList">FILMS</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <span class="font-weight-bolder ml-5"><?= $_SESSION['username'] ?></span>
        <a name="" id="" class="btn btn-outline-info ml-2" href="<?php echo base_url()?>admin/dashboard/logout" role="button">
        <i class="fas fa-sign-out-alt"></i></a>

    </div>
</nav>