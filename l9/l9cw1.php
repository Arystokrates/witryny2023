<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw1</title>
    <style>
    <?php
    function select_if_selected($method = "get", $select_name, $option_name){
        if (strtolower($method) == "get") { if(isset($_GET[$select_name]) && $_GET[$select_name] == $option_name) echo "selected"; }
        else if (strtolower($method) == "post") { if(isset($_POST[$select_name]) && $_POST[$select_name] == $option_name) echo "selected"; }
    }

    $METHOD = "POST";

    if ($METHOD == "POST") $color = $_POST["colors"] ?? "red";
    else if ($METHOD == "GET") $color = $_GET["colors"] ?? "red";

    echo "body{background-color: $color;}";
    ?>
    </style>
</head>
<body>
    <h3>Wybór koloru tła strony</h3>
    <form method=<?php echo $METHOD; ?>>
        <label for="colors">Wybierz kolor tła:</label><br><br>
        <select name="colors" id="colors">
            <option value="red" <?php select_if_selected("$METHOD", "colors", "red") ?>>czerwony</option>
            <option value="green" <?php select_if_selected("$METHOD", "colors", "green") ?>>zielony</option>
            <option value="blue" <?php select_if_selected("$METHOD", "colors", "blue")  ?>>niebieski</option>
        </select>
        <br><br>
        <input type="submit" value="Zmień kolor strony">
    </form>
</body>
</html>