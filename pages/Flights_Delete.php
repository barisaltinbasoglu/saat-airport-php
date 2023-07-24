<?php
if ($_GET)
{
    $flights_id =$_GET["id"];
    $db = new PDO('mysql:host=localhost;dbname=saatairport','root','');
    $query=$db->prepare("delete from flights where flights_id=?");
    $result=$query->execute(array($flights_id));
    header("Location: Flights.php");
}
?>