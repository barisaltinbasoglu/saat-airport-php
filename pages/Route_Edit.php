<html>
<body>

    <?php

        if($_POST)
        {
            $source=$_POST["source"];
            $destination = $_POST["destination"];
            $distanceInMiles = $_POST["distancelnMiles"];
            $edit_id=$_POST["hdnid"];
            $db = new PDO('mysql:host=localhost;dbname=saatairport','root','');
            $query=$db->prepare("update route set source=?, destination=?, distancelnMiles=? WHERE route_id=?");
            $update = $query->execute(array($source, $destination, $distanceInMiles, $edit_id));
            header("Location: Route.php");       
        }
        if($_GET)
        {
            $route_id=$_GET["id"];
            $db = new PDO('mysql:host=localhost;dbname=saatairport','root','');
            $query = $db->prepare("SELECT * FROM route WHERE route_id=?");
            $query->execute(array($route_id));
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if($row)
            {
                $source = $row["source"];
                $destination = $row["destination"];
                $distanceInMiles = $row["distancelnMiles"];
            }
        }

    ?>

Edit Route<br>
        <form action="Route_Edit.php" method="POST">
          <input type="hidden" name="hdnid" value="<?php echo $route_id ?>" >
          <br>
          <?php
      $route = $db->query("select * from airport");
    ?>
    <label for="airport">Airport:</label>
    <select id="airport" name="airport">
      <?php foreach($route as $ctrl) { ?>
      <option value="<?php echo $ctrl["code"]; ?>"><?php echo $ctrl["code"]; ?></option>
      <?php } ?>
    </select>
          <br>
          <?php
      $route = $db->query("select * from airport");
    ?>
    <label for="airport">Airport:</label>
    <select id="airport" name="airport">
      <?php foreach($route as $ctrl) { ?>
      <option value="<?php echo $ctrl["city"]; ?>"><?php echo $ctrl["city"]; ?></option>
      <?php } ?>
    </select>
          <br>
          <input type="text" name="distancelnMiles" value="<?php echo $distanceInMiles ?>">
          <br>
          <input type="submit" value="Edit">
                </form>
                </footer>

</body>
</html>