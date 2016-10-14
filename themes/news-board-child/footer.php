<?php 
    if(isset($_POST['email'])){
        $mail = $_POST['email'];

       // print_r($mail);



    }
?>
<?php global $mes_options;?>   
</div> <!--widecont-->
<div class="mes_footer_holder">
    <div class="container">
        <div class="mes_footer">
            <div class="row">
                <section id="mainFooter">
                    <section id="left" class="menuFooter">
                        <a href="acerca-de"><p>acerca de</p></a>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/CZV1iBO3thI" frameborder="0" allowfullscreen></iframe>
                    </section>

                    <section id="right" class="menuFooter">
                        <p>Somos los jugadores del internet. <br>Entendemos la dinámica del deporte <br>y te llevamos los contenidos que te importan. <br>No jugamos a informar, le damos juego a la información.</p>
                    </section>    
                </section>
                <form id="reply_form" class="forma" action="" method="post">
                    <p>
                        <label>
                            <input type="checkbox" name="mc4wp-subscribe" value="1" />
                            Suscríbete a nuestro newsletter.    </label>
                    </p>
                    <input type="text" name="email" id="email" />
                    <input type="submit" value="Enviar">
                </form>  
            </div>  
        </div>  
    </div>
</div>
</body>
<?php wp_footer(); ?>
</html>