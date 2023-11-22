<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw2</title>
</head>
<body>
    <?php
    // variable declaration
    
    ?>
    <form method="POST">
        <label for="a">Wpisz 1. liczbę: </label><br><br>
        <input type="text" id="a" name="a">
        <br><br>
        <label for="b">Wpisz 2. liczbę: </label><br><br>
        <input type="text" id="b" name="b">
        <br><br>
        <label>Wybierz dzialanie:</label><br><br>        
        <input type="radio" id="sum" name="sum">
        <label for="sum">+</label><br>
        <input type="radio" id="diff" name="difference">
        <label for="diff">-</label><br>
        <input type="radio" id="product" name="product">
        <label for="product">*</label><br>
        <input type="radio" id="quotient" name="quotient">
        <label for="quotient">/</label>
        <br><br>
        <input type="submit" value="Wykonaj" name="post">
</form>
</body>
</html>