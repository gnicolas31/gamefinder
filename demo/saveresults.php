<?php
include('connect.php');

$results = $_POST['results'];
$result_to_save;
foreach($results as $result) {
    $result_to_save[] = $result['name'];
}

    $jeu1 = str_replace("'"," ", $result_to_save[0]);
    $jeu2 = str_replace("'"," ", $result_to_save[1]);
    $jeu3 = str_replace("'"," ", $result_to_save[2]);
    $jeu4 = str_replace("'"," ", $result_to_save[3]);
    $jeu5 = str_replace("'"," ", $result_to_save[4]);
    $jeu6 = str_replace("'"," ", $result_to_save[5]);

    $date_now = date('m/d/Y H:i:s', time());
    $sql_first = "INSERT INTO sauvegarde_resultats (jeu1,jeu2,jeu3,jeu4,jeu5,jeu6,created) VALUES ('".$jeu1."','".$jeu2."','".$jeu3."','".$jeu4."','".$jeu5."','".$jeu6."','".$date_now."')";

    $result_first = $conn->query($sql_first);


?>