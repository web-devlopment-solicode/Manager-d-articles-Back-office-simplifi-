<?php 
$host='localhost';
$dbname='bdlog' ;
$username = 'root';
$password = '';
try{
    $ouma = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
    $ouma->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "good girl" ;
} catch(PDOException $e){
echo "problem de connexion"  ; 
}

?>