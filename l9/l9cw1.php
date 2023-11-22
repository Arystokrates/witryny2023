<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw1</title>
    <style>
    <?php
    $color = $_POST['color'];
    echo "body{background-color: $color}";
    ?>
    </style>
</head>
<body>
    <h3>Wybór koloru tła strony</h3>
    <form method="POST">
        <label for="colors">Wybierz kolor tła:</label><br><br>
        <select name="color" id="colors">
            <option value="red" <?php if(isset($_POST['color']) && $_POST['color'] == 'red') {echo "selected=selected"; } ?>>czerwony</option>
            <option value="green" <?php if (isset($_POST['color']) && $_POST['color'] == 'green') {echo "selected=selected"; } ?>>zielony</option>
            <option value="blue" <?php if(isset($_POST['color']) && $_POST['color'] == 'blue') {echo "selected=selected"; } ?>>niebieski</option>
        </select>
        <br><br>
        <input type="submit" value="Zmień kolor strony" name="post">
    </form>
</body>
</html>