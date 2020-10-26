<?php 
    $class_page = "search_result";
    include 'connect.php';
    include 'header.php';
    $search_value = $_GET['s']; 
?>
    <!-- inner-banner-section start -->
    <section class="inner-banner-section bg-overlay-black bg bg_img" data-background="assets/images/banner/inner.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="inner-banner-content">
                        <h2 class="title">Recherche pour : <?php echo $search_value; ?></h2>
                        <div class="breadcrumb-area">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- inner-banner-section end -->

    <!-- game-section start -->
    <section class="game-section bg pt-120 pb-120" id="game">
        <div class="game-inner"></div>
        <div class="container">
            <div class="row justify-content-center mb-30-none" id="search_result">
                <script>
                    search_games('<?php echo $search_value; ?>', '#search_result');
                </script>
            </div>
            <div class="row justify-content-center mt-60">
                <div class="game-footer-btn">
                    <a href="#0" class="cmn-btn-border">Browse More Games </a>
                </div>
            </div>
        </div>
    </section>
    <!-- game-section end -->

    <!-- play-section start -->
    <section class="play-section bg pt-120 pb-120">
        <div class="container-fluid p-xl-0">
            <div class="row m-0">
                <div class="col-xl-6 pl-0">
                    <div class="w-100 h-100 bg_img" data-background="assets/images/play/play.png">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <div class="section-header">
                                        <h3 class="sub-title"></h3>
                                        <h2 class="section-title">Jeux du moments</h2>
                                        <p>Découvrez les jeux qui sont actuellement populaires auprès des joueurs sans avoir à chercher.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 pr-0">
                    <div class="play-item-area pt-120 pb-120">
                        <div class="bal-thumb bg_img d-xl-none" data-background="./assets/css/img/circle.png">
                        </div>
                        <div class="play-wrapper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="play-post-thumb">
                                        <img src="assets/images/play/play-1.jpg" alt="play">
                                        <div class="play-thumb-overlay">
                                            <div class="play-overlay-content">
                                                <h3 class="title">Moto Racing 3d</h3>
                                                <p>Run 20,000 meters</p>
                                            </div>
                                            <div class="play-overlay-footer">
                                                <span class="sub-title">Player Signed</span>
                                                <div class="play-sign-area d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="sign-thumb">
                                                        <a href="#0"><img src="assets/images/play/sign.png" alt="sign"></a>
                                                    </div>
                                                    <div class="sign-btn">
                                                        <a href="#0"><i class="fas fa-long-arrow-alt-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="play-post-thumb">
                                        <img src="assets/images/play/play-2.jpg" alt="play">
                                        <div class="play-thumb-overlay">
                                            <div class="play-overlay-content">
                                                <h3 class="title">Battlelands Royale</h3>
                                                <p>Eliminate 10 opponents</p>
                                            </div>
                                            <div class="play-overlay-footer">
                                                <span class="sub-title">Player Signed</span>
                                                <div class="play-sign-area d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="sign-thumb">
                                                        <a href="#0"><img src="assets/images/play/sign.png" alt="sign"></a>
                                                    </div>
                                                    <div class="sign-btn">
                                                        <a href="#0"><i class="fas fa-long-arrow-alt-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="play-post-thumb">
                                        <img src="assets/images/play/play-3.jpg" alt="play">
                                        <div class="play-thumb-overlay">
                                            <div class="play-overlay-content">
                                                <h3 class="title">Extreme Battles</h3>
                                                <p>Eliminate 10 opponents</p>
                                            </div>
                                            <div class="play-overlay-footer">
                                                <span class="sub-title">Player Signed</span>
                                                <div class="play-sign-area d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="sign-thumb">
                                                        <a href="#0"><img src="assets/images/play/sign.png" alt="sign"></a>
                                                    </div>
                                                    <div class="sign-btn">
                                                        <a href="#0"><i class="fas fa-long-arrow-alt-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- play-section end -->

    <!-- footer-section start -->
    <section class="footer-section bg bg_img" data-background="assets/images/footer-bg.png">
        <div class="footer-element">
            <a href="tel:123456789"><img src="assets/images/phone.png" alt="phone"></a>
        </div>
        <div class="footer-element-one">
            <img src="assets/images/footer/footer-element-one.png" alt="element">
        </div>
        <div class="footer-element-two">
            <img src="assets/images/footer/footer-element-two.png" alt="element">
        </div>
        <div class="footer-element-three">
            <img src="assets/images/footer/line1.png" alt="element">
        </div>
        <div class="footer-element-four">
            <img src="assets/images/footer/line1.png" alt="element">
        </div>
        <div class="footer-element-five">
            <img src="assets/images/footer/line9.png" alt="element">
        </div>
        <div class="footer-element-six">
            <img src="assets/images/footer/line9.png" alt="element">
        </div>
        <div class="footer-element-seven">
            <img src="assets/images/footer/line3.png" alt="element">
        </div>
        <div class="footer-element-eight">
            <img src="assets/images/footer/line5.png" alt="element">
        </div>
        <div class="footer-element-nine">
            <img src="assets/images/footer/line5.png" alt="element">
        </div>
        <div class="footer-element-ten">
            <img src="assets/images/footer/line5.png" alt="element">
        </div>
        <div class="footer-element-eleven">
            <img src="assets/images/footer/line5.png" alt="element">
        </div>
        <div class="footer-element-twelve">
            <img src="assets/images/footer/line5.png" alt="element">
        </div>
        <div class="footer-element-thirteen">
            <img src="assets/images/footer/manyline.png" alt="element">
        </div>
        <div class="footer-element-fourteen">
            <img src="assets/images/footer/line5.png" alt="element">
        </div>
        <div class="footer-element-fifteen">
            <img src="assets/images/footer/line5.png" alt="element">
        </div>
        <div class="footer-element-sixteen">
            <img src="assets/images/footer/line5.png" alt="element">
        </div>
        <div class="footer-element-seventeen">
            <img src="assets/images/footer/circle3.png" alt="element">
        </div>
        <div class="footer-shape">
            <img src="assets/images/footer/dotline.png" alt="element">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-content">
                        <h3 class="sub-title">Pour avoir toutes les informations avant les autres ?</h3>
                        <h2 class="title">Rejoignez-vous</h2>
                        <form class="footer-form">
                            <input type="email" name="email" placeholder="Your Email Address">
                            <input type="submit" class="cmn-btn" value="Subscribe">
                        </form>
                        <p>Nous respectons la vie privée.</p>
                    </div>
                    <div class="footer-bottom d-flex flex-wrap justify-content-between align-items-center">
                        <div class="footer-logo">
                            <a href="#0"><img src="assets/images/banner/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="copyright-area d-flex flex-wrap justify-content-between">
                        <div class="copyright-content">
                            <p>Copyright © 2019.All Rights Reserved By <a href="#">Medforce</a></p>
                        </div>
                        <ul class="blog-social">
                            <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#0" class="active"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#0"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#0"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#0"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- footer-section end -->
    



<!-- migarate-jquery -->
<script src="assets/js/jquery-migrate-3.0.0.js"></script>
<!-- bootstrap js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- magnific-popup js -->
<script src="assets/js/jquery.magnific-popup.js"></script>
<!-- isotope -->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!-- nice-select js-->
<script src="assets/js/jquery.nice-select.js"></script>
<!-- swipper js -->
<script src="assets/js/swiper.min.js"></script>
<!-- waypoints js link -->
<script src="assets/js/jquery.waypoints.min.js"></script>
<!-- counterup js -->
<script src="assets/js/jquery.counterup.min.js"></script>
<!-- datepicker js -->
<script src="assets/js/datepicker.min.js"></script>
<!-- datepicker js -->
<script src="assets/js/datepicker.en.js"></script>
<!-- viewport js -->
<script src="assets/js/viewport.jquery.js"></script>
<!-- odometer js -->
<script src="assets/js/odometer.min.js"></script>
<!-- map js -->
<script src="assets/js/jquery.vmap.min.js"></script>
<script src="assets/js/jquery.vmap.world.js"></script>
<!-- wow js file -->
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/plugin.js"></script>
<!-- paroller js -->
<script src="assets/js/jquery.paroller.min.js"></script>
<!-- main -->
<script src="assets/js/main.js"></script>

<script>
    jQuery(document).ready(function () {
        jQuery('#vmap').vectorMap({
            map: 'world_en',
            color: '#2a3e72',
            backgroundColor: 'transparent',
            hoverOpacity: .8,
            selectedColor: '#ffca24',
            scaleColors: ['#f7fcff', '#f7fcff'],
            normalizeFunction: 'polynomial'
        });
    });
</script>


</body>
</html>
