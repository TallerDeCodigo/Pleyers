<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile;  ?> 
                <?php endif; ?>
            <a href="http://localhost/pleyers">
                <p class="regreso">regreso &nbsp; &lt;</p>
            </a>    
            <p class="label_form">deja un comentario</p>
            
            <form id="page_form" name="_pageForm" method="post" action="page.php">
                <input type="text" name="nombre"    class="entradas">
                <input type="text" name="email"     class="entradas">
                <input type="textarea" rows="60"    class="entradas" name="mensaje">
                <input type="submit" class="enviar">
            </form>
            </div>
        </div>
    </div>
<?php 
get_footer();
?>