<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw1</title>
    <?php include("connect_db.php") ?>
</head>
<body>
    <?php
    $result = mysqli_query($mysqliCon, "SELECT p1.ID_PRAC, p1.NAZWISKO, 
    p1.ID_SZEFA, p2.NAZWISKO 'nazwisko szefa'
    FROM pracownicy p1
    LEFT JOIN pracownicy p2
    ON p1.ID_SZEFA = p2.ID_PRAC;");
    $i = 1;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo $i++." ";
        foreach ($row as $key => $value) {
            echo strtolower($key).": $value ";
        }
        echo "<br>";
    }
    mysqli_close($mysqliCon);
    ?>
</body>
</html>