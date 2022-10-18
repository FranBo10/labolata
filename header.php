<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="document" content="cerveza, billar, billares, dardos, conciertos, concierto, barra, terraza, aire libre">
  <?php wp_head()?>  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Oswald:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
  <link rel="stylesheet" href="<?php echo get_bloginfo('template_url')?>\assets\css\Progrid.css"> 
  
  
  <title>La Bolata</title>

</head>

<body>
  <div class="container grid-explicit">
    <header>
      <div class="header__principal" id="grad">
        <div class="logo">
          <img src="<?php echo get_bloginfo('template_url')?>\assets\img\bolata.jpg">
        </div>
        <div class="menu__principal">
        <div class="menu">
        <nav>
            <ul>
              <li><a href="#" id="selected
                ">Inicio</a></li>
              <li><a href="#">Eventos</a>
                <ul>
                  <li><a href="#">Conciertos</a></li>
                  <li><a href="#">Reserva el local</a></li>
                  <li><a href="#">Juegos</a></li>
                </ul>
              </li>
              <li><a href="#">Carteles</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contacto</a></li>
            </ul>
          </nav>
        </div>      
        <div class="search">
          <input type="search" placeholder="Que buscas ?">
          <i class="fas fa-search"></i>
        </div>
        </div>
      </div>
      
    </header>