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
            <div class="blog_section col-lg-12 shop-page-content product-page">
                <div class="row product-details-box">
                    <div class="col-lg-4 img-holder">
                        <img src="<?php echo get_field('imagen_principal', get_the_ID()); ?>" alt="">
                    </div> <!--Search-->
                    <div class="col-lg-8">
                        <h3><?php echo get_the_title(); ?></h3>
                        <p><?php echo get_field('descripcion', get_the_ID()); ?></p>
                    </div>
                </div>
                <div class="product-details-tab-title row">
                    <div class="col-lg-12">
                        <ul>
                            <li data-tab-name="specification"><span><?php echo get_field('especificacion_titulo', get_the_ID()); ?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="product-details-tab-content row">
                    <div class="col-lg-12" id="specification">
                        <?php echo get_field('espeficicaciones', get_the_ID()); ?>
                    </div>
                </div>
                <div class="row best-seller">
                    <div class="row m0 section_header color">
                        <h2><?php echo get_field('repuestos_relacionados_titulo', get_the_ID()); ?></h2> 
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <?php $masvendidos = get_field('repuestos_relacionados', get_the_ID());
                    foreach ($masvendidos as $key => $masvendido) {?>
                    <!--Start single shop item-->
                    <div class="col-lg-4 col-md-4 single-shop-item">
                        <img src="<?php echo get_field('imagen_tienda', $masvendido["repuesto_relacionado"]->ID); ?>" alt="">
                        <div class="meta">
                            <h4><?php echo $masvendido["repuesto_relacionado"]->post_title ?></h4>
                            <span><?php echo get_field('descripcion_destacado', $masvendido["repuesto_relacionado"]->ID); ?></span>
                            <a href="<?php echo get_post_permalink($masvendido["repuesto_relacionado"]->ID); ?>">
                                <div class="cart-button">
                                    <p>+ Info</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--End single shop item-->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>