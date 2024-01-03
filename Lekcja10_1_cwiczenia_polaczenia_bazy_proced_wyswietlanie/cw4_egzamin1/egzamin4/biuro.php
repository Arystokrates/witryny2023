<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki krajoznawcze</title>
    <link rel="stylesheet" href="styl4.css">
    <?php 
    $conn = mysqli_connect("localhost","root","","egzamin42");
    ?>
</head>
<body>
    <header>
        <h1>WITAMY W BIURZE PODRÓŻY</h1>
    </header>
    <section>
        <h3>ARCHIWUM WYCIECZEK</h3>
        <?php
        $query = "SELECT id, cel, cena
        FROM wycieczki
        WHERE dostepna = 0;";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)){
            echo $row["id"]." ".$row["cel"]."cena: ".$row["cena"]."<br>";
        }
        ?>
    </section>
    <main>
        <aside class="left">
            <h3>Najtaniej...</h3>
            <table>
                <tr>
                    <td>Włochy</td>
                    <td>od 1200 zł</td>
                </tr>
                <tr>
                    <td>Francja</td>
                    <td>od 1200 zł</td>
                </tr>
                <tr>
                    <td>Hiszpania</td>
                    <td>od 1400 zł</td>
                </tr>
            </table>
        </aside>
        <article>
            <h3>TU BYLIŚMY</h3>
            <?php 
            $result = mysqli_query($conn,"SELECT nazwaPliku, podpis
            FROM zdjecia
            ORDER BY 2
            DESC;");
            while ($row = mysqli_fetch_assoc($result)){
                echo "<img src=".$row['nazwaPliku']." alt=".$row['podpis'].">";
            }

            ?>
        </article>
        <aside class="right">
            <h3>SKONTAKTUJ SIĘ</h3>
            <a href="wycieczki@wycieczki.pl">napisz do nas</a>
            <p>telefon: 555666777</p>
        </aside>
    </main>
    <footer>
        <p>Stronę wykonał: - - -</p>
    </footer>
    <?php mysqli_close($conn); ?>
</body>
</html>