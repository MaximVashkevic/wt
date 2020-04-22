<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title><?php echo $this->title ? $this->title . ' &ndash;' : ''; ?> Аккорды.by</title>
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="icon" href="favicon.png">
</head>
<body>
<div class="wrapper">
    <header id="main-header">
        <h1>
            Аккорды для гитары
        </h1>
    </header>
    <nav>
        <?php
        foreach ($this->links as $link => $name) {
            if ($link == $this->request) {
                echo '<a href="' . $link . '" class="active">' . $name . '</a>';
            } else {
                echo '<a href="' . $link . '">' . $name . '</a>';
            }
        }
        ?>
        <form class="search-container" name="search" autocomplete="off">
            <input id="search-input" type="search" placeholder="Поиск" size="5">
            <input id="search-button" class="button" type="submit" value="Искать">
        </form>
    </nav>
    <div class="row">
        <?php $this->main(); ?>
        <aside>
            <h2>Новые подборы</h2>
            <?php
            foreach ($this->newSongs as $link => $text) {
                echo '<a href="' . $link . '">' . $text . '</a>';
            }
            ?>
        </aside>
    </div>
    <footer>
        <p>&copy; 2020, Аккорды.by</p>
        <div>
            <a href="#" title="ВК"></a>
            <a href="#" title="Facebook"></a>
        </div>
    </footer>
</div>
</body>
</html>