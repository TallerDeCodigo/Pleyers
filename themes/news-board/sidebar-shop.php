<?php
/*	
*	---------------------------------------------------------------------
*	Mestowabo Default page sidebar
*	--------------------------------------------------------------------- 
*/
?>

	<div class="col-md-4 col-sm-4">
		<div class="widget-area">
			<?php if ( is_active_sidebar('woocommerce_sidebar') ) : ?><?php dynamic_sidebar('woocommerce_sidebar'); ?>              
            <?php endif; ?>
		</div>
	</div><!-- .page-sidebar -->