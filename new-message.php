<?php
require('config.php');

$data = array_merge((array) $_POST, (array) json_decode(utf8_decode(file_get_contents('php://input')), true));

$url = "https://api.telegram.org/bot{$api_key}/sendMessage";
$message = $data['message'];

if($message['text'] === "/vagarits"){
    //getting cached data to send to user
    $prepare = $connection->prepare('SELECT value FROM cache WHERE id = 1');
    $prepare->execute();
    $json_data = $prepare->fetch(PDO::FETCH_ASSOC);
    
    $data = json_decode($json_data["value"],true);
    
    $cand_total = $data["total_candidates_count"];
    
    $cand0 = $data["recent_candidates"][0]["email"];
    $cand1 = $data["recent_candidates"][1]["email"];
    $cand2 = $data["recent_candidates"][2]["email"];

    if(count($data["recent_candidates"]) == 0){
        $json_data = [
            "chat_id" => $message['chat']['id'],
            "text" => "Não há candidatos cadastrados",
        ];
    } else {
        $json_data = [
            "chat_id" => $message['chat']['id'],
            "text" => "Há {$cand_total} candidatos cadastrados.\nOs emails dos últimos candidatos são: {$cand0}, {$cand1}, {$cand2}.",
        ];
    }    
    
    //changing message object to a json format
    $post_json = json_encode($json_data);
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
    
    // Receive server response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    //sending the message to the client
    $response_json = curl_exec($ch);
    
    curl_close($ch);
    
    $response = json_decode($response_json, true);
}
?>
