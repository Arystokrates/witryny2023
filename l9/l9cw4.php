<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw4</title>
    <style>
        label{
            font-weight: bold;
        }
        .error-box{
            color: red;
            height: 8px;
            margin-top: 8px;
        }
        table, th, td {
            border-collapse: collapse;
            border: 2px solid black;

        }
        th, td{
            width: 50px;
            height: 50px;
            font-size: 25px;
            text-align: center;
        }
    </style>
    <?php
    function validate_number_field($value) {
        if (strlen($value)==0) { $GLOBALS["IS_OK"] = false; return "Pole nie może być puste"; }
        else if (!is_numeric($value)) { $GLOBALS["IS_OK"] = false; return "Musi być wartość liczbowa"; }
        else if ($value < 0) { $GLOBALS["IS_OK"] = false; return "Liczba musi być większa lub równa 0"; }
        return;
    }
    $p = trim(str_replace(',', '.', $_GET["p"] ?? null));
    $q = trim(str_replace(',', '.', $_GET["q"] ?? null));

    $GLOBALS["IS_OK"] = true;
    ?>
</head>
<body>
    <form action="">
    <h3>Tabliczka mnożenia</h3>
    <label for="p">Podaj liczbę początkową: </label>
    <input type="number" min="0" name="p" id="p" value="<?php echo $p ?>">
    <br>
    <div class="error-box">
    <?php 
        echo validate_number_field($p);
    ?>
    </div>
    <br>
    <label for="q">Podaj liczbę końcową: </label>
    <input type="number" name="q" min="0" id="q" value="<?php echo $q ?>">
    <div class="error-box">
    <?php 
        $e = validate_number_field($q);
        if (empty($e)) {
            if ($q < $p) {
                echo "Koniec nie może być mniejszy od początku!";
                $IS_OK = false;
            }
        }
        else echo $e;
    ?>
    </div>
    <br>
    <input type="submit" name="submit" value="Utwórz">
    </form>
    <main>
        <p>
            <?php
            if ($IS_OK) echo "a = $p, b = $q";
            ?>
        </p>
        <table>
            <tr>
                <?php
                if ($IS_OK) {
                    echo "<th></th>";
                    for ($i=$p; $i<=$q; $i++) {
                        echo "<th>$i</th>";
                    }
                    for ($i=$p; $i<=$q; $i++) {
                        echo "<tr>",
                        "<th>$i</th>";
                        for ($j=$p; $j<=$q; $j++) {
                            echo "<td>".$i*$j."</td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>
            </tr>
        </table>
    </main>
</body>
</html>