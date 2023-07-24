<?php
if($_POST)
{
    $name =$_POST["name"];
    $code =$_POST["code"];
    $city =$_POST["city"];
    $country =$_POST["country"];
    $db = new PDO('mysql:host=localhost;dbname=saatairport','root','');
    $query = $db->prepare("INSERT INTO airport (name, code, city, country) VALUES (?, ?, ?, ?)");
    $add = $query->execute(array($name, $code, $city, $country));
    header("Location: Airport.php");
}

?>