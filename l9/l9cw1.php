<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw1</title>
    <style>
    <?php
    function select_if_selected($method = "get", $select_name, $option_name){
        echo $method;
        if (strtolower($method) == 'get') if(isset($_GET[$select_name]) && $_GET[$select_name] == $option_name) echo "selected";
        else if (strtolower($method) == 'post') if(isset($_POST[$select_name]) && $_POST[$select_name] == $option_name) echo "selected";
    }

    $color = $_POST['color']?? "red";
    echo "body{background-color: $color}";

    $METHOD = "POST";
    ?>
    </style>
</head>
<body>
    <h3>Wybór koloru tła strony</h3>
    <form method="{{$METHOD}}">
        <label for="colors">Wybierz kolor tła:</label><br><br>
        <select name="color" id="colors">
            <option value="red" <?php select_if_selected("post", "colors", "red") ?>>czerwony</option>
            <option value="green" <?php select_if_selected("post", "colors", "green") ?>>zielony</option>
            <option value="blue" <?php select_if_selected("post", "colors", "blue") ?>>niebieski</option>
        </select>
        <br><br>
        <input type="submit" value="Zmień kolor strony">
    </form>
</body>
</html>