<?php 
    include('connect.php');
   // $numero_page = 1;
   // if($_GET['nb']) {
   //     $numero_page = $_GET['nb']+1;
   // }
   // $json = file_get_contents('https://api.rawg.io/api/tags?page='.$numero_page.'&page_size=50&key=1a07bf406da8478d952155742cde59ce');
  //  $tags = json_decode($json);
   // foreach($tags->results as $tag) {
   //     $sql_save_tag_in_bdd = "INSERT INTO tags_rawg (id_rawg, game_count, tag_name) VALUES (".$tag->id.", ".$tag->games_count.", '".$tag->name."')";
    //    var_dump($sql_save_tag_in_bdd);
    //    $sql_save_tag_in_bdd = $conn->query($sql_save_tag_in_bdd); 
  //  }
  //  header('Location: http://localhost/gamefinder/demo/getrawg_tags.php?nb='.$numero_page);


   $getlist =  "SELECT tag_name, id_rawg FROM tags_rawg ORDER BY game_count DESC LIMIT 200";
   $sql_get_list = $conn->query($getlist); 


   foreach($sql_get_list as $tag) {
      echo $tag['id_rawg'].' - '.$tag['tag_name']. '<br />';
   }

    ?>
