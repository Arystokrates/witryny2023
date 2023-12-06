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
    $result = mysqli_query($mysqliCon, "SELECT NAZWISKO 'Nazwisko', 
    ID_ZESP 'ID Zespołu' 
    FROM pracownicy 
    WHERE ID_ZESP = 20 AND (NAZWISKO LIKE 'M%' OR NAZWISKO LIKE '%ski');");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        foreach ($row as $key => $value) {
            echo "$key = $value, ";
        }
        echo "<br>";
    }
    mysqli_close($mysqliCon);
    ?>
</body>
</html>