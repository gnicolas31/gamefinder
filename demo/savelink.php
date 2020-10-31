<?php


include('connect.php');
$id_igdb = $_POST['id_igdb'];
$id_rawg = $_POST['id_rawg'];
$rawg_rating = $_POST['rawg_rating'];
$rawg_clip_url = $_POST['clip_url'];
$sql_insert_link_save_link_in_bdd = "INSERT INTO link_igdb_rawg (id_igdb, id_rawg, rating_rawg, clip_url) VALUES (".$id_igdb.",".$id_rawg.",".$rawg_rating.",'".$rawg_clip_url."')";
$result_insert_link_save_link_in_bdd = $conn->query($sql_insert_link_save_link_in_bdd); 

?>