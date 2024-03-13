<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Forum miłośników psów</h1>
    </header>
    <main>
        <section class="left">
            <img src="Avatar.png" alt="Użytkownik forum">
            <?php
                $conn = mysqli_connect("localhost","root","","forumpsy");

                $sql = "SELECT nick, postow, pytanie
                FROM konta
                INNER JOIN pytania ON konta_id = konta.id
                WHERE pytania.id = 1;";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h4>Użytkownik ".$row["nick"]."</h4>"
                ,    "<p>Liczba postow: ".$row["postow"]."</p>"
                ,    "<p>".$row["pytanie"]."</p>";
                }
            ?>
            <video src="video.mp4" controls loop></video>
        </section>  
        <section class="right">
            <form method="POST">
                <textarea name="comment" id="comment" cols="40" rows="4"></textarea>
                <br>
                <input class="btn" type="submit" value="Dodaj odpowiedź">
            </form>
            <?php
                $comment = trim($_POST["comment"]) ?? "";
                $sql = "INSERT INTO odpowiedzi (Pytania_id, konta_id, odpowiedz) VALUES (1, 5, \"$comment\")";
                if (strlen($comment)>0) mysqli_query($conn, $sql);
            ?>
            <h2>Odpowiedzi na pytanie</h2>
            <ol>
            <?php
                $sql = <<< QUERY
                    SELECT odpowiedzi.id, odpowiedz, nick 
                    FROM odpowiedzi
                    INNER JOIN konta
                    ON konta_id = konta.id
                    INNER JOIN pytania 
                    ON Pytania_id = pytania.id
                    WHERE pytania.id = 1
                QUERY;
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>".$row["odpowiedz"]. "<i> ". $row["nick"]. "</i></li><hr>";
                }
                mysqli_close($conn);
            ?>
            </ol>
        </section>
    </main>
    <footer>Autor: -----------,<a href="http://mojestrony.pl/">Zobacz nasze realizacje</footer>
</body>
</html>