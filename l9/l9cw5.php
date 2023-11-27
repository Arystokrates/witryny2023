<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw5</title>
    <style>
        label{
            font-weight: bold;
            margin-top: 5px;
        }
        .error-box{
            color: red;
            height: 8px;
            margin-top: 8px;
        }
    </style>
    <?php 
    function select_if_selected($method = "get", $select_name, $option_name){
        if (strtolower($method) == "get") { if(isset($_GET[$select_name]) && $_GET[$select_name] == $option_name) echo "selected"; }
        else if (strtolower($method) == "post") { if(isset($_POST[$select_name]) && $_POST[$select_name] == $option_name) echo "selected"; }
    }
    function validate_number_field($value) {
        if (strlen($value)==0) { $GLOBALS["IS_OK"] = false; return "Pole nie może być puste"; }
        else if (!is_numeric($value)) { $GLOBALS["IS_OK"] = false; return "Musi być wartość liczbowa"; }
        else if ($value<0) { $GLOBALS["IS_OK"] = false; return "Liczba musi być większa lub równa 0"; }
        return;
    }
    
    $GLOBALS["IS_OK"] = true;
      
    $l = trim($_GET["levels"] ?? "") ;
    ?>
</head>
<body>
    <form action="">
        <h3>Piramida znaków</h3>
        <label for="characters">Wybierz znak: </label>
        <select name="characters" id="characters">
            <option value="*" <?php select_if_selected("get", "characters", "*")?>>*</option>
            <option value="$" <?php select_if_selected("get", "characters", "$")?>>$</option>
            <option value="@" <?php select_if_selected("get", "characters", "@")?>>@</option>
            <option value="#" <?php select_if_selected("get", "characters", "#")?>>#</option>
            <option value="^" <?php select_if_selected("get", "characters", "^")?>>^</option>
            <option value="%" <?php select_if_selected("get", "characters", "%")?>>%</option>
        </select>
        <br><br>
        <label for="levels">Wybierz ilość poziomów: </label>
        <input type="number" min="0" id="levels" name="levels" value="<?php echo $l ?>">
        <div class="error-box">
            <?php 
            echo validate_number_field($l);
            ?>
        </div>
        <br>
        <input type="submit" value="Utwórz">
    </form>
    <p class="output">
        <?php 
        if ($IS_OK) {
            $character = $_GET["characters"];
            echo "Wybrałeś/aś $l poziomów piramidy dla znaku $character<br><br>";
            for ($i=1; $i<=$l; $i++) {
                for ($j=1; $j<=$i; $j++) {
                    echo $character;
                }
                echo "<br>";
            }
        } 
        ?>
    </p>
</body>
</html>