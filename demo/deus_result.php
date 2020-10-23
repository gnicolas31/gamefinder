<?php 
    $class_page = "deus";
    include 'header.php';
?>

 <!-- inner-banner-section start -->
 <section class="inner-banner-section inner-banner-section--style bg-overlay-black bg bg_img" data-background="assets/images/banner/inner.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="inner-banner-content">
                        <h2 class="title">Resultat du Deus Search</h2>
                        <div class="breadcrumb-area">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index-1.html">DEUS SEAAAARCH</a></li>
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
                        <div class="contact-form-area">
                            <div class="row justify-content-center mb-30-none" id="deus_result">

                                <?php    
                                   $array_genres = $_POST['genres'];
                                    $array_themes = $_POST['themes'];
                                    $id_platform = $_POST['platform'];
                                  //  $id_keyword = $_POST['keywords']
                                ?>
                                <h2> Résultats de la recherche : </h2>
                                <script>
                                    do_the_deus_magic(<?php echo json_encode($array_genres); ?>, <?php echo json_encode($array_themes); ?>, <?php echo $id_platform; ?>);
                                </script>
                            </div>
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