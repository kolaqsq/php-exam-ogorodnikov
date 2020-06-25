<?php
function addData($id, $data, $desc)
{



    mysqli_query($data, "insert into questions(session_id, type, description) values ($id, 1, $desc)");
    header("Location: admin.php", true, 301);
    exit();
}

$database = mysqli_connect('std-mysql', 'std_950', '901109qsq', 'std_950');

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Цифровые сессии. Редактирование</title>
</head>
<body>
<?php

?>
<form action="<?php addData($_GET['session_id'], $database, $_POST['1']) ?>" method="post">
    <label for="1">Добавьте вопрос №1</label>
    <input type="number" name="1" id="1">

    <br><input type="submit" value="Сохранить">
</form>
</body>
</html>