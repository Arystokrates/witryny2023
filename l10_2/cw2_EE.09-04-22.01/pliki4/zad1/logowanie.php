<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css"></link>
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <main class="flex">
        <div class="left">
            <img src="obraz.jpg" alt="foksterier">
        </div>
        <div class="right">
            <div>
                <h2>Zapisz się</h2>
                <form method="POST">
                    <label for="login">login: </label>
                    <input type="text" id="login" name="login">
                    <br>
                    <label for="password">hasło: </label>
                    <input type="password" id="password" name="password">
                    <br>
                    <label for="password-rep">powtórz hasło: </label>
                    <input type="password" id="password-rep" name="password-rep">
                    <br>
                    <input type="submit" name="submit" value="Zapisz">
                </form>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "psy");
                    
                    $login = $_POST["login"] ?? "";
                    $password = $_POST["password"] ?? "";
                    $password_rep = $_POST["password-rep"] ?? "";

                    function iSLoginOccupied(string $login, $result){
                        while ($row = $result->fetch_assoc()) {
                            if (trim($login) == $row["login"]) return true;
                        }
                        return false;
                    }

                    $result = mysqli_query($conn, "SELECT login FROM uzytkownicy;");

                    $iSLoginOccupied = false;
                    if (isset($_POST["submit"])){
                        if (strlen($login) == 0 || strlen($password) == 0 || strlen($password_rep) == 0) echo "<p>Wypełnij wszystkie pola</p>";
                        elseif (iSLoginOccupied($login, $result)) echo "<p>Login występuje w bazie danych, konto nie zostało dodane</p>";
                        elseif (trim($password) != trim($password_rep)) echo "<p>Hasła się różnią. Konto nie zostało dodane.</p>";
                        else {
                            if (mysqli_query($conn, "INSERT INTO uzytkownicy(`login`, haslo) VALUES
                            ('".$login."', '".sha1($password)."')")) echo "Konto zostało dodane";
                            else echo "Konto nie dodane z nieznanych przyczyn :c. Zgłoś problem do administracji";
                        }
                    }
                    mysqli_close($conn);
                    ?>
            </div>
            <div>
                <h2>Zapraszamy wszystkich</h2>
                <ol>
                    <li>właścicieli psów</li>
                    <li>weterynarzy</li>
                    <li>tych, co chcą kupić psa</li>
                    <li>tych, co lubią psy</li>
                </ol>
                <a href="regulamin.html">Przeczytaj regulamin forum</a>
            </div>
        </div>
    </main>
    <footer>Stronę wykonał:</footer>
</body>
</html>