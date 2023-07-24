<?php
if ($_GET)
{
    $airport_id =$_GET["id"];
    $db = new PDO('mysql:host=localhost;dbname=saatairport','root','');
    $query=$db->prepare("delete from airport where airport_id=?");
    $result=$query->execute(array($airport_id));
    header("Location: Airport.php");
}
?>