<?php 
    $class_page = "deus";
    include 'header.php';


    ////// 
    // créer les tableaux de classifications des genres, des jeux, des mots clés
    /////

    // tableaux des reponses à la question "joueur régulier ?'

    // tableaux generaux
    // tableau RPG based (Role playing , Hack and Slash, Adventure)
    $joueur_rpg= '12,25,31';

    /// si oui
        // tableau strategy (Tactical, Turn-based Strategy, Real Time strategy, MOBA, Hack And Slash.Beath em up)
        $joueur_regulier_strategy = '24,16,11,15,36,25';
        // tableau PVP (Figthing, Shooter, Racing, Arcade)
        $joueur_regulier_pvp = '4,5,10,33';
        // j'assemble les deux tableaux
                                                                         // NEEED DEBUG  $tableau_joueur_regulier = $joueur_regulier_strategy.','.$joueur_regulier_pvp + $joueur_rpg;
        $tableau_joueur_regulier = '24,16,11,15,36,25,4,5,10,33,12,25,31';

    // si non
        // tableau PVE (Platform, Simulator, Arcade)
        $joueur_non_regulier_pve = '8,13,33';
        // Tableau Puzzle like (Quiz, Puzzle, Visual novel, Point n click)
        $joueur_non_regulier_puzzle= '26,9,34,2';
        // j'assemble les deux tableaux
        
                                                                                  // NEEED DEBUG  $tableau_joueur_non_regulier = $joueur_non_regulier_pve+','+$joueur_rpg+','+$joueur_non_regulier_puzzle;
        $tableau_joueur_non_regulier = '8,13,33,12,25,31,26,9,34,2';
    
    // Si moyen
        $tableau_joueur_moyen = '4,5,10,33,8,13,33';



    // tableaux des reponses à la question personnalité (mots clés)

        //// REVEUR (fantasy, sci-fi, role playing, adventure, magic, abstract, action)
            $personnalite_reveur = '6671,5937,4942,5788,1242,1235,1';

        //// REBELLE (shooter, horror, first person shooter, action games)
            $personnalite_rebelle = '2661,2105,1720,2898';

        //// PROMOTEURS (strategy, simulation, sports)
            $personnalite_promoteur = '5301,4942,4590,2791';

        /// PERSEVERANT (role playing, simulation, strategy, mini games, high score)
            $personnalite_perseverant_travaillomane = '4942,4590,5301,1232,1797, 41';

        ///EMPATHIQUE (death, fantasy, horror, comedy)
            $personnalite_empathique = '1770, 6671, 2105, 2728';


    // test de tableaux des reponses à la question personnalité (themes)
        //// REVEUR (Mystery, sci fi, fantasy, open world)
            $personnalite_reveur = '43,18,17,38';

        //// REBELLE (Action, party,Warfare, thriller)
            $personnalite_rebelle = '1,40,39,20';

        //// PROMOTEURS (4x, non fiction, business, sandbox)
            $personnalite_promoteur = '41,32,28,33';

        /// PERSEVERANT (Stealth, horro, survival, sandbox, 4x)
            $personnalite_perseverant_travaillomane = '23, 19, 21, 33, 41';

        ///EMPATHIQUE (Romance, historical, drama, comedy, 4x, fantasy)
            $personnalite_empathique = '44,22,31,27,41, 17';




?>
    <!-- inner-banner-section start -->
   <section class="inner-banner-section inner-banner-section--style bg-overlay-black bg bg_img" data-background="assets/images/<?php echo $header_banner_img; ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="inner-banner-content">
                        <h2 class="title">Recherche Deus Search</h2>
                        <div class="breadcrumb-area">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">DEUS SEAAAARCH</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- inner-banner-section end -->
    <section class="contact-section bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="contact-area">
                        <p class="text-left deus_info"> Ce questionnaire de 12 questions permettra de définir votre personnalité et vous proposera une liste allant jusqu'a 18 jeux vous proposant une expérience de jeu adaptée.</p> <br />
                        <?php $date_today_for_form = new DateTime(); ?>
                        <form  method="post" action="deus_result.php" id="deus_form" class="contact-form">                 
                                <div class="deus_platform col-lg-12 form-group  text-center">
                                    <fieldset class="deus_form">
                                        <legend>Console de jeu</legend>
                                        <select class="element select medium" id="platform" name="platform"> 
                                        <option value="" selected="selected">Cliquer pour dérouler</option>
                                    <!--     <option value="20" >Nintendo DS</option> -->
                                            <option value="130" >Nintendo Switch </option> 
                                    <!--     <option value="5" >Nintendo Wii</option> -->
                                    <!--     <option value="41" >Nintendo Wii U</option> -->
                                           <option value="6" >Ordinateur</option>
                                           <option value="48" >Playstation 4</option>
                                        <!--    <option value="9" >Playstation 3</option> -->
                                         <!--   <option value="8" >Playstation 2</option>-->
                                           <option value="49" >Xbox One</option>
                                    <!--     <option value="12" >Xbox 360</option> -->
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group text-left">
                                    <fieldset class="deus_form">
                                        <legend> Vous êtes quelqu'un d'introverti, de reservé</legend>
                                        <label for="extraval1_1" class="deus_radio"><input type="radio" name="extraversion_val_1" value="1" id="extraval1_1"> Pas d'accord du tout</label>
                                        <label for="extraval1_2" class="deus_radio"><input type="radio" name="extraversion_val_1" value="2" id="extraval1_2"> Plutot pas d'accord</label>
                                        <label for="extraval1_3" class="deus_radio"><input type="radio" name="extraversion_val_1" value="3" id="extraval1_3"> Neutre</label>
                                        <label for="extraval1_4 "class="deus_radio"><input type="radio" name="extraversion_val_1" value="4" id="extraval1_4"> Plutot d'accord</label>
                                        <label for="extraval1_5 "class="deus_radio"><input type="radio" name="extraversion_val_1" value="5" id="extraval1_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend>Vous êtes du genre à vous prélasser</legend>
                                        <label for="consval1_1" class="deus_radio"><input type="radio" name="conscencieux_val_1" value="1" id="consval1_1"> Pas d'accord du tout</label>
                                        <label for="consval1_2" class="deus_radio"><input type="radio" name="conscencieux_val_1" value="2" id="consval1_2"> Plutot pas d'accord</label>
                                        <label for="consval1_3" class="deus_radio"><input type="radio" name="conscencieux_val_1" value="3" id="consval1_3"> Neutre</label>
                                        <label for="consval1_4" class="deus_radio"><input type="radio" name="conscencieux_val_1" value="4" id="consval1_4"> Plutot d'accord</label>
                                        <label for="consval1_5" class="deus_radio"><input type="radio" name="conscencieux_val_1" value="5" id="consval1_5"> Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend>Vous portez beaucoup d'interêt au rapport à l'autre</legend>
                                        <label for="extraval2_1" class="deus_radio"><input type="radio" name="extraversion_val_2" value="1" id="extraval2_1">Pas d'accord du tout</label>
                                        <label for="extraval2_2" class="deus_radio"><input type="radio" name="extraversion_val_2" value="2" id="extraval2_2">Plutot pas d'accord</label>
                                        <label for="extraval2_3" class="deus_radio"><input type="radio" name="extraversion_val_2" value="3" id="extraval2_3">Neutre</label>
                                        <label for="extraval2_4" class="deus_radio"><input type="radio" name="extraversion_val_2" value="4" id="extraval2_4">Plutot d'accord</label>
                                        <label for="extraval2_5" class="deus_radio"><input type="radio" name="extraversion_val_2" value="5" id="extraval2_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend> L'art et la créativité vous importe peu</legend>
                                        <label for="ouvval1_1" class="deus_radio"><input type="radio" name="ouverture_val_1" value="1" id="ouvval1_1">Pas du tout</label>
                                        <label for="ouvval1_2" class="deus_radio"><input type="radio" name="ouverture_val_1" value="2" id="ouvval1_2">Plutot pas d'accord</label>
                                        <label for="ouvval1_3" class="deus_radio"><input type="radio" name="ouverture_val_1" value="3" id="ouvval1_3">Neutre</label>
                                        <label for="ouvval1_4" class="deus_radio"><input type="radio" name="ouverture_val_1" value="4" id="ouvval1_4">Plutot d'accord</label>
                                        <label for="ouvval1_5" class="deus_radio"><input type="radio" name="ouverture_val_1" value="5" id="ouvval1_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend>Vous portez facilement un jugement sur les autres</legend>
                                        <label for="agreabval2_1" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="1" id="agreabval2_1">Pas d'accord du tout</label>
                                        <label for="agreabval2_2" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="2" id="agreabval2_2">Plutot pas d'accord</label>
                                        <label for="agreabval2_3" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="3" id="agreabval2_3">Neutre</label>
                                        <label for="agreabval2_4" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="4" id="agreabval2_4">Plutot d'accord</label>
                                        <label for="agreabval2_5" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="5" id="agreabval2_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend>Vous appréciez les tâches pénibles, éprouvantes, ..</legend>
                                        <label for="consval2_1" class="deus_radio"><input type="radio" name="conscencieux_val_2" value="1" id="consval2_1"> Pas d'accord du tout</label>
                                        <label for="consval2_2" class="deus_radio"><input type="radio" name="conscencieux_val_2" value="2" id="consval2_2"> Plutot pas d'accord</label>
                                        <label for="consval2_3" class="deus_radio"><input type="radio" name="conscencieux_val_2" value="3" id="consval2_3"> Neutre</label>
                                        <label for="consval2_4" class="deus_radio"><input type="radio" name="conscencieux_val_2" value="4" id="consval2_4"> Plutot d'accord</label>
                                        <label for="consval2_5" class="deus_radio"><input type="radio" name="conscencieux_val_2" value="5" id="consval2_5"> Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend>Vous débordez d'imagination</legend>
                                        <label for="ouvval2_1" class="deus_radio"><input type="radio" name="ouverture_val_2" value="1" id="ouvval2_1">Pas d'accord du tout</label>
                                        <label for="ouvval2_2" class="deus_radio"><input type="radio" name="ouverture_val_2" value="2" id="ouvval2_2">Plutot pas d'accord</label>
                                        <label for="ouvval2_3" class="deus_radio"><input type="radio" name="ouverture_val_2" value="3" id="ouvval2_3">Neutre</label>
                                        <label for="ouvval2_4" class="deus_radio"><input type="radio" name="ouverture_val_2" value="4" id="ouvval2_4">Plutot d'accord</label>
                                        <label for="ouvval2_5" class="deus_radio"><input type="radio" name="ouverture_val_2" value="5" id="ouvval2_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form" >
                                        <legend>Vous croyez en la bonne foi des gens</legend>
                                        <label for="agreabval2_1" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="1" id="agreabval2_1">Pas d'accord du tout</label>
                                        <label for="agreabval2_2" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="2" id="agreabval2_2">Plutot pas d'accord</label>
                                        <label for="agreabval2_3" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="3" id="agreabval2_3">Neutre</label>
                                        <label for="agreabval2_4" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="4" id="agreabval2_4">Plutot d'accord</label>
                                        <label for="agreabval2_5" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="5" id="agreabval2_5">Totalement d'accord</label>
                                    </fieldset>
                                    <script>
                                        $('.deus_radio').click(function() {
                                            $(this).siblings().removeClass('active');
                                            $(this).addClass('active');
                                        });
                                    </script>
                                </div>
                                <div class="deus_platform col-lg-12 form-group  text-center">
                                    <fieldset class="deus_form">
                                        <legend>Vos points-forts seraient..</legend>
                                        <select class="element select medium" id="themes" name="themes"> 
                                        <option value="" selected="selected">Cliquer pour dérouler</option>
                                        <option value="<?php echo $personnalite_reveur; ?>" >L'imagination et la reflexion</option>
                                        <option value="<?php echo $personnalite_rebelle; ?>" >La spontaneité et la lucidité</option>
                                        <option value="<?php echo $personnalite_promoteur; ?>" >L'intuition et l'adaptabilité</option>
                                        <option value="<?php echo $personnalite_perseverant_travaillomane; ?>" >L'engagement et l'observation</option>
                                        <option value="<?php echo $personnalite_empathique; ?>" >La sensibilité et la bienveillance</option>
                                    </select>  
                                    </fieldset>
                                </div>
                               
                                <div class="col-lg-12 form-group text-center submit_field">
                                    <input type="submit" class="cmn-btn" value="Envoyer">
                                    <div class="deus_info error notice deus_issue">
                                    </div>
                                </div>
                                <span class="text-left deus_notice"> Cette "étude de la personnalité" se base sur le format du Big Five <br />et reprend le format 10 items, réduis à 8, suivant le modèle établi par Jason VandenBerghe. <br />
                                        Le seul truc fait maison, c'est l'organisation des genres, l'algo qui m'a pris 20 ans, et bien entendu le site. 
                                </span>
                            </div>
                        </form>	   

                            <script>
                            $('#deus_form').submit(function(event) {
                                $('.submit_field .notice').empty();
                                $nb_conditions = 0;
                                event.preventDefault(); //this will prevent the default submit
                                
                                if(!$('#platform').val()){
                                    $nb_conditions++;
                                    $('.submit_field .notice').show();
                                    $('.submit_field .notice').append('<p> Renseignez une plateforme.. </p>');
                                }
                                if(!$('#themes').val()) {
                                    $nb_conditions++;
                                    $('.submit_field .notice').show();
                                    $('.submit_field .notice').append('<p> Renseignez vos points forts.. </p>');
                                }
                                else if($('#platform').val() && $('#themes').val()) {
                                       $(this).unbind('submit').submit(); // continue the submit unbind preventDefault
                                }
                                
                                // your code here (But not asynchronous code such as Ajax because it does not wait for response and move to next line.)
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php     
    include 'footer.php';
?>