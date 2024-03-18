<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>piłka nożna</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <h3>Reprezentacja polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </header>
    <div class="flex">
        <div class="left">
            <form method="POST">
                <select name="roles" id="roles">
                    <option value="1">Bramkarze</option>
                    <option value="2">Obrońcy</option>
                    <option value="3">Pomocnicy</option>
                    <option value="4">Napastnicy</option>
                </select>
                <input type="submit" name="submit" id="submit" value="Zobacz">
            </form>
            <img src="zad2.png" alt="piłka">
            <p>Autor: 21376942069</p>
        </div>
        <div class="right">
            <ol>
                <?php
                    $isOK = true;

                    $conn = mysqli_connect("localhost", "root", "", "egzamin");
                    if ($conn->connect_errno) die("Nie udało się połączyć z bazą" . $conn->connect_error);

                    $role = intval($_POST['roles'] ?? 0);

                    if ($role > 0){
                        $sql = <<< QUERY
                        SELECT imie, nazwisko
                        FROM zawodnik
                        INNER JOIN pozycja
                        ON pozycja.id = zawodnik.pozycja_id
                        WHERE pozycja.id = $role;
                        QUERY;
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<li><p>".$row["imie"]." ".$row["nazwisko"]."</p></li>";
                        }
                    }

                ?>
            </ol>
        </div>
    </div>
    <main>
        <h3>Liga mistrzów</h3>
    </main>
    <div class="league flex">
        <?php
            $sql = <<< QUERY
            SELECT zespol, punkty, grupa
            FROM liga
            ORDER BY 2
            DESC;
            QUERY;
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                echo <<< RESULT
                <div class="team-block ">
                    <h2>{$row["zespol"]}<h2>
                    <h1>{$row["punkty"]}</h1>
                    <p>grupa: {$row["grupa"]}</p>
                </div>
                RESULT;
            }


            $conn->close()
        ?>
    </div>
</body>
</html>