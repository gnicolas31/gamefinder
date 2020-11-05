<?php     include('connect.php');
    $numero_page = 1;
    if($_GET['nb']) {
        $numero_page = $_GET['nb']+1;
    }
    $json = file_get_contents('https://api.rawg.io/api/games?page='.$numero_page.'&page_size=10&key=1a07bf406da8478d952155742cde59ce');
    $games = json_decode($json);
    foreach($games->results as $game) {
        $deus_check_if_game_already_exist_request = "SELECT id FROM deus_games WHERE id_rawg = ".$game->id." LIMIT 1";
   
        $deus_check_if_game_already_exist_result = $conn->query($deus_check_if_game_already_exist_request);
        if ($deus_check_if_game_already_exist_result->num_rows == 0) {
            $genres = [];
            $tags = [];
            $platforms = [];

            foreach($game->genres as $genre) {
               $save_game_to_genre_bdd = "INSERT INTO games_to_genres (game_id, genre_id) VALUES (".$game->id.",".$genre->id.")";
               $save_game_to_genre_bdd = $conn->query($save_game_to_genre_bdd); 
            }
            foreach($game->tags as $tag) {
                $save_game_to_tag_bdd = "INSERT INTO games_to_tags (game_id, tag_id) VALUES (".$game->id.",".$tag->id.")";
                $save_game_to_tag_bdd = $conn->query($save_game_to_tag_bdd); 
            }
            foreach($game->platforms as $platform) {
                $platforms[] = $platform->platform->id;
            }
            $platforms = json_encode($platforms);
            $date = strtotime($game->released);
            $imgurl = $game->background_image;
            $game_name = mysqli_real_escape_string($conn, $game->name);
            $clipurl = ' ';
            if($game->clip) {
                $clipurl = $game->clip->clip;
            }
            $metacritic = ' ';
            if($game->metacritic) {
                $metacritic = $game->metacritic;
            }
            $save_game_in_bdd_req = "INSERT INTO deus_games (id_rawg,slug, game_name, released, rating, rating_count, metacritic, platforms, img_url, clip_url) VALUES (".$game->id.",'".$game->slug."', '".$game_name."', '".$date."', '".$game->rating."',".$game->ratings_count.",'".$metacritic."','".$platforms."','".$imgurl."','".$clipurl."')";

            $save_game_in_bdd = $conn->query($save_game_in_bdd_req); 
            if($save_game_in_bdd == false) {
                echo $game_name;
            }
        }
    }
    header('Location: http://localhost/gamefinder/demo/getrawggames.php?nb='.$numero_page);

  ?>