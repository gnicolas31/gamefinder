<?php 
include('connect.php');

    $id_igdb = $_POST['id_igdb'];
    $sql_check_if_exist_getrawg = "SELECT rating_rawg,tags, metacritic_rawg, rawg_rating_count, clip_url FROM link_igdb_rawg WHERE id_igdb = ".$id_igdb." LIMIT 1";
   
    $result_check_if_exist_getrawg = $conn->query($sql_check_if_exist_getrawg);
    if ($result_check_if_exist_getrawg->num_rows > 0) {
        foreach($result_check_if_exist_getrawg as $result) {
            $rating_rawg = $result['rating_rawg'];
            $metacritic_rawg = $result['metacritic_rawg'];
            $rating_count = $result['rawg_rating_count'];

            $result['note_deussearch'] = '0';
            
            // Le jeu se voit attribué la note des medias 
            if($metacritic_rawg > 0) {
                $result['note_deussearch'] = $metacritic_rawg;
            }
            // si le jeu a plus de 20 avis il prend la note des joueurs
            if($rating_count >= 20  ) {
                $result['note_deussearch'] = $rating_rawg*20; // psk les notes des joueurs sont sur 5 et les metacritis sur 100
                // alway select the biggest so
                if($metacritic_rawg > $rating_rawg) {
                    $result['note_deussearch'] = $metacritic_rawg;
                }
            }                    
            $result['note_deussearch'] = $metacritic_rawg*20;

            $result['deus_tags'] = json_decode($result['tags']);
            // je delete la turbo grosse ligne de donnée inutile (tout est stock dans deus_tags now)
            $result['tags'] = [];
            $clip_rawg = $result['clip_url'];
        }
    } else {
        $result['note_deussearch'] = 'inconnu';
    }
    echo json_encode($result);   
?>