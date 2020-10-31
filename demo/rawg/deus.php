<?php 
    $class_page = "deus";
    include 'header.php';


    ////// 
    // créer les tableaux de classifications des genres, des jeux, des mots clés
    /////


    // tableaux des reponses à la question personnalité 

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

        ///EMPATHIQUE (Romance, historical, drama, comedy, 4x)
            $personnalite_empathique = '44,22,31,27,41';




?>
    <!-- inner-banner-section start -->
   <section class="inner-banner-section inner-banner-section--style bg-overlay-black bg bg_img" data-background="assets/images/banner/<?php echo $header_banner_img; ?>">
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
                        <p class="text-left deus_info"> Ce questionnaire de 10 questions permettra de définir votre personnalité et vous proposera une liste allant jusqu'a 18 jeux vous proposant une expérience de jeu adaptée.</p> <br />
                        <?php $date_today_for_form = new DateTime(); ?>
                        <form  method="post" action="deus_result.php" class="contact-form">                 
                                <div class="deus_platform col-lg-12 form-group  text-center">
                                    <fieldset class="deus_form">
                                        <legend>Console de jeu</legend>
                                        <select class="element select medium" id="platform" name="platform"> 
                                        <option value="" selected="selected">Cliquer pour dérouler</option>
                                           <option value="16" >Playstation 3</option> 
                                           <option value="18" >Playstation 4</option> 
                                            <option value="14" >Xbox 360</option>
                                            <option value="1" >Xbox One</option>
                                           <option value="4" >Ordinateur</option>
                                           <option value="7" >Nintendo Switch</option>
                                           <option value="8" >Nintendo 3DS</option>
                                           <option value="3" >iOS</option>
                                           <option value="21" >Android</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 form-group text-left">
                                    <fieldset class="deus_form">
                                        <legend> Vous êtes quelqu'un d'introverti, de reservé</legend>
                                        <label for="extraval1_1" class="deus_radio"><input type="radio" name="extraversion_val_1" value="1"  id="extraval1_1"> Pas d'accord du tout</label>
                                        <label for="extraval1_2" class="deus_radio"><input type="radio" name="extraversion_val_1" value="2"   id="extraval1_2"> Plutot pas d'accord</label>
                                        <label for="extraval1_3" class="deus_radio"><input type="radio" name="extraversion_val_1" value="3"   id="extraval1_3"> Neutre</label>
                                        <label for="extraval1_4 "class="deus_radio"><input type="radio" name="extraversion_val_1" value="4"   id="extraval1_4"> Plutot d'accord</label>
                                        <label for="extraval1_5 "class="deus_radio"><input type="radio" name="extraversion_val_1" value="5"   id="extraval1_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend>Vous êtes du genre à vous prélasser</legend>
                                        <label for="consval1_1" class="deus_radio"><input type="radio" name="conscencieux_val_1" value="1"   id="consval1_1"> Pas d'accord du tout</label>
                                        <label for="consval1_2" class="deus_radio"><input type="radio" name="conscencieux_val_1" value="2"   id="consval1_2"> Plutot pas d'accord</label>
                                        <label for="consval1_3" class="deus_radio"><input type="radio" name="conscencieux_val_1" value="3"   id="consval1_3"> Neutre</label>
                                        <label for="consval1_4" class="deus_radio"><input type="radio" name="conscencieux_val_1" value="4"   id="consval1_4"> Plutot d'accord</label>
                                        <label for="consval1_5" class="deus_radio"><input type="radio" name="conscencieux_val_1" value="5"   id="consval1_5"> Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend>Vous portez beaucoup d'interêt au rapport à l'autre</legend>
                                        <label for="extraval2_1" class="deus_radio"><input type="radio" name="extraversion_val_2"   value="1" id="extraval2_1">Pas d'accord du tout</label>
                                        <label for="extraval2_2" class="deus_radio"><input type="radio" name="extraversion_val_2" value="2"   id="extraval2_2">Plutot pas d'accord</label>
                                        <label for="extraval2_3" class="deus_radio"><input type="radio" name="extraversion_val_2" value="3"   id="extraval2_3">Neutre</label>
                                        <label for="extraval2_4" class="deus_radio"><input type="radio" name="extraversion_val_2" value="4"   id="extraval2_4">Plutot d'accord</label>
                                        <label for="extraval2_5" class="deus_radio"><input type="radio" name="extraversion_val_2" value="5"r equired="required" id="extraval2_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend> L'art et la créativité vous importe peu</legend>
                                        <label for="ouvval1_1" class="deus_radio"><input type="radio" name="ouverture_val_1" value="1"   id="ouvval1_1">Pas d'accord du tout</label>
                                        <label for="ouvval1_2" class="deus_radio"><input type="radio" name="ouverture_val_1" value="2"   id="ouvval1_2">Plutot pas d'accord</label>
                                        <label for="ouvval1_3" class="deus_radio"><input type="radio" name="ouverture_val_1" value="3"   id="ouvval1_3">Neutre</label>
                                        <label for="ouvval1_4" class="deus_radio"><input type="radio" name="ouverture_val_1" value="4"   id="ouvval1_4">Plutot d'accord</label>
                                        <label for="ouvval1_5" class="deus_radio"><input type="radio" name="ouverture_val_1" value="5"   id="ouvval1_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend>Vous portez facilement un jugement sur les autres</legend>
                                        <label for="agreabval2_1" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="1"   id="agreabval2_1">Pas d'accord du tout</label>
                                        <label for="agreabval2_2" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="2"   id="agreabval2_2">Plutot pas d'accord</label>
                                        <label for="agreabval2_3" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="3"   id="agreabval2_3">Neutre</label>
                                        <label for="agreabval2_4" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="4"   id="agreabval2_4">Plutot d'accord</label>
                                        <label for="agreabval2_5" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="5"   id="agreabval2_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend>Vous appréciez les tâches pénibles, éprouvantes, ..</legend>
                                        <label for="consval2_1" class="deus_radio"><input type="radio" name="conscencieux_val_2" value="1"   id="consval2_1"> Pas d'accord du tout</label>
                                        <label for="consval2_2" class="deus_radio"><input type="radio" name="conscencieux_val_2" value="2"   id="consval2_2"> Plutot pas d'accord</label>
                                        <label for="consval2_3" class="deus_radio"><input type="radio" name="conscencieux_val_2" value="3"   id="consval2_3"> Neutre</label>
                                        <label for="consval2_4" class="deus_radio"><input type="radio" name="conscencieux_val_2" value="4"   id="consval2_4"> Plutot d'accord</label>
                                        <label for="consval2_5" class="deus_radio"><input type="radio" name="conscencieux_val_2" value="5"   id="consval2_5"> Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form">
                                        <legend>Vous débordez d'imagination</legend>
                                        <label for="ouvval2_1" class="deus_radio"><input type="radio" name="ouverture_val_2" value="1"   id="ouvval2_1">Pas d'accord du tout</label>
                                        <label for="ouvval2_2" class="deus_radio"><input type="radio" name="ouverture_val_2" value="2"   id="ouvval2_2">Plutot pas d'accord</label>
                                        <label for="ouvval2_3" class="deus_radio"><input type="radio" name="ouverture_val_2" value="3"   id="ouvval2_3">Neutre</label>
                                        <label for="ouvval2_4" class="deus_radio"><input type="radio" name="ouverture_val_2" value="4"   id="ouvval2_4">Plutot d'accord</label>
                                        <label for="ouvval2_5" class="deus_radio"><input type="radio" name="ouverture_val_2" value="5"   id="ouvval2_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form" >
                                        <legend>Vous croyez en la bonne foi des gens</legend>
                                        <label for="agreabval2_1" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="1" id="agreabval2_1">Pas d'accord du tout</label>
                                        <label for="agreabval2_2" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="2" id="agreabval2_2">Plutot pas d'accord</label>
                                        <label for="agreabval2_3" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="3" id="agreabval2_3">Neutre</label>
                                        <label for="agreabval2_4" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="4" id="agreabval2_4">Plutot d'accord</label>
                                        <label for="agreabval2_5" class="deus_radio"><input type="radio" name="agreabilite_val_2" value="5" id="agreabval2_5">Totalement d'accord</label>
                                    </fieldset>

                                    <fieldset class="deus_form" >
                                        <legend>Vous aimez prendre des decisions importantes</legend>
                                        <label for="choice_matter2_1" class="deus_radio"><input type="radio" name="choicematter" value="-1" id="choice_matter2_1">Pas d'accord du tout</label>
                                        <label for="choice_matter2_3" class="deus_radio"><input type="radio" name="choicematter" value="0" id="choice_matter2_3">Neutre</label>
                                        <label for="choice_matter2_5" class="deus_radio"><input type="radio" name="choicematter" value="1" id="choice_matter2_5">Totalement d'accord</label>
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
                                        <option value="<?php echo $personnalite_reveur; ?>" >L'imagination et la reflexion</option> sci-fi fantasy  
                                        <option value="<?php echo $personnalite_rebelle; ?>" >La spontaneité et la lucidité</option> warfare action
                                        <option value="<?php echo $personnalite_promoteur; ?>" >L'intuition et l'adaptabilité</option> sandbox stealth 
                                        <option value="<?php echo $personnalite_perseverant_travaillomane; ?>" >L'engagement et l'observation</option> survival
                                        <option value="<?php echo $personnalite_empathique; ?>" >La sensibilité et la bienveillance</option> 
                                    </select>  
                                    </fieldset>
                                </div>
                               
                                <div class="col-lg-12 form-group text-center">
                                    <input type="submit" class="cmn-btn" value="Envoyer">
                                </div>
                                <span class="text-left deus_notice"> Cette "étude de la personnalité" se base sur le format du Big Five <br />et reprend le format 10 items, réduis à 8, suivant le modèle établi par Jason VandenBerghe. <br />
                                        Le seul truc fait maison, c'est l'organisation des genres, l'algo qui m'a pris 20 ans, et bien entendu le site. 
                                </span>
                            </div>
                        </form>	   

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php     
    include 'footer.php';
?>