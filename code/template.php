<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Аккорды.by</title>
  <link rel="stylesheet" href="styles/main.css">
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
      $currentPage = '/' . pathinfo(parse_url($request, PHP_URL_PATH))['filename'];
      foreach ($this->links as $link => $name)
      {
        if ($link == $currentPage)
        {
          echo '<a href="' . $link . '" class="active">' . $name . '</a>';
        }
        else
        {
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
      <?php require_once($request) ?>
      <aside>
        <h2>Новые подборы</h2>
        <a href="kukushka">Виктор Цой &ndash; Кукушка</a>
        <a href="tam_gde_klen_shymit">Синяя птица &ndash; Там где клён шумит</a>
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