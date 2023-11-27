<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw3</title>
    <style>
        .error-box{
            color: red;
            height: 8px;
            margin-top: 8px;
        }
    </style>
    <?php
    function validate_number_field($value){
        if (strlen($value)==0) { $GLOBALS["IS_OK"] = false; return "Pole nie może być puste"; }
        else if (!is_numeric($value)) { $GLOBALS["IS_OK"] = false; return "Musi być wartość liczbowa"; }
    }

    // flags
    $GLOBALS["IS_OK"] = true;

    // getting parameters
    $a = trim(str_replace(',', '.', $_GET["a"] ?? ""));
    $b = trim(str_replace(',', '.', $_GET["b"] ?? ""));
    $c = trim(str_replace(',', '.', $_GET["c"] ?? ""));


    ?>
</head>
<body>
    <h3>Równanie kwadratowe</h3>
    <h3>ax<sup>2</sup> + bx + c = 0</h3>
    <form action="">
    <label for="a">
    <input name="a" id="a" type="text" value="<?php echo $a ?>">
    <br>
    <div class="error-box">
    <?php 
        echo validate_number_field($a);
    ?>
    </div>
    <br>
    <label for="b">
    <input name="b" id="b" type="text" value="<?php echo $b ?>">
    <br>
    <div class="error-box">
    <?php 
        echo validate_number_field($b);
    ?>
    </div>
    <br>
    <label for="c">
    <input name="c" id="c" type="text" value="<?php echo $c ?>">
    <br>
    <div class="error-box">
    <?php 
        echo validate_number_field($c);
    ?>
    </div>
    <br>
    <input type="submit" value="Rozwiąż równanie">
    <p class="output">
    <?php 
    if ($IS_OK) {
        echo "a = $a, b = $b, c = $c<br>";
        $delta = $b**2 - 4*$a*$c;
        echo "delta = ".number_format($delta, 2, ",", ".")."<br>";
        if ($delta > 0) {
            $x1 = (-$b-sqrt($delta))/(2*$a);
            $x2 = (-$b+sqrt($delta))/(2*$a);
            echo "x1 = ".number_format($x1, 2, ",", ".").", x2 = ".number_format($x2, 2, ",", ".");
        }
        else if ($delta == 0) {
            $x0 = (-$b)/(2*$a);
            echo "x0 = ".number_format($x0, 2, ",", ".");
        }
        else echo "<b>Brak pierwiastków</b>";
    }
    ?>
    </p>
    </form>
</body>
</html>