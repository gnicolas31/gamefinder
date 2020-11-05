<?php


include('connect.php');
$id_igdb = $_POST['id_igdb'];
$id_rawg = $_POST['id_rawg'];
$game_name = $_POST['game_name'];
$color = $_POST['color'];
$rawg_metacritic = 0;
if($_POST['metacritic_rawg']) {
    $rawg_metacritic = $_POST['metacritic_rawg'];
}
$rawg_rating = 0;
if($_POST['rawg_rating']) {
    $rawg_rating = $_POST['rawg_rating'];
}
$rawg_rating_count = 0;
if($_POST['rawg_rating_count']) {
    $rawg_rating_count = $_POST['rawg_rating_count'];
}

$tags_bdd;
$tags = $_POST['tags'];
foreach($tags as $tag) {
    $tags_bdd[] = $tag['id'];
}

$rawg_clip_url = $_POST['clip_url'];
$sql_insert_link_save_link_in_bdd = "INSERT INTO link_igdb_rawg (id_igdb, id_rawg, rating_rawg, clip_url, game_name, metacritic_rawg, rawg_rating_count,color, tags) VALUES (".$id_igdb.",".$id_rawg.",".$rawg_rating.",'".$rawg_clip_url."', '".$game_name."',".$rawg_metacritic.",".$rawg_rating_count.",'".$color."', '".json_encode($tags_bdd)."')";
$result_insert_link_save_link_in_bdd = $conn->query($sql_insert_link_save_link_in_bdd); 
?>