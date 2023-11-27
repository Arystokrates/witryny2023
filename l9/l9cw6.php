<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw6</title>
    <style>
        .error-box{
            color: red;
            height: 8px;
            margin-top: 8px;
        }
        img{
            max-height: 300px;
            max-width: 300px;
        }
    </style>
    <?php
    function check_if_checked($my_name, $goal) {
        if ($my_name == $goal) echo "checked";
    }

    function validate_text_field($value) {
        if (strlen($value)==0) return "Pole nie może być puste";
        return;
    }
    $GLOBALS["IS_OK"] = true;

    $first_name = trim($_GET["fname"] ?? "");
    if (strlen($first_name>0)) $first_name = mb_strtoupper($first_name)[0].mb_substr($first_name, 1, mb_strlen($first_name));

    $car = $_GET["cars"] ?? null;

    $dir = "graphics";
    $ext = "png";

    ?>
</head>
<body>
    <form action="">
        <h3>Ulubiony samochód</h3>
        <label for="fname">Podaj swoje imię: </label><br><br>
        <input type="text" id="fname" name="fname" value="<?php echo $first_name ?>">
        <br>
        <div class="error-box">
            <?php 
            echo validate_text_field($first_name);
            ?>
        </div>
        <br>
        <p style="margin: 0;">Wybierz swój ulubiony samochód:</p><br>
        <input type="radio" name="cars" value="toyota" id="toyota" <?php check_if_checked("toyota", $car)?>>
        <label for="toyota"> Toyota</label><br>
        <input type="radio" name="cars"  value="audi" id="audi" <?php check_if_checked("audi", $car)?>>
        <label for="audi"> Audi</label><br>
        <input type="radio" name="cars"  value="bmw" id="bmw" <?php check_if_checked("bmw", $car)?>>
        <label for="bmw"> BMW</label>
        <br>
        <div class="error-box">
            <?php 
            if (!$car){
                echo "Musisz coś zaznaczyć!";
                $IS_OK = false;
            }
            ?>
        </div>
        <br>
        <input type="submit" value="Pokaż">
    </form>
    <?php
    if ($IS_OK) echo "<br><br> $first_name, samochód wybrany przez Ciebie może wyglądać tak: <br><br> 
        <img src='$dir/$car.$ext' alt='Obraz przedstawiający samochód marki $car'></img><br><br>
        Jak ci się podoba?";
    ?>
</body>
</html>