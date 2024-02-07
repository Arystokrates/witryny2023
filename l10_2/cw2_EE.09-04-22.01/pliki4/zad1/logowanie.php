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
                    <label for="password" id="password" name="password">hasło: </label>
                    <input type="password">
                    <label for="password-rep" id="password-rep" name="password-rep">powtórz hasło: </label>
                    <input type="password">
                    <input type="submit" value="Zapisz">
                    <?php ?>
                </form>
            </div>
            <div>
                <h2>Zapraszamy wszystkich</h2>
                <ol>
                    <li>właścicieli psów</li>
                    <li>weterynarzy</li>
                    <li>tych, co lubią psy</li>
                    <a href="regulamin.html">Przeczytaj regulamin forum</a>
                </ol>
            </div>
        </div>
    </main>
    <footer>Stronę wykonał:</footer>
</body>
</html>