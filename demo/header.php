<!DOCTYPE html>
<?php 
    $current_language = 'fr';
    if($_COOKIE['language_deussearch'] != NULL) {
        $current_language = $_COOKIE['language_deussearch'];
    };
?>
<html lang="<?php echo $current_language; ?>"  dir="ltr">
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
    <!-- <script src="i18n/CLDRPluralRuleParser.js"></script>
    <script src="i18n/jquery.i18n.js"></script>
    <script src="i18n/jquery.i18n.messagestore.js"></script>
    <script src="i18n/jquery.i18n.fallbacks.js"></script>
    <script src="i18n/jquery.i18n.language.js"></script>
    <script src="i18n/jquery.i18n.parser.js"></script>
    <script src="i18n/jquery.i18n.emitter.js"></script>
    <script src="i18n/jquery.i18n.emitter.bidi.js"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="deussearch.js"></script>
    <meta property="og:image" content="https://deussearch.fr/assets/images/banner/banner.png" />
    <meta name="theme-color" content="#171744" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XGNBVJEK2R"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-XGNBVJEK2R');
    </script>
</head>
<body class="<?php echo $class_page; ?>">
    <?php 
        $search_word = 'Je recherche _';
        if($_GET['s']) {
            $search_word = $_GET['s'];
        }
        $header_banner_img = "header_dofus.png";
    ?>

    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div><!-- /preloader-icon -->
        <div id="deus_loader"><span></span></div>
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
                            <a class="site-logo site-title" href="index.php"><img src="assets/images/banner/logo.png" alt="site-logo"></a>
                        </div>
                        <div class="header-right d-flex flex-wrap align-items-center">
                            <div class="language-select-list d-flex flex-wrap">
                                <div class="language-thumb">
                                    <img src="assets/images/lang.png" alt="language">
                                </div>
                                <div class="language-select">
                                    <select class="select-bar">
                                        <option value="1">Languages</option>
                                        <option>Francais</option>
                                      <!--  <option>English</option>-->
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo site-title d-lg-none" href="index.php"><img src="assets/images/banner/logo.png" alt="site-logo"></a>
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu">
                                <li active_meta="home"><a href="index.php" data-i18n="homepage">Accueil</a></li>
                                <li class="deus_class" active_meta="deus"><a href="deus.php">Deus Search</a></li>
                                <!-- <li class="menu_has_children"><a href="#0">Les jeux</a>  
                                    <ul class="sub-menu">
                                        <li><a href="#">Par catégories</a></li>
                                        <li><a href="#">Par consoles</a></li>
                                        <li active_meta="deus"><a href="#">Deus Search </a></li>
                                    </ul>
                                <li class="menu_has_children"><a href="#">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Articles</a></li>
                                    </ul>
                                </li>
                                <li><a href="#0">A propos</a></li> -->
                                <li active_meta="contact"><a href="contact.php">Contact</a></li>
                            </ul>                 
                        </div>
                        <div class="header-search-bar">
                        <!--    <form method="get" action="search_result.php">
                           <form method="get" action="#">
                                <input type="text" name="s" placeholder="<?php echo $search_word; ?>">
                                <button class="header-search-btn"><i class="fas fa-search"></i></button>
                            </form>
    -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->