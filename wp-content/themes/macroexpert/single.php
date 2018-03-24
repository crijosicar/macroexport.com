<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package macroexpert
 */
get_header();
?>
<?php
while (have_posts()) : the_post();
    ?>
    <!--breadcrumb-->
    <section class="row header-breadcrumb">
        <div class="container">
            <div class="row m0 page-cover">
                <h2 class="page-cover-tittle"><?php echo get_the_title(); ?></h2>
                <ol class="breadcrumb">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Inicio</a></li>
                    <li class="active"><?php echo get_the_title(); ?></li>
                </ol>
            </div>
        </div>
    </section>
    <?php
    $categoria = get_the_category();
    var_dump(get_the_ID());
    wp_die();
    if ($categoria[0]->name == "pagina") {
        $tipo_pagina = get_field('tipo_de_pagina', get_the_ID());
        get_template_part('template-parts/content', $tipo_pagina);
    } else {
        get_template_part('template-parts/content', $categoria[0]->name);
    }

endwhile; // End of the loop.

get_footer();
