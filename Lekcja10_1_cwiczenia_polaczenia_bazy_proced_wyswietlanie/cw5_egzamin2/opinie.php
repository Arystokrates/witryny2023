<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
    <?php 
    $conn = mysqli_connect("localhost","root","","hurtownia2");
    ?>
</head>
<body>
    <header>
        <h1>Hurtownia spożywcza</h1>
    </header>
    <main>
        <h2>Opinie naszych klientów</h2>
        <?php 
        $query = "SELECT zdjecie, imie, opinia
        FROM klienci
        INNER JOIN opinie
        ON opinie.Klienci_id = klienci.id
        INNER JOIN typy ON typy.id = klienci.Typy_id
        WHERE typy.id = 2 OR typy.id = 3;";
        
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $img = $row["zdjecie"];
            $name = $row["imie"];
            $opinion = $row["opinia"];
            echo "<div class='opinion'>
            <img src="."zad3/$img"." alt='klient'></img>
            <blockquote>$opinion</blockquote>
            <h4>$name</h4>
            </div>";
        }
        ?>
    </main>
    <div>
        <footer>
            <h3>Współpracują z nami</h3>
            <a href="http://sklep.pl">Sklep 1</a>
        </footer>
        <footer>
            <h3>Nasi top klienci</h3>
            <ol>
                <?php 
                $query = "SELECT imie, nazwisko, punkty
                FROM KLIENCI
                ORDER BY 3
                DESC
                LIMIT 3;";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) { 
                    $first_name = $row["imie"];
                    $last_name = $row["nazwisko"];
                    $points = $row["punkty"];
                    echo "<li>$first_name $last_name, $points pkt.</li>";
                }
                ?>
            </ol>
        </footer>
        <footer>
            <h3>Skontaktuj się</h3>
            <p>telefon: 111222333</p>
        </footer>
        <footer>
            <h3>Autor: numer zdającego</h3>
        </footer>
    </div>
    <?php 
    mysqli_close($conn);
    ?>
</body>
</html>