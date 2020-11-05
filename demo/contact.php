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
                        <h2 class="title" data-i18n="contact_title">Nous contacter</h2>
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
                            <h3 data-i18n="contact_sub_title" class="sub-title">Besoin d'aide ?</h3>
                            <h2 data-i18n="contact_title_how_to" class="title">Contactez-nous</h2>
                            <p data-i18n="contact_explain">Nous répondons rapidement et serons ravis de traiter vos demandes, ce formulaire est la pour toi !</p>
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
                                            <label data-i18n="contact_name_field">Nom de contact<span>*</span></label>
                                            <input type="text" name="name" required placeholder="Ex : Delprat Vincent, ..">
                                        </div>
                                        <div class="col-lg-12 form-group text-left">
                                            <label data-i18n="contact_email_field">E-mail<span>*</span></label>
                                            <input type="email" name="email" required placeholder="E-mail de contact">
                                        </div>
                                        <div class="col-lg-12 form-group text-left">
                                            <label data-i18n="contact_subject_field">Sujet <span>*</span></label>
                                            <input type="text" name="subject" required placeholder="Sujet du message">
                                        </div>
                                        <div class="col-lg-12 form-group text-left">
                                            <label data-i18n="contact_message_field">Message<span>*</span></label>
                                            <textarea required  name="message" placeholder="Message du mail"></textarea>
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

<?php     
    include 'footer.php';
?>