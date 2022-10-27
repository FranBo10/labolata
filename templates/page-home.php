<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 */
get_header();
get_template_part("sidebar");
?>
        <article class="item-content">
              <img src="<?php echo get_bloginfo('template_url')?>\assets\img\BarradeBar.jpg">
          </article>
          <footer class="item-footer-1">
              <div class="direccion">
                <h2> Encuentranos </h2><br>

                <h3> Direccion </h3>

                <p>Partida, Carrer Secanets, 2 <br>
                03769 Sanet y Negrals (Alicante) </p>

                <h3> Horarios </h3>

                <p>Lunes a Jueves: 18 h a 2:30 h<br>
                  Viernes, Sábado y visperas: 18 h a 2:30 h<br>
                  Domingo: 18 h a 2:30 h </p>
              </div>
              <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3108.651002659001!2d-0.03597068536616763!3d38.817549259253326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd61fd2b98bb31ef%3A0xf7661d2ef5f9cc0c!2sLa%20Bolata!5e0!3m2!1ses!2ses!4v1664525387814!5m2!1ses!2ses" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <div class="redes-sociales">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-instagram"></i>
              </div>
          </footer>
            <section class="item-footer-2">
              <div class="cartel">
                <h1> PROXIMOS CONCIERTOS </h1>
              </div>
              <div class="cartel_mes">
                <p> Octubre </p>
              </div>
          
              <div class="swiper slider_eventos">
                <div class="swiper-wrapper">
                  <?php
                    $eventos = PostTypeSection('evento', 'slider');
                    foreach ($eventos as $evento) {

                      ?>
                      <div class="swiper-slide"> 
                        <img id ="abrirModal_slider" src="<?php echo $evento['urlImg']?>">
                      </div>
                      
                    <?php
                    }
                    ?>
              
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>             
            
            </section>

 
            <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
            <script src="<?php echo get_bloginfo('template_url')?>\assets\js\progrid.js"></script>
      <?php wp_footer()?>
     
  </body>
  </html>