<?php // Template Name: With Sidebars
$paged = 1;
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');
?>
<?php
get_header(); 
?>
<?php global $more;
	$more = 0;	 
?>
<?php $my_sb =  get_post_meta($post->ID, 'sidebarss', 1);
if ($my_sb == ''){$sb = 'Right Sidebar';} else { $sb = $my_sb;};

$sb_pos =  get_post_meta($post->ID, 'sidebarss_position', 1);
?> 

<div class="main_content_area mes_page_cont_holder">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8 <?php if ($sb_pos == "Left Sidebar"){?> col-md-push-4 col-sm-push-4 <?php }?>">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile;  ?> 
				<?php endif; ?>
			</div>
            
            <div class="col-md-4 col-sm-4 <?php if ($sb_pos == "Left Sidebar"){?> col-md-pull-8 col-sm-pull-8 mes_left_sidebar <?php }else {?> mes_right_sidebar <?php }; ?> ">
				<div class="myrs">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sb) ) : ?>                
                <?php endif; ?>
                        <?php if ( is_active_sidebar($sb) ) : ?><?php dynamic_sidebar($sb); ?>              
                        <?php endif; ?>
                </div>
            </div>
            
		</div>
	</div>
</div>
<?php 
get_footer();
?>