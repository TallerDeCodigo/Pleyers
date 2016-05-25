<?php get_header(); ?>

<div class="container">
    <div class="row">

<?php 
	$args =  array(
			'post_type'=>'episodios',
			'posts_per_page'=>'-1',
			'tax_query'=>array(array(
								'taxonomy'=>'shows',
								'field'=>'slug',
								'terms'=>'deportologia'
								),
				)
		);
	$query = new WP_Query($args);
?>	
<?php
	if ( $query->have_posts() ) { ?>
	<section id="deportologia" class="listasReproduccion col-md-12">
		<h3>DEPORTOLOGÍA</h3>
		<ul class="col-md-12">
<?php
		while ( $query->have_posts() ) { $query->the_post();

			echo '<li class="each_episode col-md-2">'  . get_the_content() .'<br>'. get_the_title() .'</li>';
		
		}
		
		echo '</ul>';
	
	} 
echo '</section>';
?>

<?php
	$args =  array(
			'post_type'=>'episodios',
			'posts_per_page'=>'-1',
			'tax_query'=>array(array(
								'taxonomy'=>'shows',
								'field'=>'slug',
								'terms'=>'jiots-tv'
								),
				)
		);
	$query = new WP_Query($args);
?>


	<?php
		if ( $query->have_posts() ) { ?>
		<section id="jiots-tv" class="listasReproduccion col-md-12">
			<h3>JIOTS - TV</h3>
			<ul class="col-md-12">
	<?php
		while ( $query->have_posts() ) {
			$query->the_post();
			echo '<li class="each_episode col-md-2">' . get_the_content() . '<br>' . get_the_title() .'</li>';
		}
		echo '</ul>';
	} 
echo '</section>';
	?>

<?php
	$args =  array(
			'post_type'=>'episodios',
			'posts_per_page'=>'-1',
			'tax_query'=>array(array(
								'taxonomy'=>'shows',
								'field'=>'slug',
								'terms'=>'los-pleyers-tv'
								),
				)
		);
	$query = new WP_Query($args);
?>

	<?php
		if ( $query->have_posts() ) { ?>
		<section id="losPleyers" class="listasReproduccion col-md-12">
			<h3>LOS PLEYERS</h3>
			<ul class="col-md-12">
	<?php
		while ( $query->have_posts() ) {
			$query->the_post();
			echo '<li class="each_episode col-md-2">' . get_the_content() .'<br>'. get_the_title(). '</li>';
		}
		echo '</ul>';
	} 
echo '</section>';
	?>
</div>
</div>
<?php get_footer(); ?>