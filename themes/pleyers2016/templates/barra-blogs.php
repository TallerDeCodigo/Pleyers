<section>
	
		<div class="grid_videos container clearfix">
			<nav>
				<h2>Blogs</h2>
				<ul class="barra_blogs">
					<?php 
						$terms = get_terms('shows', array('hide_empty'=>0) );
						$terms_arr = array();
						// echo "<pre>";
						// 	print_r($terms);
						// echo "</pre>";
						foreach($terms as $term):
							$term_name 		= $term->name;
							$class_slg 		= $term->slug;
							$terms_arr[] 	= $term->slug;
							$trm_id 		= $term->term_id;

					?>
					<li class="<?php echo $class_slg; ?> change">
						<?php echo $term_name; ?>
						<input type="hidden" name="nombre" id="<?php echo  $trm_id; ?>" class="chval" value="<?php echo $class_slg; ?>">
					</li>
				<?php endforeach; ?>
				</ul>
			</nav>


			<div class="videos_stack clearfix">
				
			</div>
		</div>
	</section>