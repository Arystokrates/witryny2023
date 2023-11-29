<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cw1</title>
    <style>
        input{
            margin-bottom: 10px;
        }
        p{
            color: red;
        }
    </style>
    <?php
    function field_empty_info($info="name"){
        echo "Musisz uzupelnic pole ".$info."!";

    }
    ?>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="nickname" placeholder="Wpisz imię">
        <br>
        <?php
        if (isset($_POST["nickname"])) {
            if ((strlen(trim($_POST["nickname"]))==0)){
                echo "<p>";
                echo field_empty_info("imię");
                echo "</p>";
            }
        }
        ?>
        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Napisz komentarz"></textarea>
        <br>
        <?php
        if (isset($_POST["comment"])) {
            if ((strlen(trim($_POST["comment"]))==0)){
                echo "<p>";
                echo field_empty_info("komentarz");
                echo "</p>";
            }
        }
        ?>
        <input type="submit">
    </form>
    <?php
    function print_comment($author="annonymous", $comment){
        $comment_with_something = "<b>$comment</b>";
        echo "<h3>$author</h3>";
        echo "<p>".$comment_with_something."</p>";
        echo "<p>".htmlspecialchars($comment_with_something)."</p>";
        
    }
    if (isset($_POST["nickname"]) && !empty(trim($_POST["nickname"])) && isset($_POST["comment"]) && !empty(trim($_POST["comment"]))) print_comment(trim($_POST["nickname"]), trim($_POST["comment"]));
    ?>
</body>
</html>