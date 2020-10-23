<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deus Search - Le moteur de recherche des jeux vidéos</title>
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <!-- flaticon css -->
    <link rel="stylesheet" href="assets/font/flaticon.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- nice-select css -->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- swipper css link -->
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/banner/fav.png" type="image/x-icon">
    <!-- animate.css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- datepicker.css -->
    <link rel="stylesheet" href="assets/css/datepicker.min.css">
    <!-- odometer css -->
    <link rel="stylesheet" href="assets/css/odometer.css">
    <!-- main style css link -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- responsive css link -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="deussearch.js"></script>

</head>
<body class="<?php echo $class_page; ?>">
    <?php 
        $search_word = 'Je recherche _';
        if($_GET['s']) {
            $search_word = $_GET['s'];
        }
    ?>

    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div><!-- /preloader-icon -->
        </div><!-- /preloader-inner -->
    </div><!-- /preloader -->

    <div class="cursor"></div>


    <!-- header-section start -->
    <header class="header-section">
        <div class="header">
            <div class="header-top-area">
                <div class="container">
                    <div class="header-top-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="header-logo">
                            <a class="site-logo site-title" href="index.html"><img src="assets/images/banner/logo.png" alt="site-logo"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo site-title d-lg-none" href="index.html"><img src="assets/images/banner/logo.png" alt="site-logo"></a>
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu">
                                <li active_meta="home"><a href="index.php">Accueil</a></li>
                                <li class="deus_class" active_meta="deus"><a href="deus.php">Deus Search</a></li>
                                <li class="menu_has_children"><a href="#0">Les jeux</a>  
                                    <ul class="sub-menu">
                                        <li><a href="categories.php">Par catégories</a></li>
                                        <li><a href="blog.html">Par consoles</a></li>
                                        <li active_meta="deus"><a href="blog.html">Deus Search </a></li>
                                    </ul>
                                <li class="menu_has_children"><a href="#0">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Articles</a></li>
                                    </ul>
                                </li>
                                <li><a href="#0">A propos</a></li>
                                <li active_meta="contact"><a href="contact.php">Contact</a></li>
                            </ul>                 
                        </div>
                        <div class="header-search-bar">
                            <form method="get" action="search_result.php">
                                <input type="text" name="s" placeholder="<?php echo $search_word; ?>">
                                <button class="header-search-btn"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->
