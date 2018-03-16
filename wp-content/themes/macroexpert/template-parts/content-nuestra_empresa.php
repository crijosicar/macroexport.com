<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package macroexpert
 */
?>

<!--who-are-->
<section class=" row who-area sectpad">
    <div class="container">
        <div class="row m0 section_header color">
            <h2><?php echo get_field('titulo_empresa', get_the_ID())?></h2> 
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3 who-are">
                <div class="who-are-image row m0">
                    <img src="<?php echo get_field('imagen_la_compania', get_the_ID())?>" alt="">
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 who-are-texts">
                <div class="who-text">
                    <h3><?php echo get_field('titulo_la_compania', get_the_ID())?></h3>
                    <p><?php echo get_field('descripcion_la_compania', get_the_ID())?></p>
                    <div class="row m0">
                        <ul class="two-col-list nav">
                              <?php
                                $valores = get_field('valores_coporativos', get_the_ID());
                                foreach ($valores as $key => $valor) {
                                    ?>
                                     <li><?php echo $valor['valor_corporativo']; ?></li>
                                <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3 who-are">
                <div class="who-are-image row m0">
                    <img src="<?php echo get_field('imagen_perfil', get_the_ID())?>" alt="">
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 who-are-texts">
                <div class="who-text">
                    <h3><?php echo get_field('titulo_perfil', get_the_ID())?></h3>
                    <p><?php echo get_field('descripcion_del_perfil', get_the_ID())?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3 who-are">
                <div class="who-are-image row m0">
                    <img src="<?php echo get_field('imagen_mision', get_the_ID())?>" alt="">
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 who-are-texts">
                <div class="who-text">
                    <h3><?php echo get_field('titulo_mision', get_the_ID())?></h3>
                    <p><?php echo get_field('descripcion_mision', get_the_ID())?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3 who-are">
                <div class="who-are-image row m0">
                    <img src="<?php echo get_field('imagen_vision', get_the_ID())?>" alt="">
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 who-are-texts">
                <div class="who-text">
                    <h3><?php echo get_field('titulo_vision', get_the_ID())?></h3>
                    <p><?php echo get_field('descripcion_vision', get_the_ID())?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3 who-are">
                <div class="who-are-image row m0">
                    <img src="<?php echo get_field('imagen_politica_sst', get_the_ID())?>" alt="">
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 who-are-texts">
                <div class="who-text">
                    <h3><?php echo get_field('titulo_politica_sst', get_the_ID())?></h3>
                    <p><?php echo get_field('descripcion_politica_sst', get_the_ID())?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3 who-are">
                <div class="who-are-image row m0">
                    <img src="<?php echo get_field('imagen_responsabilidad_y_relaciones', get_the_ID())?>" alt="">
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 who-are-texts">
                <div class="who-text">
                    <h3><?php echo get_field('titulo_responsabilidad_y_relaciones', get_the_ID())?></h3>
                    <p><?php echo get_field('descripcion_responsabilidad_y_relaciones', get_the_ID())?></p>
                </div>
            </div>
        </div>
                <div class="row">
            <div class="col-sm-4 col-lg-3 who-are">
                <div class="who-are-image row m0">
                    <img src="<?php echo get_field('imagen_nuestro_taleto_humano', get_the_ID())?>" alt="">
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 who-are-texts">
                <div class="who-text">
                    <h3><?php echo get_field('titulo_nuestro_talento_humano', get_the_ID())?></h3>
                    <p><?php echo get_field('descripcion_nuestro_taleto_humano', get_the_ID())?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--testimonial-->
<?php
$testimonios = get_field('testimonios', get_the_ID());
if (count($testimonios)) :
    foreach ($testimonios as $idx => $testimonio) :
        ?>
        <section class="row sectpad testimonial-area">
            <div class="container">
                <div class="row m0 section_header">
                    <h2><?php echo $testimonio['titulo']; ?></h2> 
                </div>
                <div class="testimonial-sliders">
                    <?php foreach ($testimonio['testimonio'] as $key => $testimo) { ?>
                        <div class="item">                            
                            <div class="media testimonial">
                                <div class="media-left">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo $testimo['imagen']; ?>"  alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p><?php echo $testimo['descripcion']; ?></p>
                                    <a href="javascript:void(0)">-  <p><?php echo $testimo['autor']; ?></p></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

    <?php endforeach;
endif;
?>


