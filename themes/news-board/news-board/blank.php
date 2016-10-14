<?php	 		 	
// Template Name: Blank Template
get_header(); 
?>

<style>
.mes_custom_footer_holder, .title_area, .mes_header_holder, .mes_footer_holder, .tag_line, .mes_menu_content_holder { display:none;}
body { background:#fff;}
html {height: 100%;}
.wide_cont { position: inherit;}
</style>
este es blank
				<?php 
					global $more;
					$more = 0;	 
				?>

				
                <div class="main_content_area" id="akceptor">
                    <div class="container">
                        <div class="row">
                            este es blank.php
                            <div class="col-md-12" id="donor">
                                <?php if (!(have_posts())) { ?><div class="span12"><h2 class="colored uppercase"><?php __("There are no posts","mestowabo"); ?></h2></div><?php }  ?>   
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <?php the_content(); ?>
                                <?php endwhile;  ?> 
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
<script>
jQuery.noConflict()(function($){
	var result = $("#donor").height();
	$("#akceptor").css({"height":result+30} );
});
</script>
<?php 
get_footer();
?>