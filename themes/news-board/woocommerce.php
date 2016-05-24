<?php
/* WooCommerce shop template */
get_header(); 
$sb_pos =  get_post_meta($post->ID, 'sidebarss_position', 1);
?>


<div class="main_content_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8" style="<?php if ($sb_pos == "Left Sidebar"){?> echo 'float:right' <?php }?>">
                <?php woocommerce_content(); ?>
                <script type="text/javascript">
                    jQuery.noConflict()(function($){
                        $('ul.products').addClass('row');
                        $('ul.products>li').each(function(){
                            $(this).addClass('col-lg-4')
                            $(this).addClass('col-md-6')
                            $(this).addClass('col-sm-6')
                            $(this).addClass('col-xs-6')
                        });
                        $('.single-product .col-md-8>.product>.images').addClass('col-md-6 col-sm-12')
                        $('.single-product .col-md-8>.product>.summary').addClass('col-md-6 col-sm-12')
                        $('.single-product .col-md-8>.product>.woocommerce-tabs').addClass('col-md-12')
                        $('.single-product .col-md-8>.product>.woocommerce-tabs .tabs').addClass('col-md-12')
                        $('.single-product .col-md-8>.product>.upsells').addClass('col-md-12')
                        $('.single-product .col-md-8>.product>.related').addClass('col-md-12')
                        $('.single-product .col-md-8>.product').addClass('row')
                        $('.single-product .col-md-8>.col-1').addClass('col-md-6')
                        $('.single-product .col-md-8>.col-2').addClass('col-md-6')
                    });
                </script>
            </div>           
            <?php get_sidebar('shop'); ?>
        </div>
    </div>
</div>
<?php 
get_footer();
?>