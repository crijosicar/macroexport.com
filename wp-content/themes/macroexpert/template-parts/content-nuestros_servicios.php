<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package macroexpert
 */
?>
<style>
    ul {
        margin: 0 !important;
    }
</style>
<!--services-2-->
<section class="row sectpad services">
    <div class="container">
        <div class="row">
            <div class="row m0 section_header color"><h2><?php echo get_field('title_category_one', get_the_ID()); ?></h2></div>
            <br/>
            <div class="col-sm-3 sidebar">
                <ul class="nav nav-tabs" role="tablist">
                    <?php
                    $servicios = get_field('listado_de_servicios', get_the_ID());
                    foreach ($servicios as $key => $servicio) {
                        ?>
                        <li role="presentation" class="<?php echo $key + 1 == 1 ? 'active' : '' ?>">
                            <a href="#content-<?php echo $key + 1; ?>" aria-controls="content-<?php echo $key + 1; ?>" role="tab" data-toggle="tab">
                                <?php echo $servicio['servicio']->post_title; ?>
                            </a>
                        </li>
                    <?php } ?>
                    </li>
                </ul>
            </div>
            <div class="col-sm-9 tab_pages"> 
                <div class="tab-content">
                    <?php foreach ($servicios as $keyTAB => $servicioTAB) { ?>
                        <div role="tabpanel" class="tab-pane <?php echo $keyTAB + 1 == 1 ? 'active' : '' ?>" id="content-<?php echo $keyTAB + 1; ?>">
                            <div class="row m0 tab_inn_cont_1 ">
                                <?php $especificaciones = get_field('especificaciones', $servicioTAB['servicio']->ID); ?>
                                <div class="tab_inn_cont_2 row">
                                    <div class="cont_left col-sm-8">
                                        <h3><?php echo $especificaciones[0]['titulo']; ?></h3>
                                        <p><?php echo $especificaciones[0]['descripcion']; ?></p><br/>
                                        <a href="<?php echo get_permalink($servicioTAB['servicio']->ID); ?>" target="_blank" style="color: #BD081C;">+ Info</a>
                                    </div>
                                    <div class="cont_right col-sm-4">
                                        <?php
                                        $imagenes = get_field('imagenes', $servicioTAB['servicio']->ID);
                                        foreach ($imagenes as $key => $imagen) { ?>
                                            <img src="<?php echo $imagen['imagen']; ?>" alt="">  
                                        <?php } ?>
                                    </div>
                                </div>
                                <h3><?php echo $especificaciones[1]['titulo']; ?></h3>
                                <p><?php echo $especificaciones[1]['descripcion']; ?></p>    
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>                     
        </div>
        
        <div class="row">
            <br/>
            <div class="row m0 section_header color"><h2><?php echo get_field('title_category_two', get_the_ID()); ?></h2></div>
            <br/>
            <div class="col-sm-3 sidebar">
                <ul class="nav nav-tabs" role="tablist">
                    <?php
                    $servicios = get_field('listado_de_servicios_cat_two', get_the_ID());
                    foreach ($servicios as $key => $servicio) {
                        ?>
                        <li role="presentation" class="<?php echo $key + 1 == 1 ? 'active' : '' ?>">
                            <a href="#content-<?php echo $key + 1; ?>-cat-2" aria-controls="content-<?php echo $key + 1; ?>" role="tab" data-toggle="tab">
                                <?php echo $servicio['servicio']->post_title; ?>
                            </a>
                        </li>
                    <?php } ?>
                    </li>
                </ul>
                <div class="row m0 downloads">
                    <h4><?php echo get_field('titulo_brochure', get_the_ID()); ?></h4> 
                    <div class="dload">
                        <div class="dlbg">
                            <?php $PDF = get_field('brochure', get_the_ID()); ?>
                            <a href="<?php echo $PDF['url']?>" target="_blank"><?php echo get_field('nombre_del_archivo_pdf_brochure', get_the_ID()); ?></a>
                            <a href="<?php echo $PDF['url']?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 tab_pages"> 
                <div class="tab-content">
                    <?php foreach ($servicios as $keyTAB => $servicioTAB) { ?>
                        <div role="tabpanel" class="tab-pane <?php echo $keyTAB + 1 == 1 ? 'active' : '' ?>" id="content-<?php echo $keyTAB + 1; ?>-cat-2">
                            <div class="row m0 tab_inn_cont_1 ">
                                <?php $especificaciones = get_field('especificaciones', $servicioTAB['servicio']->ID); ?>
                                <div class="tab_inn_cont_2 row">
                                    <div class="cont_left col-sm-8">
                                        <h3><?php echo $especificaciones[0]['titulo']; ?></h3>
                                        <p><?php echo $especificaciones[0]['descripcion']; ?></p><br/>
                                        <a href="<?php echo get_permalink($servicioTAB['servicio']->ID); ?>" target="_blank" style="color: #BD081C;">+ Info</a>
                                    </div>
                                    <div class="cont_right col-sm-4">
                                        <?php
                                        $imagenes = get_field('imagenes', $servicioTAB['servicio']->ID);
                                        foreach ($imagenes as $key => $imagen) { ?>
                                            <img src="<?php echo $imagen['imagen']; ?>" alt="">  
                                        <?php } ?>
                                    </div>
                                </div>
                                <h3><?php echo $especificaciones[1]['titulo']; ?></h3>
                                <p><?php echo $especificaciones[1]['descripcion']; ?></p>    
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>                     
        </div>
    </div>
</section>