<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twój wskaźnik BMI</title>
    <link rel="stylesheet" href="styl4.css"></link>
    <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'egzamin2137')
    ?>
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
            <form action="" method="POST">
                <label for="weight">Waga: </label>
                <input id="weight" name="weight" type="number"><br>
                <label for="Height">Wzrost[cm]: </label>
                <input id="Height" name="Height" type="number">
                <input type="submit" value="Licz BMI i zapisz wynik">
                <?php 
                    $weight = $_POST['weight'] ?? "";
                    $height = $_POST['height'] ?? "";
                    if (strlen($weight)  > 0 && strlen($height) > 0){
                        $weight = intval($weight);
                        $height = intval($height);
                        $bmi = $weight/$height**2;
                        // tu jestes
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
                
                ?>
            </tr>
        </table>
    </main>
    <footer>
        Autor: Ja
        <a href="kw2.jp">Wynik działania kwerendy 2</a>
    </footer>
    <?php 
        $mysqli_close()
    ?>
</body>
</html>