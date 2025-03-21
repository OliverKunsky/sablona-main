<?php
$jsonData = file_get_contents('data.json');
$data = json_decode($jsonData, true);
$title = isset($data['title']) ? $data['title'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="container main-header">
        <div>
          <a href="index.html">
            <img src="img/logo.png" height="40">
          </a>
        </div>
      <nav class="main-nav">
        <ul class="main-menu" id="main-menu">
            <li><a href="index.html">Domov</a></li>
            <li><a href="portfolio.html">Portfólio</a></li>
            <li><a href="qna.html">Q&A</a></li>
            <li><a href="kontakt.html">Kontakt</a></li>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
      </nav>
    </header>
    
    <main>
      <section class="banner">
        <h1><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h1>
      </section>
      
      <<section class="slides-container">
  <?php if (isset($data['slides']) && is_array($data['slides'])): ?>
    <?php foreach ($data['slides'] as $slide): ?>
      <div class="slide fade">
        <img src="img/<?php echo htmlspecialchars($slide['image'], ENT_QUOTES, 'UTF-8'); ?>">
        <div class="slide-text"> <?php echo htmlspecialchars($slide['text'], ENT_QUOTES, 'UTF-8'); ?> </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
  <a id="prev" class="prev">❮</a>
  <a id="next" class="next">❯</a>
</section>
      
      <section class="container">
        <div class="row">
          <div class="col-100 text-center">
            <?php
            $hour = date('H');
            if ($hour < 12) {
                echo "<h3>Dobré ráno</h3>";
            } elseif ($hour < 18) {
                echo "<h3>Dobrý deň</h3>";
            } else {
                echo "<h3>Dobrý večer</h3>";
            }
            ?>
          </div>
        </div>
      </section>
    </main>
    
  <footer class="container bg-dark text-white">
    <div class="row">
      <div class="col-25">
        <h4>Kto sme</h4>
        <p>Laboris duis ut est fugiat et reprehenderit magna labore aute.</p>
      </div>
      <div class="col-25 text-left">
        <h4>Kontaktujte nás</h4>
        <p><i class="fa fa-envelope" aria-hidden="true"><a href="mailto:livia.kelebercova@gmail.com"> livia.kelebercova@gmail.com</a></i></p>
        <p><i class="fa fa-phone" aria-hidden="true"><a href="tel:0909500600"> 0909500600</a></i></p>
      </div>
      <div class="col-25">
        <h4>Rýchle odkazy</h4>
        <p><a href="/">Domov</a></p>
        <p><a href="/qna">Q&A</a></p>
        <p><a href="/kontakt">Kontakt</a></p>
      </div>
    </div>
    <div class="row">Created and designed by Lívia</div>
  </footer>

    <script src="js/menu.js"></script>
    <script src="js/slider.js"></script>
</body>
</html>