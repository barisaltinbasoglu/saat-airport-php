<html>
<body>

    <?php

        if($_POST)
        {
            $name=$_POST["name"];
            $code = $_POST["code"];
            $city = $_POST["city"];
            $country = $_POST["country"];
            $edit_id=$_POST["hdnid"];
            $db = new PDO('mysql:host=localhost;dbname=saatairport','root','');
            $query=$db->prepare("update airport set name=?, code=?, city=?, country=? WHERE airport_id=?");
            $update = $query->execute(array($name, $code, $city, $country, $edit_id));
            header("Location: Airport.php");       
        }
        if($_GET)
        {
            $airport_id=$_GET["id"];
            $db = new PDO('mysql:host=localhost;dbname=saatairport','root','');
            $query = $db->prepare("SELECT * FROM airport WHERE airport_id=?");
            $query->execute(array($airport_id));
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if($row)
            {
                $name = $row["name"];
                $code = $row["code"];
                $city = $row["city"];
                $country = $row["country"];
            }
        }

    ?>

Edit Airport<br>
        <form action="Airport_Edit.php" method="POST">
          <input type="hidden" name="hdnid" value="<?php echo $airport_id ?>" >
          <br>
          <input type="text" name="name" value="<?php echo $name ?>">
          <br>
          <input type="text" name="code" value="<?php echo $code ?>">
          <br>
          <input type="text" name="city" value="<?php echo $city ?>">
          <br>
          <input type="text" name="country" value="<?php echo $country ?>">
          <br>
          <input type="submit" value="Edit">
                </form>
                </footer>

</body>
</html>