<?php 

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "deussearch";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$nouveaute_reference = 0;
$challenge_reference = 1;
$stimulation_reference = 0;
$harmonie_reference = 1;

$nouveaute_reference_full_tab = array(($nouveaute_reference-2),($nouveaute_reference-1),($nouveaute_reference),($nouveaute_reference+1),($nouveaute_reference+2));
$nouveaute_reference_first_tab = array_slice($nouveaute_reference_full_tab, 1, -1);


$challenge_reference_full_tab = array(($challenge_reference-2),($challenge_reference-1),($challenge_reference),($challenge_reference+1),($challenge_reference+2));
$challenge_reference_first_tab = array_slice($challenge_reference_full_tab, 1, -1);


$stimulation_reference_full_tab = array(($stimulation_reference-2),($stimulation_reference-1),($stimulation_reference),($stimulation_reference+1),($stimulation_reference+2));
$stimulation_reference_first_tab = array_slice($stimulation_reference_full_tab, 1, -1);


$harmonie_reference_full_tab = array(($harmonie_reference-2),($harmonie_reference-1),($harmonie_reference),($harmonie_reference+1),($harmonie_reference+2));
$harmonie_reference_first_tab = array_slice($harmonie_reference_full_tab, 1, -1);

/// JE VAIS RECUPERER LES CATGORIES ET LES TRIER
/// 4 au maximum sur 16 en bdd
$categ_encours = 0;
$categories_totale = 0;
$array_results = [];
// en premier celles qui collent parfaitement
echo '<h2>Categories primaires</h2>';

$diff_totale = 0;
$nbr_case_differentes = 0;
$array_resultat_pertinence = array();
$tableau_genres_final = '';
$sql_first = "SELECT id,id_igdb,nouveaute,challenge,stimulation,harmonie FROM ponderation_genres";
$result_first = $conn->query($sql_first);

$genre_tab;
$string_tab;

if ($result_first->num_rows > 0) {
  // output data of each row
    foreach($result_first as $genre) {

        ////
        // je calcule la difference sur la case nouveaute
        $indecateur_de_difference = 0;
        $genre_nouveaute = $genre['nouveaute'];
        if( $nouveaute_reference > $genre_nouveaute) {
            $indecateur_de_difference += ($nouveaute_reference - $genre_nouveaute);
        } 
        if( $nouveaute_reference < $genre_nouveaute) {
            $indecateur_de_difference += ($genre_nouveaute - $nouveaute_reference);
        }
        if($genre_nouveaute != $nouveaute_reference) {
            $nbr_case_differentes++;
        }
        ////
        // je calcule la difference sur la case challenge
        $genre_challenge = $genre['challenge'];
        if( $challenge_reference > $genre_challenge) {
            $indecateur_de_difference += ($challenge_reference - $genre_challenge);
        } 
        if( $challenge_reference < $genre_challenge) {
            $indecateur_de_difference += ($genre_challenge - $challenge_reference);
        }
        if($genre_challenge != $challenge_reference) {
            $nbr_case_differentes++;
        }


        ////
        // je calcule la difference sur la case stimulation
        $genre_stimulation = $genre['stimulation'];
        if( $stimulation_reference > $genre_stimulation) {
            $indecateur_de_difference += ($challenge_reference - $genre_stimulation);
        } 
        if( $stimulation_reference < $genre_stimulation) {
            $indecateur_de_difference += ($genre_stimulation - $stimulation_reference);
        }
        if($genre_stimulation != $stimulation_reference) {
            $nbr_case_differentes++;
        }
        ////
        // je calcule la difference sur la case harmonie
        $genre_harmonie = $genre['harmonie'];
        if( $harmonie_reference > $genre_harmonie) {
            $indecateur_de_difference += ($harmonie_reference - $genre_harmonie);
        } 
        if( $harmonie_reference < $genre_harmonie) {
            $indecateur_de_difference += ($genre_harmonie - $harmonie_reference);
        }
        if($genre_harmonie != $harmonie_reference) {
            $nbr_case_differentes++;            
        }    

        $genre_tab[$genre['id']] = $indecateur_de_difference/$nbr_case_differentes;
     
        $nbr_case_differentes = 0;
    }
    asort($genre_tab);

    foreach($genre_tab as $n => $genre_trie) { 
        $string_tab .= $n.',';
    }        
}


var_dump($string_tab);

// $sql_first = "SELECT * FROM ponderation_genres WHERE nouveaute = $nouveaute_reference AND challenge = $challenge_reference AND stimulation = $stimulation_reference AND harmonie = $harmonie_reference";
// $result_first = $conn->query($sql_first);

// if ($result_first->num_rows > 0) {
//   // output data of each row
//   while($row_first = $result_first->fetch_assoc() ) {
//       if($$categories_totale < 5 ) {
//             $array_results[$row_first["id"]] =  $row_first["name_genre"];
//             echo "id: " . $row_first["id"]. " - Name: " . $row_first["name_genre"]."<br>";
//             $categories_totale++;
//       }
//     }
// }


// /// Si moins de 4 categories , je selectionne les categories qui ont toujours moins d'un point d'ecart sur chacune des categories
// echo '<h2>filtre secondaire</h2>';
// if($categories_totale < 4) {
//     $sql_second = "SELECT * FROM ponderation_genres WHERE nouveaute IN (".implode(',',$nouveaute_reference_first_tab).") AND challenge IN (".implode(',',$challenge_reference_first_tab).") AND stimulation IN (".implode(',',$stimulation_reference_first_tab).") AND harmonie IN (".implode(',',$harmonie_reference_first_tab).")";
//     $result_second = $conn->query($sql_second);

//     if ($result_second->num_rows > 0) {q
//         // output data of each row
//         while($row_second = $result_second->fetch_assoc() ) {
//             if($categories_totale < 5 ) {
//                 if(array_key_exists($row_second["id"], $array_results)) {
//                 }
//                 else {
//                     $array_results[$row_second["id"]] =  $row_second["name_genre"];
//                     $categories_totale++;
//                 }
//             }
//           }
//       }
// }


// /// Si moins de 4 categories , je selectionne les categories qui ont toujours moins de 2  d'ecart sur chacune des categories
// echo '<h2>resultat final</h2> <br />';
// if($categories_totale < 4) {
//     $sql_tierce = "SELECT * FROM ponderation_genres WHERE nouveaute IN (".implode(',',$nouveaute_reference_full_tab).") AND challenge IN (".implode(',',$challenge_reference_full_tab).") AND stimulation IN (".implode(',',$stimulation_reference_full_tab).") AND harmonie IN (".implode(',',$harmonie_reference_full_tab).")";
//     $result_tierce = $conn->query($sql_tierce);
//     if ($result_tierce->num_rows > 0) {
//         // output data of each row
//         while($row_tierce = $result_tierce->fetch_assoc() ) {
//             if($categories_totale < 5 ) {
//                 if(array_key_exists($row_tierce["id"], $array_results)) {
//                 }
//                 else {
//                     $array_results[$row_tierce["id"]] =  $row_tierce["name_genre"];
//                     $categories_totale++;
//                 }
//             }
//           }
//       }
// }

// foreach($array_results as $genres) {
//     echo $genres.'<br />';
// }

?> 