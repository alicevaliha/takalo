<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado Takalo</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo site_url() ?>assets/website/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/website/css/core-style.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/website/style.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="<?php echo base_url('user/research')?>" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <select name="categorie" id="categorie">
                                <option value="">choisir votre categorie</option>
                                <?php if(isset($categories))  {  ?>
                                    <?php foreach($categories as $cat) { ?>
                                        <option value="<?php echo $cat['id_categorie']?>"><?php echo $cat['nom_categorie']?></option>
                                    <?php }
                                    ?>
                                <?php }
                                ?>

                            </select>
                            <button type="submit"><img src="<?php echo site_url() ?>assets/website/img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="<?php echo site_url() ?>assets/website/img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo base_url('user/index')?>"><img src="<?php echo site_url() ?>assets/website/img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="#"><a href="<?php echo base_url('user/index')?>">Home</a></li>
                    <li><a href="<?php echo base_url('user/utilisateurs')?>">Utilisateurs</a></li>
                    <li><a href="<?php echo base_url('user/propositions')?>">Propositions</a></li>
                </ul>
            </nav>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="#" class="search-nav"><img src="<?php echo site_url() ?>assets/website/img/core-img/search.png" alt=""> Search</a>
            </div>
        </header>
        <!-- Header Area End -->