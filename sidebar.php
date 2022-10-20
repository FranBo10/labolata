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
      $eventos = PostTypeSection ('evento', $date);
      if (!empty($eventos)) {

        foreach ($eventos as $evt => $array) {
           ?> 
           <img src="<?php echo get_bloginfo('template_url')?>\assets\img\Poster8.jpg">
           <h4>Toxic en La Bolata !!</h4>
           <p class"parrafo_cartel> 22:00 h </p>

           
           
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
      <div class="modal_contenido">
        <h1>MUY PRONTO...CONCIERTO EN TU BAR FAVORITO !!  
        </h1>
        <div class="calendar_cont">
          <div class="fecha">
            <p> FECHA 
            </p>
            <p> 2022.10.10 
            </p>
          </div>
          <div class="hora">
            <p> HORA 
            </p>
            <p> 16:00 h 
            </p>
          </div>
        </div>
        <div class="modal_info_grupo">
          <div class="cartel_info_grupos">
          </div>
          <div class="modal_descripcion_evento">
          </div>
        </div>
        <div id="clock">
        </div>
        <script>
          let fechaEvento = "<?php echo get_post_meta(7, 'fecha_completa', true);?>"
          let horaEvento = "<?php echo get_post_meta( 7, 'hora_inicial', true); ?>"
        </script>
      
    </div>
  </div>
</aside>
          
        