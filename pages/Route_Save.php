<?php
if($_POST)
{
    $source =$_POST["source"];
    $destination =$_POST["destination"];
    $distancelnMiles =$_POST["distancelnMiles"];
    $db = new PDO('mysql:host=localhost;dbname=saatairport','root','');
    $query = $db->prepare("INSERT INTO route (source, destination, distancelnMiles) VALUES (?, ?, ?)");
    $add = $query->execute(array($source, $destination, $distancelnMiles));
    header("Location: Route.php");
}

?>