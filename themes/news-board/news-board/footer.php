<?php global $mes_options;?>   
</div> <!--widecont-->
<div class="mes_footer_holder">
    <div class="container">
        <div class="mes_footer">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                     <div class="mes_f_widget">
                    <?php if ( is_active_sidebar("footer_sidebar1") ) : ?> 
                        <?php dynamic_sidebar( "footer_sidebar1" ); ?>              
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                     <div class="mes_f_widget">
                    <?php if ( is_active_sidebar("footer_sidebar2") ) : ?> 
                        <?php dynamic_sidebar( "footer_sidebar2" ); ?>              
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                     <div class="mes_f_widget">
                    <?php if ( is_active_sidebar("footer_sidebar3") ) : ?> 
                        <?php dynamic_sidebar( "footer_sidebar3" ); ?>              
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-xs-12 mes-copyright">
                    <?php echo  do_shortcode($mes_options['bottom_line_text']) ?> 
                </div>
            </div>  
        </div>  
    </div>
</div>
</body>
<?php wp_footer(); ?>
</html>