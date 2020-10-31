<?php 
include('connect.php');

    $id_igdb = $_POST['id_igdb'];
    $sql_check_if_exist_getrawg = "SELECT rating_rawg, clip_url FROM link_igdb_rawg WHERE id_igdb = ".$id_igdb." LIMIT 1";
   
    
    $result_check_if_exist_getrawg = $conn->query($sql_check_if_exist_getrawg);
    if ($result_check_if_exist_getrawg->num_rows > 0) {
        foreach($result_check_if_exist_getrawg as $result) {
            $rating_rawg = $result['rating_rawg'];
            $clip_rawg = $result['clip_url'];
            echo json_encode($result);
        }
    } else {
        $result['rating_rawg'] = 'inconnu';
        echo json_encode($result);
    }
?>