<html>
<body>

<?php
if ($_POST) {
    $flightNumber = $_POST["flightNumber"];
    $route = $_POST["route"];
    $price = $_POST["price"];
    $departureTime = $_POST["departureTime"];
    $arrivelTime = $_POST["arrivelTime"];
    $capacity = $_POST["capacity"];
    $status = $_POST["status"];
    $edit_id = $_POST["hdnid"];

    $db = new PDO('mysql:host=localhost;dbname=saatairport', 'root', '');
    $query = $db->prepare("UPDATE flights SET flightNumber=?, route=?, price=?, departureTime=?, arrivelTime=?, capacity=?, status=? WHERE flights_id=?");
    $update = $query->execute(array($flightNumber, $route, $price, $departureTime, $arrivelTime, $capacity, $status, $edit_id));

    header("Location: Flights.php");
}

if ($_GET) {
    $flights_id = $_GET["id"];

    $db = new PDO('mysql:host=localhost;dbname=saatairport', 'root', '');
    $query = $db->prepare("SELECT * FROM flights WHERE flights_id=?");
    $query->execute(array($flights_id));
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $flightNumber = $row["flightNumber"];
        $route = $row["route"];
        $price = $row["price"];
        $departureTime = $row["departureTime"];
        $arrivelTime = $row["arrivelTime"];
        $capacity = $row["capacity"];
        $status = $row["status"];
    }
}
?>

Edit Flights<br>
<form action="Flights_Edit.php" method="POST">
    <input type="hidden" name="hdnid" value="<?php echo $flights_id ?>">
    <br>
    <input type="text" name="flightNumber" value="<?php echo $flightNumber ?>">
    <br>
    <?php
      $flights = $db->query("select * from route");
    ?>
    <label for="route">Route:</label>
    <select id="route" name="route">
      <?php foreach($flights as $ctrl) { ?>
      <option value="<?php echo $ctrl["source"]; ?>"><?php echo $ctrl["source"]; ?></option>
      <?php } ?>
    </select>
    <br>
    <input type="text" name="price" value="<?php echo $price ?>">
    <br>
    <input type="datetime-local" name="departureTime" value="<?php echo $departureTime ?>">
    <br>
    <input type="datetime-local" name="arrivelTime" value="<?php echo $arrivelTime ?>">
    <br>
    <input type="text" name="capacity" value="<?php echo $capacity ?>">
    <br>

    <label for="Scheduled">Scheduled</label>
    <input type="radio" name="status" id="Scheduled" value="Scheduled" <?php echo $status === "Scheduled" ? "checked" : ""; ?>>

    <label for="departed">Departed</label>
    <input type="radio" name="status" id="departed" value="Departed" <?php echo $status === "Departed" ? "checked" : ""; ?>>

    <label for="arrived">Arrived</label>
    <input type="radio" name="status" id="arrived" value="Arrived" <?php echo $status === "Arrived" ? "checked" : ""; ?>>

    <input type="submit" value="Edit">
</form>
</body>
</html>