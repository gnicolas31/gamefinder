<?php 
    $class_page = "deus";
    include 'connect.php';
    include 'header.php';
?>

 <!-- inner-banner-section start -->
 <section class="inner-banner-section inner-banner-section--style bg-overlay-black bg bg_img" data-background="assets/images/<?php echo $header_banner_img; ?>">
        <div class="container">
            
        </div>
    </section>
    <!-- inner-banner-section end -->

    <!-- contact-section-start -->
    <section class="contact-section bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="contact-area deus_version deus_bloc">
                        <div class="contact-form-area">
                            <div class="row justify-content-center mb-30-none" id="deus_result">

                                <?php 
                                    ////
                                    /// FUNCTIONS GOES HERE
                                    //////
                                        // la function qui va me permettre de reverse les resultats de certaines questions (necessaire pour l'algo du big five)
                                        function reverse_big_five_result($val) {
                                            // si l'user a mis 1, je lui met 5, si 2 je met 4 si 3 je met 3
                                            if($val == 1) { $val = 5;}
                                            if($val == 2) { $val = 4;}
                                            if($val == 5) { $val = 1;}
                                            if($val == 4) { $val = 2;}
                                            return $val;
                                        }
                                    
                                    /////
                                    // ALGO GOES HERE
                                    //////
                                        // RECUPERATION DU FORMULAIRE ET CALCUL DES DONEES DE REFERENCE
                                        /////
                                            // RECUPERATION DES MOTS CLES
                                            //////
                                            foreach(explode(",", $_POST['mode_id']) as $mode) {
                                                $config[] = $mode;
                                            }
                                            $config[] = $_POST['graphic_id'];
                                            $config[] = $_POST['colorimetrie_id'];
                                            $config[] = $_POST['univers_id'];
                                            $config[] = $_POST['rythme_id'];
                                            $config[] = $_POST['imme_graph_id'];
                
                                            $keywords = [];
                                            foreach ($config as $keyword) {
                                                if($keyword != NULL) {
                                                    $keywords[] =$keyword;
                                                }
                                            }
                                            // RECUPERATIONS TRAITS DE VALEURS PERSONNALITE ET CALCUL DES VALEURS DE REFERENCE
                                            /////
                                            $nouveaute_val[] = reverse_big_five_result($_POST['ouverture_val_1']);
                                            $nouveaute_val[] = $_POST['ouverture_val_2'];
                                            $nouveaute_reference = ($nouveaute_val[0]+$nouveaute_val[1]) / 2;
                                            
                                            $challenge_val[] = reverse_big_five_result($_POST['conscencieux_val_1']);
                                            $challenge_val[] = $_POST['conscencieux_val_2'];
                                            $challenge_reference = ($challenge_val[0]+$challenge_val[1]) / 2;

                                            $stimulation_val[] = reverse_big_five_result($_POST['extraversion_val_1']);
                                            $stimulation_val[] = $_POST['extraversion_val_2'];
                                            $stimulation_reference = ($stimulation_val[0]+$stimulation_val[1]) / 2;

                                            $harmonie_val[] = $_POST['agreabilite_val_1'];
                                            $harmonie_val[] = reverse_big_five_result($_POST['agreabilite_val_2']);
                                            $harmonie_reference = ($harmonie_val[0]+$harmonie_val[1]) / 2;
 
                                            // RECUPERATION DE LA PLATEFORME
                                            ///////
                                            $id_platform = $_POST['platform'];
                                            $array_themes = $_POST['themes'];

                                        // SELECTION DE TOUS LES GENRES EN VUE DU CALCUL DU COEFFICIENT DE CHACUNS COMPARE AUX DONNEES DE REFERENCE
                                        /////
                                            // INITIALISATIONS DES DONNEES AVANT LA BOUCLE
                                            /////
                                                $nbr_case_differentes = 0; // Nombre de cases differentes par genres
                                                $genre_tab;                // tableau me recuperant l'ensemble des genres avec le coefficient, leur nom, leur id etc
                                                $genres_inclus_string;     // La ou seront stockées les genres qui conviennent
                                                $today_timestamp = time(); // La date d'aujourd'hui , utilisée en appel js pour ne pas chercher des jeux du futur


                                            // PREPARATION & REQUETE POUR RECUPERER TOUS LES GENRES
                                            //////
                                                $sql_first = "SELECT id,id_rawg,nouveaute,challenge,stimulation,harmonie,name_genre FROM ponderation_genres WHERE id_rawg > 0";
                                                $result_first = $conn->query($sql_first);

                                            // DEBUT DE LA BOUCLE SUR TOUS LES GENRES
                                            //////
                                            if ($result_first->num_rows > 0) {
                                                    // INITIALISATIONS DES DONNEES POUR LE CALCUL DU COEFFICIENT MOYEN
                                                    /////
                                                    $total_coeff_de_diff = 0; // sers de coefficient total, qui sera divisé par le nombre de genres pour avoir le coeeficient moyen
                                                    foreach($result_first as $genre) {
                                                        // INITIALISATION DES DONNEES POUR CHACUN DES GENRES
                                                        $indicateur_de_difference = 0; // servira a calculer la différence ajoutée des 4 axes
                                                        $nbr_case_differentes = 0; // Le nombre de cases différentes, qui sera le diviseur de la différences ajoutées des 4 axes
                                                            // ALGO POUR L'INDICE DE MESURE 1 : NOUVEAUTE
                                                            ///// un simple calcul de difference entre les deux valeurs, et ajout du nombre de cases différentes afin de calculer le coefficient
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
                                                            
                                                            // ALGO POUR L'INDICE DE MESURE 1 : CHALLENGE
                                                            ///// un simple calcul de difference entre les deux valeurs, et ajout du nombre de cases différentes afin de calculer le coefficient
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


                                                            // ALGO POUR L'INDICE DE MESURE 1 : STIMULATION
                                                            ///// un simple calcul de difference entre les deux valeurs, et ajout du nombre de cases différentes afin de calculer le coefficient
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

                                                            // ALGO POUR L'INDICE DE MESURE 1 : HARMONIE
                                                            ///// un simple calcul de difference entre les deux valeurs, et ajout du nombre de cases différentes afin de calculer le coefficient
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
                                                            $total_coeff_de_diff += $coeff_difference;
                                                        }
                                                        /// je fais un tableau de tous les genres avec 3 valeurs : le coeff de diff, le nbr de cases diff et l'id du genre
                                                        $genre_tab[] = [$coeff_difference, $nbr_case_differentes, $genre['id_rawg'], $genre['name_genre']];
                                                        // je reset le nbr de cases diff pour le genre suivant
                                                        $nbr_case_differentes = 0;
                                                    }

                                                // je calcule mam oyenne coeff totale
                                                $total_coeff_de_diff_moyenne = $total_coeff_de_diff / 16;
                                                // Obtient une liste de colonnes
                                                foreach ($genre_tab as $key => $row) {
                                                    $indic_diff[$key]  = $row[0];
                                                    $nb_cases[$key] = $row[1];
                                                }
                                                $indic_diff  = array_column($genre_tab, 0);
                                                $nb_cases = array_column($genre_tab, 1);
                                                array_multisort($indic_diff, SORT_ASC, $nb_cases, SORT_ASC, $genre_tab);
                                            
                                                $limit_genre = 3;
                                                if($id_platform != 6 ) {
                                                    $limit_genre = 5;
                                                }

                                                // j'add 20% ai coeff pour de la marge 
                                                $limite_coeff_exclusion = $total_coeff_de_diff_moyenne+(($total_coeff_de_diff_moyenne / 100)*50);   
                                            }
                                ?>

                                <!-- Display Graph -->
                                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
                                <div class="deus_canvas col-lg-12">
                                    <h2 class="text-left"> Votre profil </h2> 
                                    <canvas id="myChart" width="770" height="250"></canvas>
                                    <section class="deus_meta_infos text-left">
                                        <div>
                                            <span> Genres recommandés </span>
                                            <ul class="deus_result_genres_sim">
                                                <?php 
                                                $i = 0;
                                                $nb_genres_ok = 0;
                                                foreach($genre_tab as $genre_trie) { 
                                                        ///// $genre_trie[0] = coeff de diff
                                                        //echo $genre_trie[0];
                                                        //// $genre_trie[1] = nbr cases diff
                                                        ///// $genre_trie[2] = id du genre
                                                        // je prend les jeux des 8 premiers genres
                                                        if($nb_genres_ok < 2) {
                                                            $nb_genres_ok++;
                                                            $genres_inclus_string[$i] = $genre_trie[2];
                                                            echo '<li class="text-center li-deus_result_genres">'.$genre_trie[3].'</li>';
                                                        } 
                                                        ///// $genre_trie[3] = LE NOM DU GENRE
                                                    // echo $genre_trie[3];
                                                    $i++;
                                                }   
                                                ?>
                                            </ul>
                                        </div>
                                        <div>
                                            <?php
                                            if($config[0] > 0) {
                                            ?>
                                                <span> Mots clés recommandés </span>
                                                <ul class="deus_result_genres_sim">
                                                    <?php 
                                                    include('connect.php');
                                                    foreach($config as $tag) {
                                                        if($tag != '') {
                                                            $get_Tag_searched_name = "SELECT tag_name FROM tags_rawg WHERE id_rawg = '".$tag."' LIMIT 1";
                                                            $get_Tag_searched_name2 = $conn->query($get_Tag_searched_name);
            
                                                            if ($get_Tag_searched_name2->num_rows > 0) {
                                                                foreach($get_Tag_searched_name2 as $tag_name) {
                                                                    echo '<li class="text-center li-deus_result_genres">'.$tag_name['tag_name'].'</li>';
                                                                }
                                                            }   
                                                        } 
                                                    }
                                                    ?>
                                                </ul>
                                            <?php 
                                            }
                                            ?>
                                        </div>
                                    </section>
                                </div>
                                <script>
                                    //// 
                                    // pie chart at deus result

                                    var ctx = document.getElementById("myChart");
                                    var myChart = new Chart(ctx, {
                                    type: 'horizontalBar',
                                    data: {
                                        labels: ['Découverte', 'Challenge', 'Stimulation', 'Immersion'],
                                        datasets: [{
                                            data: [ <?php echo $nouveaute_reference; ?>,  <?php echo $challenge_reference; ?>,  <?php echo $stimulation_reference; ?>,  <?php echo $harmonie_reference; ?>],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            xAxes: [{
                                                ticks: {
                                                    max:5,
                                                    min:0,
                                                    stepSize:0.5,
                                                    beginAtZero: true
                                                },
                                                offset:true
                                            }]
                                        },
                                        legend:{display:false}
                                    }
                                    });
 

                                    connect_twitch();
                                    // 2020 1577836800
                                    // 2017 1483228800 
                                    // 2015 1451606400
                                    // 2013 1356998400
                                </script>
                                <section class="col-lg-12">
                                    <h3 class="text-left deus_result_titles"> Sortis ces 3 dernières années </h3> 
                                    <row class="row col-lg-12" id="thisyear">
                                        <script>
                                            do_the_deus_magic("<?php echo implode(',',$genres_inclus_string); ?>", <?php echo json_encode($array_themes); ?>, <?php echo $id_platform; ?>,  <?php echo $today_timestamp; ?>,   1483228800 ,'thisyear', 6,1, "<?php echo implode(',',$keywords); ?>");
                                        </script>
                                    </row>
                                </section>
                                <section class="col-lg-12">
                                    <h3 class="text-left deus_result_titles"> Il y a 3 à 7 ans </h3> 
                                    <row class="row col-lg-12" id="threetosevenyears">
                                        <script>
                                            do_the_deus_magic("<?php echo implode(',',$genres_inclus_string); ?>",<?php echo json_encode($array_themes); ?>, <?php echo $id_platform; ?>,  1483228800  , 1356998400 ,'threetosevenyears', 6,0, "<?php echo implode(',',$keywords); ?>");
                                        </script>
                                    </row>
                                </section>
                                <section  class="col-lg-12">
                                    <h3 class="text-left deus_result_titles"> Sortis il y a 5 à 10 ans </h3> 
                                    <row class="row col-lg-12" id="morethansevenyears">
                                        <script>
                                            do_the_deus_magic("<?php echo implode(',',$genres_inclus_string); ?>",<?php echo json_encode($array_themes); ?>, <?php echo $id_platform; ?>,1356998400 , 1104537600  ,'morethansevenyears',6,0, "<?php echo implode(',',$keywords); ?>");
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