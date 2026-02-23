<?php
require 'Database.php';
require 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$user->nom = "alice";
$user->email ="alice@test.com" ; 
$user->create();

$list = $user->read();
foreach($list as $ $u){
    echo $u['nom'] . "-" . $u['email'] . "<br>";
}
