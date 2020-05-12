<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image tracker</title>
</head>
<body>
<img src="image.php" height="400px" alt="image">
<p>Посещений: <?= file_get_contents('./image_stat'); ?></p>
</body>
</html>