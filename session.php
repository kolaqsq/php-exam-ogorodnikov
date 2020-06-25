<?php
function addData($id, $data, $first, $second, $third, $forth)
{


    mysqli_query($data, "insert into questions(session_id, type, description) values ($id, 1, $first)");
    mysqli_query($data, "insert into questions(session_id, type, description) values ($id, 2, $second)");
    mysqli_query($data, "insert into questions(session_id, type, description) values ($id, 3, $third)");
    mysqli_query($data, "insert into questions(session_id, type, description) values ($id, 4, $forth)");
//    header("Location: admin.php", true, 301);
//    exit();
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
if (!isset($_POST['first']))
    $_POST['first'] = '';
if (!isset($_POST['second']))
    $_POST['second'] = '';
if (!isset($_POST['third']))
    $_POST['third'] = '';
if (!isset($_POST['forth']))
    $_POST['forth'] = '';

?>
<form action="<?php addData($_GET['session_id'], $database, $_POST['first'], $_POST['second'], $_POST['third'], $_POST['forth']) ?>" method="post">
    <label for="first">Добавьте вопрос №1</label>
    <input type="number" name="first" id="first"><br>

    <label for="second">Добавьте вопрос №2</label>
    <input type="number" min="0" name="second" id="second"><br>

    <label for="third">Добавьте вопрос №3</label>
    <input type="text" maxlength="30" name="third" id="third"><br>

    <label for="forth">Добавьте вопрос №4</label>
    <textarea name="forth" id="forth" cols="30" rows="10" maxlength="255"></textarea>

    <br><input type="submit" value="Сохранить">
</form>
</body>
</html>