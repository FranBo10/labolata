<aside class="item-sidebar-1">
  <iframe loading="lazy" src="https://open.spotify.com/embed?uri=spotify:playlist:3Kp4OZIhnbLsjI8YTOpyPo?si=e00ad0bf07714e23" width="100%" height="500" frameborder="0" allowtransparency="true" allow="encrypted-media" style="max-width:100%px;max-height:500px;">
  </iframe>
</aside>
<aside class="item-sidebar-2">
  <div class="cartel_aside">
    <h3> EVENTOS PARA HOY:
    </h3>
    <p>
      <?php
        $date = date('d/m/Y', time());
        echo $date;
      ?>
    </p>
  </div>
  <div class="evento_container">
    <?php
    $eventos = PostTypeSection('evento', 'sidebar');
    if (!empty($eventos)) {
      foreach ($eventos as $evt => $array) {
        ?>
        <img src="<?php echo $array["urlImg"]?>">
        <?php
      }
    } else {
      ?>
      <h4> MUY PRONTO...CONCIERTO EN TU BAR FAVORITO !! </h4>
      <br>
      <p> La Bolata,
        <br>Partida, Carrer Secanets, 2
        03769 Sanet y Negrals (Alicante)
      </p>

    <?php

    }
    ?>

    <button type="button" id="abrirModal">VER DETALLE
    </button>
  </div>
  <div class="modal">
    <div class="modal_container">
      <button class="close_modal" id="cerrarModal">X
      </button>
      <?php
      if (!empty($eventos)) {
        
        foreach ($eventos as $evt => $array) {
            ?>
        <div class="modal_contenido">
        
          <h1><?php echo $array["name"] ?></h1>
          <div class="calendar_cont">
            <div class="fecha">
              <p> FECHA</p>
              <p> <?php echo date("d-m-Y", strtotime($array["fecha_completa"])) ?> </p>
            </div>
            <div class="hora">
              <p> HORA</p>
              <p> <?php echo $array["hora_inicial"] ?></p>
            </div>
          </div>
          <div class="modal_info_grupo">
            <div class="cartel_info_grupos">  
              <img src="<?php echo $array["urlImg"]?>">
              <p> <?php echo $array["descripcion"] ?> </p>
            </div>            
          </div>
          <div id="clock">
            </div>
        </div>
        
        <script>
            let fechaEvento = "<?php echo get_post_meta($array["id"], 'fecha_completa', true); ?>"
            let horaEvento = "<?php echo get_post_meta($array["id"], 'hora_inicial', true); ?>"
        </script>
        
      </div>
            <?php
        }
      } else {
        ?>
        <div class="modal_contenido">
        
          <h1>MUY PRONTO...CONCIERTO EN TU BAR FAVORITO !!</h1>
          <div class="calendar_cont">
            <div class="fecha">
              <p> FECHA</p>
              <p>
                <?php
                    $date = date('d/m/Y', time());
                    echo $date;
                ?>
              </p>
            </div>
            <div class="hora">
              <p> HORA</p>
              <p>
                <?php
                    $date = date('H:i', time());
                    echo $date;
                ?>
              </p>
            </div>
          </div>
          <div class="modal_info_grupo">
            <div class="cartel_info_grupos">  
                <img src="<?php echo get_bloginfo('template_url')?>\assets\img\bolata.jpg">
                <p> La Bolata,
                <br>Partida, Carrer Secanets, 2
                03769 Sanet y Negrals (Alicante)
                </p>                
            </div>
          </div>
          <div id="clock">
              </div>
        </div>
          <?php
  
        }
        ?>     
    </div>
  
</aside>

