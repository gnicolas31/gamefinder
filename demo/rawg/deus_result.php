<?php 
    $class_page = "deus";
    include 'connect.php';
    include 'header.php';
?>

 <!-- inner-banner-section start -->
 <section class="inner-banner-section inner-banner-section--style bg-overlay-black bg bg_img" data-background="assets/images/banner/<?php echo $header_banner_img; ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="inner-banner-content">
                        <h2 class="title">Resultat du Deus Search</h2>
                        <div class="breadcrumb-area">
                            <nav>
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"> <b>Cliquez sur les couvertures pour découvrir plus d'informations sur les jeux . </b></li>
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
                    <div class="contact-area deus_version">
                        <div class="contact-form-area">
                            <div class="row justify-content-center mb-30-none" id="deus_result">

                                <?php    
                            //         var_dump($_POST);

                                    // la function qui va me permettre de reverse les resultats de certaines questions (necessaire pour l'algo du big five)
                                    function reverse_big_five_result($val) {
                                        // si l'user a mis 1, je lui met 5, si 2 je met 4 si 3 je met 3
                                        if($val == 1) { $val = 5;}
                                        if($val == 2) { $val = 4;}
                                        if($val == 5) { $val = 1;}
                                        if($val == 4) { $val = 2;}
                                        return $val;
                                    }

                                    /// je retranscris les traits de caractères en types de jeux vidéos selon le travail de Jason VandenBerghe, designer chez Ubisoft
                                    $nouveaute_val[] = reverse_big_five_result($_POST['ouverture_val_1']);
                                    $nouveaute_val[] = $_POST['ouverture_val_2'];

                                    $challenge_val[] = reverse_big_five_result($_POST['conscencieux_val_1']);
                                    $challenge_val[] = $_POST['conscencieux_val_2'];

                                    $stimulation_val[] = reverse_big_five_result($_POST['extraversion_val_1']);
                                    $stimulation_val[] = $_POST['extraversion_val_2'];

                                    $harmonie_val[] = $_POST['agreabilite_val_1'];
                                    $harmonie_val[] = reverse_big_five_result($_POST['agreabilite_val_2']);

                                    $array_themes = $_POST['themes'];
                                    $id_platform = $_POST['platform'];
                                  //  $id_keyword = $_POST['keywords']

                                    // les 4 traits de recherches qui vont me faire trier les genres
                                    $nouveaute_reference = ($nouveaute_val[0]+$nouveaute_val[1]) / 2;
                                    $challenge_reference = ($challenge_val[0]+$challenge_val[1]) / 2;
                                    $stimulation_reference = ($stimulation_val[0]+$stimulation_val[1]) / 2;
                                    $harmonie_reference = ($harmonie_val[0]+$harmonie_val[1]) / 2;
                                    /// JE VAIS RECUPERER LES CATGORIES ET sortir un coefficient de ressemblance pour chacune d'entre elle
                             //       echo '<p>'.$nouveaute_reference .'-'.$challenge_reference.'-'.$stimulation_reference.'-'.$harmonie_reference.'</p>';
                                    $diff_totale = 0;
                                    $nbr_case_differentes = 0;
                                    $array_resultat_pertinence = array();
                                    $tableau_genres_final = '';
                                    $sql_first = "SELECT id,id_rawg,nouveaute,challenge,stimulation,harmonie,name_genre FROM ponderation_genres WHERE id_rawg !=0";
                                    $result_first = $conn->query($sql_first);

                                    $genre_tab;
                                    $string_tab;

                                  //  var_dump($result_first);

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
                                            $genre_tab[] = [$coeff_difference, $nbr_case_differentes, $genre['id_rawg'], $genre['name_genre']];
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
                                    }

                                    $today_timestamp = time();
                                ?>
                              
                                <script>
                                    connect_twitch();
                                </script>
                                <section class="col-lg-12">
                                    <p class="text-left deus_info"> Les jeux affichés ci dessous sont ceux qui correspondent le plus à votre personnalité, du moins, selon l'algo , cliquez pour plus d'infos !</p> <br />
                                    <h3 class="text-left"> Sortis ces 5 dernières années</h3> <hr />
                                    <row class="row col-lg-12" id="lastfiveyears">
                                        <script>
                                            do_the_deus_magic("<?php echo $genre_tab[0][2]; ?>", <?php echo json_encode($array_themes); ?>, <?php echo $id_platform; ?>, <?php echo $today_timestamp; ?>, 1451606400 ,'lastfiveyears', 12,1);
                                        </script>
                                    </row>
                                </section>
                                <section  class="col-lg-12">
                                    <h3 class="text-left"> Sortis il y a 5 à 10 ans </h3> <hr />
                                    <row class="row col-lg-12" id="fivetotenyears">
                                        <script>
                                            do_the_deus_magic("<?php echo $genre_tab[0][2]; ?>", <?php echo json_encode($array_themes); ?>, <?php echo $id_platform; ?>,1451606400, 1262304000 ,'fivetotenyears',6,0);
                                        </script>
                                    </row>
                                </section>
                                
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