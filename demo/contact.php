<?php 
    $class_page = "contact";
    include 'header.php';
?>
    <!-- inner-banner-section start -->
    <section class="inner-banner-section inner-banner-section--style bg-overlay-black bg bg_img" data-background="assets/images/<?php echo $header_banner_img; ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="inner-banner-content">
                        <h2 class="title">Contact Us</h2>
                        <div class="breadcrumb-area">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index-1.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- inner-banner-section end -->


    <!-- contact-section-start -->
    <section class="contact-section bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="contact-area">
                        <div class="contact-header">
                            <h3 class="sub-title">Besoin d'aide ?</h3>
                            <h2 class="title">Contactez-nous</h2>
                            <p>Nous répondons rapidement et serons ravis de traiter vos demandes, ce formulaire est la pour vous !</p>
                        </div>
                        <div class="contact-form-area">
                            <?php 
                            if($_GET) {
                                $sujet = $_GET['subject'];
                                $name = $_GET['name'];
                                $email = $_GET['email'];
                                $message = 'De :'.$name.' - '.$email.':'.$_GET['message'];
                                mail( 'contact@deussearch.fr' , $sujet , $message );
                                echo '<div class="deus_info success"> Le mail a bien été envoyé.</div>';
                            } else {
                            ?>
                                <form class="contact-form" action="contact.php" method="get">
                                    <div class="row">
                                        <div class="col-lg-12 form-group text-left">
                                            <label>Nom de contact<span>*</span></label>
                                            <input type="text" name="name" required placeholder="Ex : Delprat Vincent, ..">
                                        </div>
                                        <div class="col-lg-12 form-group text-left">
                                            <label>E-mail<span>*</span></label>
                                            <input type="email" name="email" required placeholder="E-mail de contact">
                                        </div>
                                        <div class="col-lg-12 form-group text-left">
                                            <label>Sujet <span>*</span></label>
                                            <input type="text" name="subject" required placeholder="Sujet du message">
                                        </div>
                                        <div class="col-lg-12 form-group text-left">
                                            <label>Message<span>*</span></label>
                                            <textarea required placeholder="Message du mail"></textarea>
                                        </div>
                                        <div class="col-lg-12 form-group text-center">
                                            <input type="submit" class="cmn-btn" value="Envoyer">
                                        </div>
                                    </div>
                                </form>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section-end -->


    <!-- contact-item-section start -->
    <section class="contact-section bg pt-120 pb-120">
        <div class="container">
            <div class="row mb-30-none">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                    <div class="contact-item text-center">
                        <div class="contact-item-icon">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                        <h3 class="title">130k</h3>
                        <span class="sub-title">Followers</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                    <div class="contact-item text-center">
                        <div class="contact-item-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="title">35k</h3>
                        <span class="sub-title">Members</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                    <div class="contact-item text-center">
                        <div class="contact-item-icon">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <h3 class="title">47k</h3>
                        <span class="sub-title">Followers</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                    <div class="contact-item text-center">
                        <div class="contact-item-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="title">291k</h3>
                        <span class="sub-title">Subscribers</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-item-section end -->
<?php     
    include 'footer.php';
?>