<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package macroexpert
 */
?>

<section class="row touch">
    <div class="sectpad touch_bg">
        <div class="container">
            <div class="row m0 section_header color">
                <h2><?php echo get_field('titulo_contacto', get_the_ID());?></h2>
                <p><?php echo get_field('descripcion_seccion', get_the_ID());?></p>
            </div>

            <div class="row touch_middle">
                <div class="col-md-4 open_hours">
                    <div class="row m0 touch_top">
                        <ul class="nav">
                            <li class="item">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-map-marker"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <?php echo get_field('direcciones', get_the_ID());?>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-envelope-o"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <?php echo get_field('correos_electronicos', get_the_ID());?>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-phone"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <?php echo get_field('telefonos', get_the_ID());?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 input_form">
                   <?php 
                        $formulario = get_field('formulario_de_contacto', get_the_ID());
                        echo do_shortcode($formulario);
                    ?>  
                </div>
            </div>           
        </div>
    </div>
</section>

<section class="map">
    <div id="mapBox" class="row m0"></div>
</section>
<?php $dirMapa = get_field('direccion_en_el_mapa', get_the_ID());?>
<script>
      var map;
      var latlong = {lat: <?php echo $dirMapa['lat']; ?>, lng: <?php echo $dirMapa['lng']; ?>};
      function initMap() {
            map = new google.maps.Map(document.getElementById('mapBox'), {
            center: latlong,
            zoom: 14
        });
        var marker = new google.maps.Marker({
          position: latlong,
          map: map
        });
      }
      jQuery(function($){
          $( "#sender-email" ).replaceWith( "<button type='submit' class='wpcf7-form-control wpcf7-submit btn btn-default submit'>Enviar</button>" );
      })(jQuery);
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_field('llave_de_gmaps', get_the_ID())?>&callback=initMap" async defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/gmaps.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/google-map.js"></script>
