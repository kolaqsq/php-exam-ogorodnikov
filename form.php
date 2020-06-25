<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Цифровые сессии. Форма</title>
</head>
<body>
<form action="" method="post">
    <?php
    $session_id = $_GET['session_id'];
    $database = mysqli_connect('std-mysql', 'std_950', '901109qsq', 'std_950');
    $questions = mysqli_query($database, "select * from questions where session_id = '$session_id'");

    while ($row = mysqli_fetch_assoc($questions)) {
        echo '<label for="first"></label>
    <input type="number" name="first" id="first"><br>';
    }
    ?>
</form>
</body>
</html>