<?php
if ($_POST) {
    $flightNumber = $_POST["flightNumber"];
    $route = $_POST["route"];
    $price = $_POST["price"];
    $departureTime = $_POST["departureTime"];
    $arrivelTime = $_POST["arrivelTime"];
    $capacity = $_POST["capacity"];
    $status = $_POST["status"];
    
    $db = new PDO('mysql:host=localhost;dbname=saatairport', 'root', '');
    $query = $db->prepare("INSERT INTO flights (flightNumber, route, price, departureTime, arrivelTime, capacity, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $add = $query->execute(array($flightNumber, $route, $price, $departureTime, $arrivelTime, $capacity, $status));
    header("Location: Flights.php");
}
?>
