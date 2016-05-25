<?php 
get_header(); 
?>
<style>
.mes_header_holder, .mes_custom_footer_holder, .mes_footer_holder, .tag_line { display:none;}
#akceptor {position: absolute;top:0;bottom: 0;left: 0;right: 0;margin: auto;}
</style>

				este es 404
                <div class="main_content_area" id="akceptor" style="position:relative;  margin-bottom:40px">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" id="donor" style="padding-top: 80px;">
								<!--Page contetn-->
                                <div class="col-md-12 mes_not_found_error text-center" style="text-align:center; margin-top:10px;">
                                    <h2 class="" style="margin-top:60px;"><strong class="colored" style="display: block;font-size: 140px;line-height: 50px;margin-bottom: 60px;"><?php _e("404","mestowabo"); ?></strong></h2><h4><?php _e("The page you were looking for<br> could not be found.","mestowabo"); ?></h4>
                                </div>
                                <!--/Page contetn-->

                            </div>
                        </div>
                    </div>
                </div>
                
<script>
jQuery.noConflict()(function($){
	var result = document.getElementById("donor").offsetHeight;
	$("#akceptor").css({"height":result+30} );
});
</script>
<?php 
get_footer();
?>