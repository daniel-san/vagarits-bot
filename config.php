<?php
//Database credentials
$config = array(
    'DB_host' => '',
    'DB_user' => '',
    'DB_pass' => '',
    'DB_name' => ''
);

//telegram bot api key
$api_key = '';

//DB connection instance
$connection = new PDO("mysql:host={$config['DB_host']};dbname={$config['DB_name']};charset=utf8;",$config['DB_user'],$config['DB_pass']);
?>
