<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package macroexpert
 */
?>
<section class="row projects-description-area">
    <div class="container">
        <div class="row">
            <?php $especificaciones = get_field('especificaciones', get_the_ID()); ?>
            <div class="col-sm-12 projects-description">
                <div class="row m0 section_header project-top">
                   <h2><?php echo $especificaciones[0]['titulo']; ?></h2>
                   <p><?php echo $especificaciones[0]['descripcion']; ?></p>                 
                </div>
                <div class="projects-description-text">
                    <h3><?php echo $especificaciones[1]['titulo']; ?></h3>
                    <p><?php echo $especificaciones[1]['descripcion']; ?></p>
                </div>
            </div>
        </div>
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