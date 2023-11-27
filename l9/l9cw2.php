<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw2</title>
    <style>
        .error-box{
            color: red;
            height: 30px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    function select_if_selected($my_name, $goal){
        if ($my_name == $goal) echo "checked";
    }

    function validate_number_field($value){
        if (strlen($value)==0) return "Pole nie może być puste";
        else if (!is_numeric($value)) return "Musi być wartość liczbowa";
    }

    // variable declaration
    $a = trim($_GET["a"])?? null;
    $b = trim($_GET["b"])?? null;
    $o = $_GET["operation"]?? null;

    $r = null;
    if ($a !== null && $b !== null){
        if ($o == "+") $r = $a+$b;
        else if ($o == "-") $r = $a-$b;
        else if ($o == "*") $r = $a*$b;
        else if ($o == "/" && $b!=0) $r = $a/$b;
    }

    ?>
    <form>
        <label for="a">Wpisz 1. liczbę: </label><br><br>
        <input type="number" id="a" name="a" min="-100" max="100" value="<?php echo $a ?>">
        <br>
        <div class="error-box">
        <?php 
        echo validate_number_field($a);
        ?>
        </div>
        <label for="b">Wpisz 2. liczbę: </label>
        <br><br>
        <input type="number" id="b" name="b" min="-100" max="100" value="<?php echo $b ?>">
        <br>
        <div class="error-box">
        <?php 
        echo validate_number_field($b);
        ?>
        </div>
        <label>Wybierz dzialanie:</label>
        <br><br>        
        <input type="radio" id="sum" name="operation" value="+" <?php select_if_selected("+", $o) ?>>
        <label for="sum">+</label><br>
        <input type="radio" id="diff" name="operation" value="-" <?php select_if_selected("-", $o) ?>>
        <label for="diff">-</label><br>
        <input type="radio" id="product" name="operation" value="*" <?php select_if_selected("*", $o) ?>>
        <label for="product">*</label><br>
        <input type="radio" id="quotient" name="operation" value="/" <?php select_if_selected("/", $o) ?>>
        <label for="quotient">/</label>
        <br><br>
        <input type="submit" value="Wykonaj" name="post">
</form>
    <p class="chosen-numbers">
        <?php
        echo "Wybrane liczby: $a i $b";
        ?>
    </p>
    <h3>
        <?php
        if ($r!==null) echo "$a $o $b = $r";
        ?>
    </h3>
    <h3 style="color: red;">
        <?php
        if ($o == "/" && $b == 0) echo "Nie dziel przez 0!!!";
        ?>
    </h3>
</body>
</html>