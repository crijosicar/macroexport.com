<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package macroexpert
 */

?>

<?php 
global $post;
$piecera = get_posts( array( 'posts_per_page' => 1, 
                            'category_name' => 'piecera', 
                            'orderby' => 'date',
                            'order' => 'DESC', ) );
                            foreach ( $piecera as $post ) {
                                    $pieceraID = $post->ID;
                            }
?>

<!--great-work-->
<section class="emergency-contact">
    <div class="left-side">
        <div class="content">
            <h3><?php echo get_field('titulo_contacto', $pieceraID); ?></h3>
            </br>
            <a href="tel:<?php echo get_field('telefono', $pieceraID); ?>" class="phone">
                <img src="<?php bloginfo('template_directory'); ?>/images/great-work/phone.png" alt=""><?php echo get_field('telefono', $pieceraID); ?>
            </a>
            <a href="mailto:<?php echo get_field('correo_electronico', $pieceraID); ?>" class="email">
                <img src="<?php bloginfo('template_directory'); ?>/images/great-work/email.png" alt=""><?php echo get_field('correo_electronico', $pieceraID); ?>
            </a>
        </div>
    </div>
    <div class="right-side">
        <img src="<?php bloginfo('template_directory'); ?>/images/home/Home913x212.jpg" alt="">
    </div>
</section>

<!--footer-->
<footer class="row">
    <div class="row m0 footer-top">
        <div class="container">
            <div class="row footer-sidebar">
                <div class="widget about-us-widget col-sm-6 col-lg-3">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand_logo">
                        <img src="<?php bloginfo('template_directory'); ?>/images/img-114x51.png" alt="logo image">
                    </a>
                    <p><?php echo get_field('descripcion_piecera', $pieceraID); ?></p>
                </div>
                <div class="widget widget-links col-sm-6 col-lg-3">
                    <h4 class="widget_title"><?php echo get_field('titulo_nuestros_servicios', $pieceraID); ?></h4>
                    <div class="widget-contact-list row m0">
                    <?php $listNuestrosServicios = get_field('nuestros_servicios', $pieceraID); ?>
                        <ul>
                            <?php foreach($listNuestrosServicios as $key => $servicio){?>
                            <li><a href="<?php echo get_post_permalink($servicio['servicio']->ID); ?>"><i class="fa fa-angle-right"></i><?php echo $servicio['servicio']->post_title; ?></a></li>
                            <?php } ?>    
                        </ul>
                    </div>
                </div>
                <div class="widget widget-contact  col-sm-6 col-lg-3">
                <?php $listContactoRapido = get_field('contacto_rapido', $pieceraID); ?>
                    <h4 class="widget_title"><?php echo get_field('titulo_contacto_rapido', $pieceraID); ?></h4>
                    <div class="widget-contact-list row m0">
                       <ul>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <div class="fleft location_address">
                                <?php echo $listContactoRapido[0]['direccion']; ?>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <div class="fleft contact_no">
                                    <a href="tel:<?php echo $listContactoRapido[0]['telefono']; ?>"><?php echo $listContactoRapido[0]['telefono']; ?></a>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <div class="fleft contact_mail">
                                    <a href="mailto:<?php echo $listContactoRapido[0]['correo_electronico']; ?>"><?php echo $listContactoRapido[0]['correo_electronico']; ?></a>
                                </div>
                            </li>
                            <li>
                                <i class="icon icon-WorldWide"></i>
                                <div class="fleft service_time">
                                    <?php echo $listContactoRapido[0]['horario_de_atencion']; ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget widget4 widget-form col-sm-6 col-lg-3">
                    <h4 class="widget_title"><?php echo get_field('titulo_dejanos_un_mensaje', $pieceraID); ?></h4> 
                    <div class="widget-contact-list row m0">
                    <?php $listDejanosMensaje = get_field('dejanos_un_mensaje', $pieceraID); ?>
                        <?php 
                            $formulario = get_field('formulario_dejanos_un_mensaje', get_the_ID());
                            echo do_shortcode($formulario);
                        ?>
                    </div>
                </div>
            </div>
        </div>
     </div>
     <div class="row m0 footer-bottom">
         <div class="container">
            <div class="row">
               <div class="col-sm-8">
                   Copyright &copy; <a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a> 2017. <br class="visible-xs"> All rights reserved.
               </div>
               <div class="right col-sm-4">
                   Created by: <a href="http://www.crijosicar.com">Crijosicar</a>
               </div>
            </div>
        </div>
     </div>
</footer>

<?php wp_footer(); ?>
<script type="text/javascript">
    $(function(){
        $( "#form_397" ).addClass('submet-form').addClass('row').addClass('m0');
        $( "#form_639" ).addClass('submet-form').addClass('row').addClass('m0');
        $( "#contact-email" ).replaceWith( "<button type='submit' class='wpcf7-form-control wpcf7-submit btn btn-default submit'>Enviar</button>" );
    });
</script>
</body>
</html>
