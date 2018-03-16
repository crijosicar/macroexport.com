<?php
/**
 * Template part for displaying home content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package macroexpert
 */
?>


<!--rv-slider-->
<section class="bannercontainer row">
    <div class="rev_slider banner row m0" id="rev_slider" data-version="5.0">
        <ul>
            <?php
            $slideShow = get_field('slider_principal', get_the_ID());
            foreach ($slideShow as $key => $item) {?>
                <li data-transition="slidehorizontal"  data-delay="10000">
                    <img src="<?php echo $item['imagen'] ?>"  
                         alt="" 
                         data-bgposition="center top" 
                         data-bgfit="cover" 
                         data-bgrepeat="no-repeat" 
                         data-bgparallax="1" >
                    <?php if(isset($item['titulo']) && $item['titulo'] != ""){ ?>
                    <div class="tp-caption sfr tp-resizeme carpenters-h1" 
                        data-x="0" 
                        data-hoffset="690" 
                        data-y="200" 
                        data-voffset="160" 
                        data-whitespace="nowrap"
                        data-start="900">
                        <?php echo $item['titulo'] ?>
                    </div>
                    <?php } ?>
                    <?php if(isset($item['descripcion']) && $item['descripcion'] != ""){ ?>
                    <div class="tp-caption sfb tp-resizeme carpenters-p" 
                        data-x="0" 
                        data-hoffset="500" 
                        data-y="300" 
                        data-voffset="470" 
                        data-whitespace="nowrap"
                        data-start="1200"> 
                        <?php echo $item['descripcion'] ?>
                    </div>
                    <?php } ?>
                    <?php if(isset($item['boton']) && $item['boton'] != ""){ ?>
                    <div class="tp-caption sfb tp-resizeme carpenters-b" 
                        data-x="0" 
                        data-hoffset="690" 
                        data-y="350" 
                        data-voffset="555" 
                        data-whitespace="nowrap"
                        data-start="1800">                    
                        <a href="<?php echo $item['boton']; ?>" class="btn btn-2 submit" target="_blank"><?php echo $item['boton_name']; ?></a>
                    </div>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>	

<!--experiance-area-->
<section class="row experience-area">
    <div class="container">
        <div class="row">
            <?php
            $resumenServicio = get_field('resumes_de_servicios', get_the_ID());
            foreach ($resumenServicio as $key => $item) {
                ?>
                <div class="col-sm-5 worker-image">
                    <img src="<?php echo $item['imagen'] ?>" alt="">
                </div>
                <div class="col-sm-7 experience-info">
                    <div class="content">
                        <h2><?php echo $item['titulo'] ?></h2> 
                        <p><?php echo $item['descripcion'] ?></p>  
                    </div>
                    <ul class="content-list">
                        <?php foreach ($item['listado_de_servicios'] as $idx => $servicio) { ?>
                            <li><a href="<?php echo get_post_permalink($servicio['servicio']->ID); ?>"><?php echo $servicio['servicio']->post_title; ?></a></li>
                        <?php } ?>
                    </ul>
                    <div class="content-image">
                        <img src="<?php echo $item['imagen_miniatura'] ?>" alt="">
                    </div>
                </div>
            <?php } ?>  
        </div>
    </div>
</section>

<!--we-do-->
<section class="row sectpad we-do-section">
    <div class="container">
        <?php
        $repuestosDestacados = get_field('repuestos_destacados', get_the_ID());
        foreach ($repuestosDestacados as $key => $repuestosDestacado) {
            ?>
            <div class="row m0 section_header color">
                <h2><?php echo $repuestosDestacado['titulo'] ?></h2> 
            </div>
            <div class="we-do-slider">
                <div class="we-sliders">
                    <?php foreach ($repuestosDestacado['repuestos'] as $key => $repuesto) { ?>
                        <div class="item">
                            <a href="<?php echo get_post_permalink($repuesto['repuesto']->ID); ?>">
                                <div class="post-image">
                                    <img src="<?php echo get_field('imagen_destacado', $repuesto['repuesto']->ID); ?>"  alt="">
                                </div>
                                <a href="<?php echo get_post_permalink($repuesto['repuesto']->ID); ?>">
                                    <h4><?php echo $repuesto['repuesto']->post_title; ?></h4>
                                </a>
                                <p><?php echo get_field('descripcion_destacado', $repuesto['repuesto']->ID); ?></p>
                            </a>
                        </div>
                    <?php } ?>  
                </div>
            </div>
        <?php } ?>  
    </div>
</section>

<!-- Projects -->
<section class="row latest_projects sectpad projects-1">
    <?php $trabajosRealizados = get_field('trabajos_realizados', get_the_ID()); 
    foreach ($trabajosRealizados as $key => $trabajosRealizado) {?>
    <div class="container">
        <div class="row m0 section_header">
            <h2><?php echo $trabajosRealizado['titulo']; ?></h2>
        </div>
        <div class="row m0 filter_row">
            <ul class="nav project_filter" id="project_filter2">
                <li class="active" data-filter="*">Todo</li>
                <?php foreach ($trabajosRealizado['galeria_de_imagenes'] as $key => $galeriaImagen) { ?>
                        <li data-filter=".<?php echo slugify($galeriaImagen['filtro']); ?>"><?php echo $galeriaImagen['filtro']; ?></li>
                 <?php } ?>  
            </ul>
        </div>
        <div class="projects2 popup-gallery" id="projects">
            <div class="grid-sizer"></div>
             <?php foreach ($trabajosRealizado['galeria_de_imagenes'] as $idx => $galeriaImagenFiltros) { ?>
                <?php foreach ($galeriaImagenFiltros['imagenes'] as $idxi => $galeriaImagenItems) { ?>
                    <div class="col-sm-6 col-xs-6 project <?php echo slugify($galeriaImagenFiltros['filtro']);?>">
                        <div class="project-img">
                            <img src="<?php echo $galeriaImagenItems['imagen'];?>" 
                                 alt="<?php echo $galeriaImagenItems['titulo'];?>">
                            <div class="project-text">
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo $galeriaImagenItems['imagen'];?>" 
                                           data-source="#" 
                                           title="<?php echo $galeriaImagenItems['titulo'];?>" 
                                           data-desc="<?php echo $galeriaImagenItems['descripcion_corta'];?>" 
                                           class="popup">
                                            <i class="icon icon-Search"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="row m0">
                                    <a href="javascript:void(0)">
                                        <h3><?php echo $galeriaImagenItems['titulo'];?></h3>
                                    </a>
                                    <p><?php echo $galeriaImagenItems['descripcion_corta'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
            <?php } ?>  
        </div>
    </div>
    <?php } ?>
</section>

<!--work-shop-->
<section class="row fluid-work-area">
    <?php $tiposMantenimientos = get_field('tipos_de_mantenimiento', get_the_ID());
    foreach ($tiposMantenimientos as $key => $tiposMantenimiento) {
        ?>
        <div class="work-image">
            <img src="<?php bloginfo('template_directory'); ?>/images/home/Home845x404.jpg" alt="">
        </div>
        <div class="work-promo">
            <div class="promo-content">
                <h2><?php echo $tiposMantenimiento['titulo'] ?></h2>
                <p><?php echo $tiposMantenimiento['descripcion'] ?></p>
                <h3><?php echo $tiposMantenimiento['titulo_listado'] ?></h3>
                <ul class="nav">
                    <?php foreach ($tiposMantenimiento['mantenimientos'] as $key => $mantenimiento) { ?>
                        <li><?php echo $mantenimiento['mantenimiento'] ?></li>
                    <?php } ?> 
                </ul>
            </div>
        </div>
    <?php } ?>  
</section>

<!-- latest-news-area -->
<?php
$suministrosEnPromocion = get_field('suministros_en_promocion', get_the_ID());
if (count($suministrosEnPromocion)) :
    ?>
    <section class="row sectpad latest-news-area">
        <div class="container">
            <?php foreach ($suministrosEnPromocion as $key => $suministroEnPromocion) { ?>
                <div class="row m0 section_header">
                    <h2><?php echo $suministroEnPromocion['titulo'] ?></h2> 
                </div>
                <div class="row latest-content">
                    <?php foreach ($suministroEnPromocion['suministros'] as $key => $suministro) { ?>
                        <div class="col-sm-4 clo-xs-12 latest">
                            <div class="row m0 latest-image">
                                <a href="blog-details.html"><img src="<?php echo get_field('imagen_promocion', $repuesto['repuesto']->ID); ?>" alt=""></a>
                            </div>
                            <div class="latest-news-text">
                                <a href="<?php echo get_post_permalink($repuesto['repuesto']->ID); ?>">
                                    <h4><?php echo $repuesto['repuesto']->post_title; ?></h4>
                                </a>
                                <p><?php echo get_field('descripcion_destacado', $repuesto['repuesto']->ID); ?></p>
                                <div class="row m0 latest-meta">
                                    <a class="read_more" href="<?php echo get_post_permalink($repuesto['repuesto']->ID); ?>">
                                        + Info
                                    </a>
                                </div>
                            </div>
                        </div>  
                    <?php } ?>    
                </div>
            <?php } ?>  
        </div>
    </section>
<?php endif; ?>

<?php
$clientesDestacados = get_field('nuestros_clientes', get_the_ID());
if (count($clientesDestacados)) :
    ?>
    <!-- clients -->
    <section class="row clients">
        <div class="container">
            <?php foreach ($clientesDestacados as $key => $clientesDestacado) { ?>
                <div class="row m0 section_header">
                    <h2><?php echo $clientesDestacado['titulo'] ?></h2>
                </div>
                <div class="row clients-logos">
                    <?php foreach ($clientesDestacado['clientes'] as $key => $cliente) { ?>
                        <div class="col-md-2 col-sm-3 col-xs-6 client">
                            <div class="row m0 inner-logo">
                                <a href="javascript:void(0)"><img src="<?php echo $cliente['cliente'] ?>" alt=""></a>
                            </div>
                        </div>
                    <?php } ?> 
                </div>
            <?php } ?>  
        </div>
    </section>
<?php endif; ?>


