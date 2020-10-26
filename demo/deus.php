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

        ///EMPATHIQUE (Romance, historical, drama, comedy, 4x)
            $personnalite_empathique = '44,22,31,27,41';




?>
    <!-- inner-banner-section start -->
   <section class="inner-banner-section inner-banner-section--style bg-overlay-black bg bg_img" data-background="assets/images/banner/inner.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="inner-banner-content">
                        <h2 class="title">Recherche Deus Search</h2>
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
    <section class="contact-section bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="contact-area">
                        
                        <?php $date_today_for_form = new DateTime(); ?>
                        <form  method="post" action="deus_result.php"class="contact-form">                 
                                <div class="row">
                                    <div class="col-lg-12 form-group text-left">
                                        <label>Console de jeu<span>*</span></label>
                                        <select class="element select medium" id="platform" name="platform"> 
                                       <!--     <option value="20" >Nintendo DS</option> -->
                                            <option value="130" >Nintendo Switch</option>
                                       <!--     <option value="5" >Nintendo Wii</option> -->
                                       <!--     <option value="41" >Nintendo Wii U</option> -->
                                            <option value="6" >Ordinateur</option>
                                            <option value="48" >Playstation 4</option>
                                        <!--    <option value="9" >Playstation 3</option> -->
                                        <!--    <option value="8" >Playstation 2</option> -->
                                            <option value="49" >Xbox One</option>
                                       <!--     <option value="12" >Xbox 360</option> -->
                                        </select>
                                    </div>
                                    <!-- <div class="col-lg-12 form-group text-left">
                                        <label>Genres<span>*</span></label>
                                        <select class="element select medium" id="genres" name="genres"> 
                                            <option value="" selected="selected">Répondez à la question</option>
                                            <option value="<?php echo $joueur_non_regulier_pve; ?>" >PVE</option>
                                            <option value="<?php echo $joueur_non_regulier_puzzle; ?>" >puzzle</option>
                                            <option value="<?php echo $joueur_regulier_strategy; ?>" > Strategy</option>
                                            <option value="<?php echo $joueur_regulier_pvp; ?>" >PVP</option>
                                            <option value="<?php echo $joueur_rpg; ?>" >RPG</option>
                                        </select>                                    
                                    </div>  -->
                                   
                                    <div class="col-lg-12 form-group text-left">
                                        <label>Nouveauté / Ouverture<span>*</span></label>
                                        <select class="element select medium" id="qual1" name="qual1"> 
                                            <option value="0" >0</option>
                                            <option value="1" >1</option>
                                            <option value="2" >2</option>
                                            <option value="3" >3</option>
                                            <option value="4" >4</option>
                                        </select>                      
                                    </div> 
                                    <div class="col-lg-12 form-group text-left">
                                        <label>Challenge / Conscienciosité<span>*</span></label>
                                        <select class="element select medium" id="qual2" name="qual2"> 
                                            <option value="0" >0</option>
                                            <option value="1" >1</option>
                                            <option value="2" >2</option>
                                            <option value="3" >3</option>
                                            <option value="4" >4</option>
                                        </select>                      
                                    </div> 
                                    <div class="col-lg-12 form-group text-left">
                                        <label>Stimulation sociale / Extraversion<span>*</span></label>
                                        <select class="element select medium" id="qual3" name="qual3"> 
                                            <option value="0" >0</option>
                                            <option value="1" >1</option>
                                            <option value="2" >2</option>
                                            <option value="3" >3</option>
                                            <option value="4" >4</option>
                                        </select>                      
                                    </div> 
                                    <div class="col-lg-12 form-group text-left">
                                        <label>Harmonie / Agréabiilité<span>*</span></label>
                                        <select class="element select medium" id="qual4" name="qual4"> 
                                            <option value="0" >0</option>
                                            <option value="1" >1</option>
                                            <option value="2" >2</option>
                                            <option value="3" >3</option>
                                            <option value="4" >4</option>
                                        </select>                                    
                                    </div> 

                                    <!-- <div class="col-lg-12 form-group text-left">
                                        <label>Netflix & chill ou activité compétitive ?<span>*</span></label>
                                        <select class="element select medium" id="que1" name="que1"> 
                                            <option value="" selected="selected">Répondez à la question</option>
                                            <option value="31,12" >Netflix & chill</option>
                                            <option value="33" >Activité compétitive</option>
                                        </select>                                    
                                    </div>
                                    <div class="col-lg-12 form-group text-left">
                                        <label>Echecs ou force pure ?<span>*</span></label>
                                        <select class="element select medium" id="que2" name="que2"> 
                                            <option value="" selected="selected">Répondez à la question</option>
                                            <option value="16,15,36" >Echecs</option>
                                            <option value="4,11,25" >Force pure</option>
                                        </select>                                    
                                    </div>
                                    <div class="col-lg-12 form-group text-left">
                                        <label>Metier préféré<span>*</span></label>
                                        <select class="element select medium" id="que3" name="que3"> 
                                            <option value="" selected="selected">Répondez à la question</option>
                                            <option value="26,9,34,2" >Enqueteur</option>
                                            <option value="24,5" >Militaire</option>
                                        </select>                                    
                                    </div> -->
                                    <!-- <div class="col-lg-12 form-group text-left">
                                        <label>Mots clés<span>*</span></label>
                                        <select class="element select medium" id="keywords" name="keywords"> 
                                            <option value="" selected="selected">Répondez à la question</option>
                                            <option value="6671" >Fantasy</option>
                                            <option value="5937" >Sci-Fi</option>
                                            <option value="1720" >fps-Fi</option>
                                            <option value="5788" >Adventure</option>
                                            <option value="5301" >Strategy</option>
                                            <option value="4590" >Simulation</option>
                                            <option value="2105" >Horror</option>
                                        </select>                                    
                                    </div>  -->
                                    <div class="col-lg-12 form-group text-left">
                                        <label>Personnalité (filtre des themes) <span>*</span></label>
                                        <select class="element select medium" id="themes" name="themes"> 
                                            <option value="" selected="selected">Répondez à la question</option>
                                            <option value="<?php echo $personnalite_reveur; ?>" >Rêveur</option>
                                            <option value="<?php echo $personnalite_rebelle; ?>" >Rebelle</option>
                                            <option value="<?php echo $personnalite_promoteur; ?>" >Promoteur</option>
                                            <option value="<?php echo $personnalite_perseverant_travaillomane; ?>" >Perseverant</option>
                                            <option value="<?php echo $personnalite_empathique; ?>" >Empathique</option>
                                        </select>  
                                    </div>
                                    <div class="col-lg-12 form-group text-center">
                                        <input type="submit" class="cmn-btn" value="Envoyer">
                                    </div>
                                </div>
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

rebelle