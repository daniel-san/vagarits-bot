<?php

require('config.php');

$data = array_merge((array) $_POST, (array) json_decode(utf8_decode(file_get_contents('php://input')), true));

$json = json_encode($data);

if(isset($data["recent_candidates"]) && isset($data["total_candidates_count"])){
    
    $update = $connection->prepare('UPDATE cache SET value = ? WHERE id = 1');
    
    $update->execute(array($json));
}else {
    echo "Error updating data...";
}

?>
