<?php
if ($_GET)
{
    $route_id =$_GET["id"];
    $db = new PDO('mysql:host=localhost;dbname=saatairport','root','');
    $query=$db->prepare("delete from Route where route_id=?");
    $result=$query->execute(array($route_id));
    header("Location: Route.php");
}
?>