<?php 
    $class_page = "deus";
    include 'connect.php';
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
                                    $array_themes = $_POST['themes'];
                                    $id_platform = $_POST['platform'];
                                  //  $id_keyword = $_POST['keywords']

                                    // les 4 traits de recherches qui vont me faire trier les genres
                                    $nouveaute_reference = $_POST['qual1'];
                                    $challenge_reference = $_POST['qual2'];
                                    $stimulation_reference = $_POST['qual3'];
                                    $harmonie_reference = $_POST['qual4'];
                                    
                                    /// JE VAIS RECUPERER LES CATGORIES ET sortir un coefficient de ressemblance pour chacune d'entre elle

                                    $diff_totale = 0;
                                    $nbr_case_differentes = 0;
                                    $array_resultat_pertinence = array();
                                    $tableau_genres_final = '';
                                    $sql_first = "SELECT id,id_igdb,nouveaute,challenge,stimulation,harmonie,name_genre FROM ponderation_genres";
                                    $result_first = $conn->query($sql_first);

                                    $genre_tab;
                                    $string_tab;


                                    if ($result_first->num_rows > 0) {
                                        // pour chaque genre enregistré en bdd
                                        foreach($result_first as $genre) {
                                            $indicateur_de_difference = 0;
                                            $genre_nouveaute = $genre['nouveaute'];
                                            if( $nouveaute_reference > $genre_nouveaute) {
                                                $indicateur_de_difference += ($nouveaute_reference - $genre_nouveaute);
                                            } 
                                            if( $nouveaute_reference < $genre_nouveaute) {
                                                $indicateur_de_difference += ($genre_nouveaute - $nouveaute_reference);
                                            }
                                            if($genre_nouveaute != $nouveaute_reference) {
                                                $nbr_case_differentes++;
                                            }
                                            ////
                                            // je calcule la difference sur la case challenge
                                            $genre_challenge = $genre['challenge'];
                                            if( $challenge_reference > $genre_challenge) {
                                                $indicateur_de_difference += ($challenge_reference - $genre_challenge);
                                            } 
                                            if( $challenge_reference < $genre_challenge) {
                                                $indicateur_de_difference += ($genre_challenge - $challenge_reference);
                                            }
                                            if($genre_challenge != $challenge_reference) {
                                                $nbr_case_differentes++;
                                            }


                                            ////
                                            // je calcule la difference sur la case stimulation
                                            $genre_stimulation = $genre['stimulation'];
                                            if( $stimulation_reference > $genre_stimulation) {
                                                $indicateur_de_difference += ($challenge_reference - $genre_stimulation);
                                            } 
                                            if( $stimulation_reference < $genre_stimulation) {
                                                $indicateur_de_difference += ($genre_stimulation - $stimulation_reference);
                                            }
                                            if($genre_stimulation != $stimulation_reference) {
                                                $nbr_case_differentes++;
                                            }
                                            ////
                                            // je calcule la difference sur la case harmonie
                                            $genre_harmonie = $genre['harmonie'];
                                            if( $harmonie_reference > $genre_harmonie) {
                                                $indicateur_de_difference += ($harmonie_reference - $genre_harmonie);
                                            } 
                                            if( $harmonie_reference < $genre_harmonie) {
                                                $indicateur_de_difference += ($genre_harmonie - $harmonie_reference);
                                            }
                                            if($genre_harmonie != $harmonie_reference) {
                                                $nbr_case_differentes++;            
                                            }    

                                            // je set le coeff a 0 si le nbre de casse diff est a 0, sinon le coeff sera NaN
                                            if($nbr_case_differentes == 0) {
                                                $coeff_difference = 0;
                                            } else {
                                                $coeff_difference = $indicateur_de_difference/$nbr_case_differentes;
                                            }
                                            /// je fais un tableau de tous les genres avec 3 valeurs : le coeff de diff, le nbr de cases diff et l'id du genre
                                            $genre_tab[] = [$coeff_difference, $nbr_case_differentes, $genre['id_igdb'], $genre['name_genre']];
                                            // je reset le nbr de cases diff pour le genre suivant
                                            $nbr_case_differentes = 0;
                                        }

                                        // Obtient une liste de colonnes
                                        foreach ($genre_tab as $key => $row) {
                                            $indic_diff[$key]  = $row[0];
                                            $nb_cases[$key] = $row[1];
                                        }
                                        $indic_diff  = array_column($genre_tab, 0);
                                        $nb_cases = array_column($genre_tab, 1);
                                        array_multisort($indic_diff, SORT_ASC, $nb_cases, SORT_ASC, $genre_tab);
                                        $i = 0;
                                        $tring_genre = '';

                                        foreach($genre_tab as $genre_trie) { 
                                       //     echo $genre_trie[3]. ' - '.$genre_trie[0]. 'avec'.$genre_trie[1].'cases de diff <br />';
                                            ///// $genre_trie[0] = coeff de diff
                                            //echo $genre_trie[0];
                                            //// $genre_trie[1] = nbr cases diff
                                            ///// $genre_trie[2] = id du genre
                                            $string_tab[$i] = $genre_trie[2];
                                            ///// $genre_trie[3] = LE NOM DU GENRE
                                        // echo $genre_trie[3];
                                            $i++;
                                        }        
                                    }

                                    $today_timestamp = time();
                                    ?>
                                <!-- <row class="row col-lg-12">
                                    <ul>
                                        <li>Nouveauté : <?php// echo $nouveaute_reference; ?></li>
                                        <li>challenge : <?php //echo $challenge_reference; ?></li>
                                        <li>stimulation : <?php //echo $stimulation_reference; ?></li>
                                        <li>harmonie : <?php //echo $harmonie_reference; ?></li>
                                    </ul>
                                </row> -->
                                <script>
                                    connect_twitch();
                                </script>
                                <h3> meilleurs jeux cette année </h3> <hr />
                                <row class="row col-lg-12" id="thisyear">
                                    <script>
                                        do_the_deus_magic("<?php echo implode(',',array_slice($string_tab,0,2)); ?>", <?php echo json_encode($array_themes); ?>, <?php echo $id_platform; ?>, <?php echo $today_timestamp; ?>, 1577836800 ,'thisyear');
                                    </script>
                                </row>
                                <h3> il y a 1 à 5 ans </h3> <hr />
                                <row class="row col-lg-12" id="onetofiveyears">
                                    <script>
                                       do_the_deus_magic("<?php echo implode(',',array_slice($string_tab,0,3)); ?>", <?php echo json_encode($array_themes); ?>, <?php echo $id_platform; ?>, 1577836800, 1451606400 , 'onetofiveyears' );
                                    </script>
                                </row>
                                <h3> il y a 5 à 10 ans </h3> <hr />
                                <row class="row col-lg-12" id="fivetotenyears">
                                    <script>
                                       do_the_deus_magic("<?php echo implode(',',array_slice($string_tab,0,3)); ?>", <?php echo json_encode($array_themes); ?>, <?php echo $id_platform; ?>,1451606400, 1262304000 ,'fivetotenyears');
                                    </script>
                                </row>
                                
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