<?php
function close($id, $data)
{
    mysqli_query($data, "update sessions set status='Закрыта' WHERE id='$id'");
    header("Location: admin.php", true, 301);
    exit();
}

function delete($id, $data)
{
    mysqli_query($data, "delete from sessions where id='$id'");
    header("Location: admin.php", true, 301);
    exit();
}

function addSession($id, $data)
{
    mysqli_query($data, "insert into sessions(id, link, status) values ('$id', 'form.php?session_id=$id', 'Открыта')");
    header("Location: admin.php", true, 301);
    exit();
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Цифровые сессии. Администрирование</title>
</head>
<body>
<table>
    <h1>Сессии</h1>
    <?php
    $database = mysqli_connect('std-mysql', 'std_950', '901109qsq', 'std_950');
    $sessions = mysqli_query($database, "select * from sessions");
    $current_max = mysqli_fetch_assoc(mysqli_query($database, "select max(id) from sessions"));


    if (isset($_GET['session_id']) && $_GET['close'] == 'true')
        close($_GET['session_id'], $database);

    if (isset($_GET['session_id']) && $_GET['delete'] == 'true')
        delete($_GET['session_id'], $database);

    if (isset($_GET['session_id']) && $_GET['add'] == 'true')
        addSession($_GET['session_id'], $database);

    if (mysqli_num_rows($sessions) > 0) {
        echo '<tr>
        <th>ID</th>
        <th>Ссылка</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>';
        while ($row = mysqli_fetch_assoc($sessions))
            echo '<tr>
                    <td>' . $row['id'] . '</td>
                    <td><a href="' . $row['link'] . '">' . $row['link'] . '</a></td>
                    <td>' . $row['status'] . '</td>
                    <td>
                        <a href="session.php?session_id=' . $row['id'] . '">Редактировать</a>
                        <a href="admin.php?session_id=' . $row['id'] . '&close=true&delete=false&add=false">Закрыть</a>
                        <a href="admin.php?session_id=' . $row['id'] . '&close=false&delete=true&add=false">Удалить</a>
                    </td>
                </tr>';
    } else {
        echo "<h2>Сессии отсутсвуют. Добавьте сессии.</h2>";

    }
    echo '<a href="admin.php?session_id=' . ($current_max['max(id)'] + 1) . '&close=false&delete=false&add=true"><h3>Добавить</h3></a>';
    ?>
</table>
</body>
</html>