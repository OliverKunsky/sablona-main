<?php
include_once "classes/QnA.php";
use otazkyodpovede\QnA;

$qna = new QnA();
$qa_pairs = $qna->insertQnA(); // Načítanie otázok a odpovedí
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/accordion.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <header class="container main-header">
    <div class="logo-holder">
      <a href="index.html"><img src="img/logo.png" height="40 "></a>
    </div>
    <nav class="main-nav">
      <ul class="main-menu" id="main-menu container">
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
      <div class="container text-white">
        <h1>Q&A</h1>
      </div>
    </section>

    <section class="container">
      <div class="row">
        <div class="col-100 text-center">
          <p><strong><em>Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui.</em></strong></p>
          
          <section class="container">
            <?php foreach ($qa_pairs as $pair) { ?>
                <div class="accordion">
                    <div class="question"><?php echo $pair['question']; ?></div>
                    <div class="answer"><?php echo $pair['answer']; ?></div>
                </div>
            <?php } ?>
          </section>
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
      <div class="col-25">
        <h4>Nájdete nás</h4>
        <iframe src="https://www.google.com/maps/embed?pb=..." width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
    <div class="row">
      Created and designed by Lívia
    </div>
  </footer>

  <script src="js/accordion.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>
