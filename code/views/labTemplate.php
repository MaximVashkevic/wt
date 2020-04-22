<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title><?= $this->title ?></title>
    <style>
        .wrapper {
            padding: 10px;
        }
        h3, p, form {
            margin: 10px;
        }
        * {
            font: 20px serif;
            box-sizing: border-box;
        }
        input, label {
            margin: 5px 0;
        }
        input {
            padding: 10px;
        }
        #array {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="wrapper">
<?php
    require_once 'modules/ArrayHelper.php';

    use modules\ArrayHelper;

    if (isset($_GET['array']))
    {
        $array = explode(',', $_GET['array']);
        echo '<h3>Исходный массив</h3>';
        echo '<p>' . implode(', ', $array) . '</p>';
        $resultArray = ArrayHelper::uniqueElements($array);
        echo '<h3>Результирующий массив</h3>';
        echo '<p>' . implode(', ', $resultArray) . '</p>';
        echo '<hr>';
    }
?>
<form action="/lab" method="get" name="labform">
    <label for="array">Введите значения через запятую:</label>
    <input type="text" name="array" id="array">
    <br><input type="submit" value="Отправить">
</form>
</div>
</body>
</html>