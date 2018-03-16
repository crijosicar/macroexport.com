<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package macroexpert
 */
?>
<section class="row blog_content">
    <div class="container">
        <div class="row sectpad">
            <div class="sidebar_section col-lg-4">
                <div class="sidebar row m0">
                    <div class="row widget widget-search">
                        <div class="row widget-inner">
                            <?php 
                                $queryProduct = get_query_var('product') ? get_query_var('product') : ""; 
                            ?>
                            <form id="form-search-products" 
                                  class="search-form"
                                  action="#"
                                  method="POST">
                                <div class="input-group">
                                    <input type="text" 
                                           class="form-control" 
                                           placeholder="<?php echo get_field('placeholder_buscador', get_the_ID()); ?>"
                                           value="<?php echo $queryProduct; ?>"
                                           id="i-product-name">
                                    <span class="input-group-addon">
                                        <button type="submit">
                                            <i class="icon icon-Search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div> <!--Search-->
                    <div class="row widget widget-categories">
                        <h4 class="widget-title"><?php echo get_field('titulo_categorias', get_the_ID()); ?></h4>
                        <div class="row widget-inner">
                            <ul class="nav categories">
                                <?php
                                $categorias = get_field('listado_de_categorias', get_the_ID());
                                foreach ($categorias as $key => $categoria) {
                                    ?>
                                    <li>
                                        <a href="<?php echo add_query_arg(['category' => $categoria['value']], '/repuestos') ?>">
                                            <i class="fa fa-angle-right"></i><?php echo $categoria['label']; ?>
                                        </a>
                                    </li>
                                <?php 
                                } ?>
                            </ul>
                        </div>
                    </div> <!--Categories-->
                </div>
            </div>
            <div class="blog_section col-lg-8 shop-page-content">
                <div class="row m0 section_header color">
                    <?php 
                        $catname = get_query_var('category') ? get_query_var('category') : "todo"; 
                        $catname = str_replace("_", " ", $catname);
                    ?>
                    <h2><?php echo get_field('titulo_seccion_productos', get_the_ID()). " - ". $catname; ?></h2>
                </div> 
                <br>
                <br>

                <?php
                $category = get_query_var('category');
                                 
                if (get_query_var('paged')) {
                    $paged = get_query_var('paged');
                } elseif (get_query_var('page')) {
                    $paged = get_query_var('page');
                } else {
                    $paged = 1;
                }
                
                if($queryProduct != ""){
                    if ($category == "" || $category == "todo") {
                        // The query (compiled)
                        $args = array(
                            'post_type' => 'post',
                            'wpse18703_title' => $queryProduct,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'desc',
                            'category_name' => 'repuesto',
                            'paged' => $paged,
                            'posts_per_page' => 9
                        );
                    } else {
                        // The query (compiled)
                        $args = array(
                            'post_type' => 'post',
                            'wpse18703_title' => $queryProduct,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'desc',
                            'category_name' => 'repuesto',
                            'paged' => $paged,
                            'posts_per_page' => 9,
                            'meta_key'  => 'categoria',
                            'meta_query' => array(
                                array(
                                    'key' => 'categoria',
                                    'value' => $category,
                                    'compare' => 'LIKE'
                                )
                            )
                        );
                    }
                } else {
                    if ($category == "" || $category == "todo") {
                        // The query (compiled)
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'desc',
                            'category_name' => 'repuesto',
                            'paged' => $paged,
                            'posts_per_page' => 9
                        );
                    } else {
                        // The query (compiled)
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'desc',
                            'category_name' => 'repuesto',
                            'paged' => $paged,
                            'posts_per_page' => 9,
                            'meta_key'  => 'categoria',
                            'meta_query' => array(
                                array(
                                    'key' => 'categoria',
                                    'value' => $category,
                                    'compare' => 'LIKE'
                                )
                            )
                        );
                    }
                }
                
                $productosquery = new WP_Query($args);
                                
                // The Loop
                if ($productosquery->have_posts()) {
                    ?>
                    <div class="row">
                        <?php while ($productosquery->have_posts()) {
                            $productosquery->the_post(); ?>
                            <!--Start single shop item-->
                            <div class="col-lg-4 col-md-4 single-shop-item">
                                <img src="<?php echo get_field('imagen_tienda', get_the_ID()); ?>" alt="">
                                <div class="meta">
                                    <h4><?php echo get_the_title() ?></h4>
                                    <span><?php echo get_field('descripcion_destacado', get_the_ID()); ?></span>
                                    <a href="<?php echo get_post_permalink(get_the_ID()); ?>">
                                        <div class="cart-button">
                                            <p>+ Info</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--End single shop item-->
                        <?php } ?>    
                    </div>
                    <div class="row">
                    <?php echo custom_paginate($productosquery->max_num_pages); ?>  
                    </div>
                    <?php
                    /* Restore original Post Data */
                    wp_reset_postdata();
                } else {
                    echo '<p>No se encontraron productos!</p>';
                }
                ?>
            </div>
            <div class="blog_section col-lg-12 shop-page-content">
                <div class="row best-seller">
                    <div class="row m0 section_header color">
                        <h2><?php echo get_field('titulo_seccion_mas_vendidos', get_the_ID()); ?></h2> 
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <?php
                    $masvendidos = get_field('mas_vendidos', get_the_ID());
                    foreach ($masvendidos as $key => $masvendido) {
                        ?>
                        <!--Start single shop item-->
                        <div class="col-lg-4 col-md-4 single-shop-item">
                            <img src="<?php echo get_field('imagen_tienda', $masvendido["suministro"]->ID); ?>" alt="">
                            <div class="meta">
                                <h4><?php echo $masvendido["suministro"]->post_title; ?></h4>
                                <span><?php echo get_field('descripcion_destacado', $masvendido["suministro"]->ID); ?></span>
                                <a href="<?php echo get_post_permalink($masvendido["suministro"]->ID); ?>">
                                    <div class="cart-button">
                                        <p>+ Info</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--End single shop item-->
                    <?php 
                    } ?>
                </div> 
            </div>
        </div>
    </div>
</section>