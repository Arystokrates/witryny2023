<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twój wskaźnik BMI</title>
    <link rel="stylesheet" href="styl4.css"></link>
</head>
<body>
    <div class="flex">
        <header>
            <h2>Oblicz wskaźnik BMI</h2>
        </header>
        <div class="logo">
            <img src="wzor.png" alt="liczymy BMI">
        </div>
    </div>
    <div class="flex">
        <div class="left">
            <img src="rys1.png" alt="zrzuć kalorie!">
        </div>
        <div class="right">
            <h1>Podaj dane</h1>
            <form method="POST">
                <label for="weight">Waga: </label>
                <input id="weight" name="weight" type="number"><br>
                <label for="height">Wzrost[cm]: </label>
                <input id="height" name="height" type="number">
                <br>
                <input type="submit" value="Licz BMI i zapisz wynik">
                <?php 
                    $conn = new mysqli('localhost', 'root', '', 'egzamin2137');

                    $weight = $_POST['weight'] ?? "";
                    $height = $_POST['height'] ?? "";
                    if (strlen($weight)  > 0 && strlen($height) > 0){
                        $weight = intval($weight);
                        $height = intval($height);
                        $bmi = ($weight/($height**2))*10000;
                        echo "<p>Twoja waga: $weight; Twój wzrost: $height<br>BMI wynosi $bmi</p>";
                        
                        $status = 0;
                        if ($bmi < 19) $status = 1;
                        elseif ($bmi < 26) $status = 2;
                        elseif ($bmi < 31) $status = 3;
                        else $status = 4;
                        
                        $curdate = date('Y-m-d');

                        $sql = "INSERT INTO `wynik` (`bmi_id`, `data_pomiaru`, `wynik`) VALUES
                        ($status, \"$curdate\", $bmi)";
                        $conn->query($sql);
                    }
                ?>
            </form>
        </div>
    </div>
    <main>
        <table>
            <tr>
                <th>lp.</th>
                <th>Interpretacja</th>
                <th>zaczyna się od...</th>
                <?php 
                    $sql = "SELECT id, informacja, wart_min 
                    from bmi;";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row['id']."</td><td>".$row['informacja']."</td><td>".$row['wart_min']."</td></tr>";
                    }

                    $conn->close();
                ?>
            </tr>
        </table>
    </main>
    <footer>
        Autor: Ja
        <a href="kw2.jpg">Wynik działania kwerendy 2</a>
    </footer>
</body>
</html>