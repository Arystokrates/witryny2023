<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw2</title>
    <style>
        form *{
            margin-bottom: 10px;
        }
        p{
            background-color: red;
            color: white;
            padding-left: 10px;
            width: 15%;
        }
        .error-box{
            color: red;
        }
    </style>
    <?php 
    require("validate.php");


    $IS_OK = true;

    $fuel_price = $_GET["fuel_price"] ?? "";
    $distance = $_GET["distance"] ?? "";
    $fuel_consumption = $_GET["fuel_consumption"] ?? "";
    ?>
</head>
<body>
    <form method="post">
        <label for="fuel_price">Koszt benzyny: </label><br>
        <input type="text" id="fuel_price" name="fuel_price" placeholder="cena paliwa" value="<?= $fuel_price ?>"><br>
        <div class="error-box">
        <?php 
            if (validate_number_field($fuel_price)) {
                echo validate_number_field($fuel_price);
                $IS_OK = "false";
            }
        ?>
        </div>
        <label for="distance">Dystans: </label><br>
        <input type="number" id="distance" name="distance" placeholder="dystans" value="<?= $distance ?>"><br>
        <div class="error-box">
        <?php 
            if (validate_number_field($distance)) {
                echo validate_number_field($distance);
                $IS_OK = "false";
            }
        ?>
        </div>
        <label for="fuel_consumption">Średnie spalanie: </label><br>
        <input type="text" id="fuel_consumption" name="fuel_consumption" placeholder="średnie spalanie" value="<?= $fuel_consumption ?>"><br>
        <div class="error-box">
        <?php 
            if (validate_number_field($fuel_consumption)) {
                echo validate_number_field($fuel_consumption);
                $IS_OK = "false";
            }
        ?>
        </div>
        <input type="submit">
        <?php
        echo $IS_OK;
        if ($IS_OK) {
            $is_done = isset($_GET["submit"]) ? true : false;
            header("Location: koszt.php");
        }
        ?>
    </form>
</body>
</html>