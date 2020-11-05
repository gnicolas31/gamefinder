

    


    <!-- footer-section start -->
    <section class="footer-section bg bg_img" data-background="assets/images/footer-bg.png">
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
                      </div>
                    <div class="footer-bottom d-flex flex-wrap justify-content-between align-items-center">
                        <div class="footer-logo">
                            <a href="#0"><img src="assets/images/banner/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="copyright-area d-flex flex-wrap justify-content-between">
                        <div class="copyright-content">
                            <p>V0.2 - Copyright © <?php echo date(Y); ?>.<span data-i18n="copyright">All Rights Reserved By </span><a href="#">DeusSearch</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- footer-section end -->
    




<!-- jquery -->
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
<!-- wow js file -->
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/plugin.js"></script>
<!-- paroller js -->
<script src="assets/js/jquery.paroller.min.js"></script>
<!-- main -->
<script src="assets/js/main.js"></script>

<script>
    //////////
    // trick for the menu, set active the good one with the class page
    /////
    $( document ).ready(function() {
        $('.main-menu li[active_meta="<?php echo $class_page; ?>"]').addClass('active');
        $('video').each(function( index ) {
            $(this).get(0).play();
        });      
    });
</script>
</body>
</html>