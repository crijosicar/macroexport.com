<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package macroexpert
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        
         <!--    fonts-->
        <link href='https://fonts.googleapis.com/css?family=Raleway:800,700,500,400,600' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,300italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700' rel='stylesheet' type='text/css'>

        <link href='https://fonts.googleapis.com/css?family=Alegreya:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <?php wp_head(); ?>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <header class="row header navbar-static-top" id="main_navbar">
            <div class="container">
                <div class="row m0 social-info">
                    <ul class="social-icon">
                        <?php
                        global $post;
                        $redes = get_posts(array('posts_per_page' => 1,
                            'category_name' => 'cabecera',
                            'orderby' => 'date',
                            'order' => 'DESC',));
                        foreach ($redes as $post) {
                            $redesID = $post->ID;
                        }
                        ?>
                        <?php if (get_field('facebook', $redesID)) {?>
                            <li><a href="<?php echo get_field('facebook', $redesID); ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php }
                        ?>
                        <?php if (get_field('twitter', $redesID)) {?>
                            <li><a href="<?php echo get_field('twitter', $redesID); ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php }
                        ?>
                        <?php if (get_field('google', $redesID)) {?>
                            <li><a href="<?php echo get_field('google', $redesID); ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php }
                        ?>
                        <?php if (get_field('linkedin', $redesID)) {?>
                            <li><a href="<?php echo get_field('linkedin', $redesID); ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php }
                        ?>
                        <li class="tel"><a href="tel:<?php echo get_field('telefono', $redesID); ?>"><i class="fa fa-phone"></i> <?php echo get_field('telefono', $redesID); ?> </a></li>
                        <li class="email"><a href="mailto:<?php echo get_field('correo_electronico', $redesID); ?>"><i class="fa fa-envelope-o"></i> <?php echo get_field('correo_electronico', $redesID); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="logo_part">
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="brand_logo">
                        <img src="<?php bloginfo('template_directory'); ?>/images/img-114x51.png" alt="logo image">
                    </a>
                </div>
            </div>


            <div class="main-menu">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div class="menu row m0">                
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="nav navbar-nav">
                                <?php
                                global $post;
                                $menus = get_posts(array('posts_per_page' => 1,
                                    'category_name' => 'menu',
                                    'orderby' => 'date',
                                    'order' => 'DESC',));
                                foreach ($menus as $post) {
                                    $menuID = $post->ID;
                                }
                                $listMenu = get_field('menu', $menuID);
                                ?>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/')); ?>">Inicio</a>
                                </li>
                                <?php foreach ($listMenu as $key => $menuitem) { ?>
                                    <li>
                                        <a href="<?php echo get_post_permalink($menuitem['pagina']->ID); ?>"><?php echo $menuitem['menu'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </header>