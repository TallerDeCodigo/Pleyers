<?php 
	$url = 'http://cerocero.mx/api/';
	$graficos = file_get_contents($url);
	$json = json_decode($graficos, true);
	// echo "<pre>";
	// 	print_r($json);
	// echo "<pre>";
?>
<section class="cerocero">
	<div class="container clearfix">
			<img src="images/00_logo.png">
		<div class="posts_cerocero clearfix">
			<?php 
				foreach($json as $data):
					$aidi = $data['id'];
					$fecha = $data['date'];
					$titulo = $data['name'];
					$thumb = $data['thumbnail'];
			?>
					<img src="<?php echo $thumb; ?>">
			<?php endforeach; ?>
		</div>
	</div>
</section>