<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw1</title>
    <style>
        table, td, th {
            border-collapse: collapse;
            border: 2px black solid;
        }
        td, th{
            width: 500px;
            height: 40px;
            text-align: center;
        }
    </style>
    <?php include("connect_db.php") ?>
</head>
<body>
    <?php 
    $query = "SELECT NAZWISKO, 
    ETAT, zespoly.NAZWA, zespoly.ADRES
    FROM pracownicy 
    INNER JOIN zespoly
    ON pracownicy.ID_ZESP = zespoly.ID_ZESP
    WHERE zespoly.adres LIKE 'PIOTROWO%';";

    $result = mysqli_query($mysqliCon, $query);
    ?>
    <table>
        <tr>
            <th>Nazwisko</th>
            <th>Etat</th>
            <th>Nazwa zespołu</th>
            <th>Adres zespołu</th>
        </tr>
        <?php 
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    mysqli_close($mysqliCon);
    ?>
</body>
</html>