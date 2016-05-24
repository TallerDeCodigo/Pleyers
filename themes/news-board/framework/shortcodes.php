<?php	 		 		 		 		 		 	
global $mes_options;

function g_map_f($atts, $content = null) {

	
	extract( shortcode_atts( array(  
		"address" => '', 
		"height" => ''
		), $atts));
	
	$code = '<div id="map" data-address="'.$address.'" style="height:'.$height.' !important"></div>';
	return $code;
}
add_shortcode('g_map', 'g_map_f');


function instames_f($atts, $content = null) {
	extract( shortcode_atts( array(  
		"id" => '', 
		"secret" => '',
		"num" => '11'
		), $atts));
	
	$code = '
			<div class="row"><div id="instafeed" data-id="'.$id.'" data-numbers="'.$num.'" data-secret="'.$secret.'"></div></div>
	';
	return $code;
}
add_shortcode('instames', 'instames_f');





/**
 * Turn off display posts shortcode 
 * If display full post content, any uses of [display-posts] are disabled
 *
 * @param array $out, returned shortcode values 
 * @param array $pairs, list of supported attributes and their defaults 
 * @param array $atts, original shortcode attributes 
 * @return array $out
 */
function be_display_posts_off( $out, $pairs, $atts ) {
	$out['display_posts_off'] = true;
	return $out;
}

/**
 * Convert string to boolean
 * because (bool) "false" == true
 *
 */
function be_display_posts_bool( $value ) {
	return !empty( $value ) && 'true' == $value ? true : false;
}


/************************************************************************************************************************************************************/
/************************************************************************************************************************************************************/
/************************************************************************************************************************************************************/
/************************************************************************************************************************************************************/
/************************************************************************************************************************************************************/



function c_break_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'h' => '100%',
	'bg' => '',
	'color' => '',
	'image' => '',
	'border' => ' trancperent',
	'fixed'=> '1',
	'm_t' => '0',
	'm_b' => '0',
	'p_t' => '0',
	'p_b' => '0',
	'extraclass' => ''
	
	), $atts));
	
		$code = '';
	
	
	$image_done = wp_get_attachment_image_src($image,'full');
	$image_done1 = "'".$image_done[0]."'";
	
	
	if($fixed == "1") $code = '</div></div></div></div>
	<div class="'.$extraclass.'" style="height: '.$h.'; margin-top:'.$m_t.'; margin-bottom:'.$m_b.'; padding-top:'.$p_t.'; padding-bottom:'.$p_b.'; width: 100%; background-color: '.$bg.'; background-image:url('.$image_done1.'); background-position:center center; border-top: 1px solid '.$border.'; border-bottom: 1px solid '.$border.';">
		<div>
			<div class="mes_break container"><span style="color:'.$color.'">'.do_shortcode($content).'</span></div>
		</div>
	</div>
		<div class="main_content_area">
		<div class="container">
			<div class="row">
            	<div class="col-md-12">';
	
	
	
	if($fixed == "0") $code = '</div></div></div></div>
	<div class="'.$extraclass.'" style="height: '.$h.'; margin-top:'.$m_t.'; margin-bottom:'.$m_b.'; padding-top:'.$p_t.'; padding-bottom:'.$p_b.'; width: 100%; background-color: '.$bg.'; background-image:url('.$image_done1.'); background-position:center center;  border-top: 1px solid '.$border.'; border-bottom: 1px solid '.$border.'; ">
		<div class="mes_break" style="padding:0px 20px;">
			<span style="color:'.$color.'">'.do_shortcode($content).'</span>
		</div>
	</div>
	<div class="main_content_area">
		<div class="container">
			<div class="row">
            	<div class="col-md-12">';
	return $code;
}
add_shortcode('c_break', 'c_break_f');






function c_break_simple_bg_break_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'image'=> get_template_directory_uri().'/assets/img/no_image.png',
	'h' => '350px',
	'bg' => '',
	'color' => '',
	'bgcolor' => '#e9e8e4',
	'border' => ' trancperent',
	'fixed'=> '1',
	'first' => '0',
	'last' => '0'
	
	), $atts));
	
		$code = '';
	
	if($first == '1') 
	{
		$first1 = '-41px';
	}else $first1 = '50px';
	
	if($last== '1') 
	{
		$last1 = '-40px';
	}else $last1 = '40px';
	
	if($last== '1') 
	{
		$laststyle = '<style>.footer {margin-top:0px;}</style>';
	}else $laststyle = '';
	
	
	$image_done = wp_get_attachment_image_src($image,'full');
	$image_done1 = "'".$image_done[0]."'";
	
	$code = '</div></div></div></div>
	<div style=" width: 100%; margin-top:'.$first1.'; margin-bottom: '.$last1.'">
		<div class="mes_break">
			'.$laststyle.'
			<div class="simple_bg_break" style="height: '.$h.';">
				<div class="simple_bg_break_img_holder" style="background-image:url('.$image_done1.'); height: '.$h.';">
				</div>
				<div class="simple_bg_break_content_holder" style="height: '.$h.'; background:'.$bgcolor.';">
					<div class="simple_bg_break_content_holder_div" style="color:'.$color.'; ">
						'.do_shortcode($content).'
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
	<div class="main_content_area">
		<div class="container">
			<div class="row">
            	<div class="col-md-12">';
	return $code;
}
add_shortcode('c_break_simple_bg_break', 'c_break_simple_bg_break_f');






function c_break_full_paralax_break_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'image'=> get_template_directory_uri().'/framework/images/vc_image.jpg',
	'h' => '350px',
	'bg' => '',
	'bgposition' => '3',
	'bgcolor' => '#e9e8e4',
	'border' => ' trancperent',
	'fixed'=> '1',
	'extraclass' => '',
	'm_t' => '0',
	'm_b' => '0',
	'p_t' => '0',
	'p_b' => '0',
	
	), $atts));
	
		$code = '';
	
	
	$image_done = wp_get_attachment_image_src($image,'full');
	$image_done1 = "'".$image_done[0]."'";
	
	if($fixed == "1") $code = '</div></div></div></div>
	<div class=" '.$extraclass.'" style=" width: 100%; margin-top:'.$m_t.'; margin-bottom: '.$m_b.';">
		<div class="home_paralax" style="background-image:url('.$image_done1.'); !important; padding-top:'.$p_t.'; padding-bottom:'.$p_b.'" data-type="background" >
			<div class="main_content_area mes_page_cont_holder" style="padding:0px;">
				<div class="container mes_break">
					'.do_shortcode($content).'
				</div>
			</div>
		</div>
			
	</div>
	<div class="main_content_area mes_page_cont_holder">
		<div class="container">
			<div class="row">
            	<div class="col-md-12">';
	
	
	
	
	if($fixed == "0") $code = '</div></div></div></div>
	<div class=" '.$extraclass.'" style=" width: 100%; margin-top:'.$m_t.'; margin-bottom: '.$m_b.';">
		<div class="home_paralax" style="background-image:url('.$image_done1.');  !important;  padding-top:'.$p_t.'; padding-bottom:'.$p_b.'" data-type="background">
			<div class="mes_break">
				'.do_shortcode($content).'
			</div>
		</div>
			
	</div>
	<div class="main_content_area mes_page_cont_holder">
		<div class="container">
			<div class="row">
            	<div class="col-md-12">';
	
	
	return $code;
}
add_shortcode('c_break_full_paralax_break', 'c_break_full_paralax_break_f');






function vc_team_member_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'image'=> get_template_directory_uri().'/assets/img/no_image.png',
	'name'=> 'Jhon Doe',
	'position'=>'My Position In Company',
	'welcome'=>'',
	'fb_url'=>'',
	'tw_url'=>'',
	'bg'=> '#f3f3ef',
	'bg2'=> '#333',
	'gplus_url'=>'',
	'in_url'=>'',
	'mail_url'=>'',
	), $atts));
	
	 if ($fb_url == ''){$fb ='';} else { $fb = '<a class="" target="_blank" href="'.$fb_url.'"><i class="fa fa-facebook"></i></a>';};
	 if ($tw_url == ''){$tw ='';} else { $tw = '<a class="" target="_blank" href="'.$tw_url.'"><i class="fa fa-twitter"></i></a>';};
	 if ($gplus_url == ''){$gplus ='';} else { $gplus = '<a target="_blank" class="" href="'.$gplus_url.'"><i class="fa fa-google-plus"></i></a>';};
	 if ($in_url == ''){$in ='';} else { $in = '<a class="" target="_blank" href="'.$in_url.'"><i class="fa fa-linkedin"></i></a>';};
	 if ($mail_url == ''){$mail ='';} else { $mail = '<a class="" href="mailto:'.$mail_url.'"><i class="fa fa-envelope"></i></a>';};
	 
 	 if ($welcome == ''){$welcome1 ='';} else { $welcome1 = '<h4><span>'.$welcome.'</span></h4>';};

	 $ulrs = ''.$fb.''.$tw.''.$gplus.''.$in.''.$mail.'';
  	 if (($welcome == '')&& ($ulrs == '')){$main_cont ='';} else { $main_cont = '
	 <div class="mes_mask_holder">
		<div class="mes_mask">
			'.$welcome1.'
			<div class="mes_icons">'.$ulrs.'</div>
		</div>
	</div>';};

	
	 $image_done = wp_get_attachment_image($image,'full vc_team_member_image');
	 
	 
	 $code = '<div class="vc_team_member_holder">
	 			<div class="vc_team_member_image_holder">
					<div class="inner_img_holder">
						'.$image_done.'
					</div>
					'.$main_cont.'
				</div>
				<div class="clearfix"></div>
				<div class="mes_cont_holder" style="background:'.$bg.'">
					<h5 style="color:'.$bg2.'">'.$name.'</h5>
					<h6>'.$position.'</h6>
					<div class="mes_team_cont">'.$content.'</div>
			 	</div>
			 </div>';

	return $code;
}
add_shortcode('vc_team_member', 'vc_team_member_f');


function vc_lightbox_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'image'=> get_template_directory_uri().'/assets/img/no_image.png',
	), $atts));
	
	
		$image_done = wp_get_attachment_url($image,'full vc_team_member_image');
	 
		$code = '
		<div class="mes_with_mask_no_url">
		<a rel="prettyPhoto" class="mes_pretty_image_link" title="" href="'.$image_done.'"><div class="mes_pretty_image_link_plus"></div></a>
		<img src="'.$image_done.'" alt="" />
		</div>
		';

		return $code;
}
add_shortcode('vc_lightbox', 'vc_lightbox_f');



function vc_mes_gallery_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'images'=> array(''),
	), $atts));
	
	 $attachments = explode(',', $images);
	 $code = '<div id="port_slider" class="flexslider mes_flex_loading mes_vc_gal">
				<ul class="slides">';
	 	 foreach ( $attachments as $attachment_id ) {
			$src = wp_get_attachment_image_src( $attachment_id,'full' );;
			$code .= '<li><img src="'.$src[0].'"/></li>';
		}
		
		$code .= '</ul></div>';
	//return $code;
	return $code;
}
add_shortcode('vc_mes_gallery', 'vc_mes_gallery_f');





function vc_price_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'price_spec'=> '0',
	'price_title'=> 'Business Plan',
	'price_amount'=> '10',
	'price_cur'=>'$',
	'price_date'=>'per month',
	'price_head_bg'=>'#ff5c00',
	'price_title_color'=>'#ffffff',
	'text_on_button'=>'Order Now',
	'url_on_button'=>'#',
	), $atts));
	
	if ($price_spec == '1'){ $spec = 'spec';} else{ $spec = '';};
	 
	 $code = 
	 '<div class="mes_price_holder '.$spec.'">
		<div class="mes-ribbon-wrapper">
	     	<div class="mes-ribbon">NEW</div>
	    </div>
	 	<div class="mes_price_head_holder" style="background-color:'.$price_head_bg.'">
			<div class="mes_price_head">
				<h3 style="color:'.$price_title_color.' !important">'.$price_title.'</h3>
			</div>
			<div class="mes_price_price">
				<h1 class="page-title" style="color:'.$price_title_color.' !important">'.$price_amount.'<span>'.$price_cur.'</span></h1>
				<h4 style="color:'.$price_title_color.' !important">'.$price_date.'</h4>
			</div>
		</div>
		<div class="unstyled mes_price_ul">
		'.do_shortcode($content).'
		</div>
		<div class="mes_price_order">
			<a class="btn mes_submit mes_reverse_btn" href="'.$url_on_button.'">'.$text_on_button.'</a>
		</div>
	 </div>
	 ';

	return $code;
}
add_shortcode('vc_price', 'vc_price_f');



function vc_mes_sepor_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'header' => '',
	'fac'	 => '',
	'fill'	 => '',
	'font_color'	 => '',
	'border_color'	 => '#e5e5e5',
	), $atts));
	
	
	 $code = '<div class="mes_sepor_holder" style="border-top: 1px solid '.$border_color.';border-bottom: 1px solid '.$border_color.';">
                    <div class="mes_sepor_wrap" style="background:'.$fill.';">
                        <div class="mes_sepor_1"><i class="fa '.$fac.'"></i></div>
                        <div class="mes_sepor_2"><h4 style="color:'.$font_color.'">'.$header.'</h4></div>
                    </div>
              </div>';

	return $code;
}
add_shortcode('vc_mes_sepor', 'vc_mes_sepor_f');




function mes_display_posts_f($atts, $content = null) {
	extract(shortcode_atts( array(
	), $atts));
	 $code = ''.do_shortcode($content).'';

	return $code;
}
add_shortcode('mes_display_posts', 'mes_display_posts_f');





function vc_box_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'icon_bg' => '',
	'bg' => '#f6f6f6',
	'color' => '',
	'border' => '#ededed',
	'icon'=> 'http://www.mestowabo.com/download/swag/diamond.svg',
	'title'=> 'The Box Title',
	), $atts));
	
	
	
	 $code = '<div class="mes_box" style=" background:'.$bg.'; border:1px solid '.$border.'; color:'.$color.' !important;"><div class="icon_holder" style="background:'.$icon_bg.'; "><img class="mes_box_icon" src="'.$icon.'" alt=""></div><h3 clas="small_width" style="color:'.$color.' !important;">'.$title.'</h3>'.do_shortcode($content).'</div>';

	return $code;
}
add_shortcode('vc_box', 'vc_box_f');



function vc_box_ii_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'icon_bg' => '',
	'bg' => '#ffffff',
	'color' => '',
	'border' => '#ededed',
	'icon'=> 'http://www.mestowabo.com/download/swag/diamond.svg',
	'title'=> 'The Box Title',
	), $atts));
	
	
	
	 $code = '<div class="mes_box_ii" style=" background:'.$bg.'; border:1px solid '.$border.'; color:'.$color.' !important;"><div class="icon_holder_ii" style="background:'.$icon_bg.'; "><img class="mes_box_icon" src="'.$icon.'" alt=""></div><h3 clas="small_width" style="color:'.$color.' !important;">'.$title.'</h3>'.do_shortcode($content).'</div>';

	return $code;
}
add_shortcode('vc_box_ii', 'vc_box_ii_f');



function vc_box_iii_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'icon'=> 'http://www.mestowabo.com/download/swag/diamond.svg',
	'title'=> 'The Box Title',
	), $atts));
	
	
	
	 $code = '<div class="mes_box_iii">
	 			<div class="icon_holder_iii">
					<img class="mes_box_icon_iii" src="'.$icon.'" alt="">
					<h3>'.$title.'</h3>
				</div>
				<div class="clearfix"></div>
				'.do_shortcode($content).'
			 </div>';

	return $code;
}
add_shortcode('vc_box_iii', 'vc_box_iii_f');


function vc_box_iv_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'icon'=> 'fa fa-ban',
	'title'=> 'The Box Title',
	'iconcolor'=> '#fff',
	'bgcolor'=> '#000',
	'titlecolor' => '#666',
	'titlelink' => 'html://wwww.yoursite.com'
	), $atts));
	
	
	
	 $code = '<div class="mes_box_iv">
				<a href="'.$titlelink.'"><div class="icon_holder_iv" style="background:'.$bgcolor.'">
					<span class="mes_box_icon_iv colored fa '.$icon.'" style="color:'.$iconcolor.'"></span>
				</div></a>
				<div class="cont_holder_iv"><a href="'.$titlelink.'"><h4 style="color:'.$titlecolor.'">'.$title.'</h4></a>'.do_shortcode($content).'</div>
			 </div>
			 <div class="clearfix"></div>';

	return $code;
}
add_shortcode('vc_box_iv', 'vc_box_iv_f');






function achievements_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'title'=> 'The Box Title',
	'color'=> '',
	), $atts));
	
	
	
	 $code = '<div class="achievements">
				<h3 style="color:'.$color.' !important;">'.$title.'</h3>
				<hr>
				<h4>'.do_shortcode($content).'</h4>
			 </div>';

	return $code;
}
add_shortcode('achievements', 'achievements_f');




add_shortcode('testimonials_i', 'theme_testimonials_i');

function theme_testimonials_i( $atts, $content = null)
{

	extract(shortcode_atts(
        array(
			'show_posts' => '1',
			'header' => 'My blog title',
			'cat' => ''
    ), $atts));
	
	$output ='';
	if($content) { $output .= '<p>'.theme_remove_autop(stripslashes($content)).'</p>'."\n"; }
	$output .= '<ul class="bxslider">'.theme_testimonials_loop_i($show_posts, $header, $cat).'</ul>';
	return $output;

}

function theme_testimonials_loop_i($show_posts, $header, $cat)
{

	$query =  new WP_Query(array('category_name' => $cat, 'post_type' => 'testimonials', 'showposts' => $show_posts, 'order' => 'DESC'));
	$loop_count = 0;
	ob_start();	
	while ($query->have_posts()) { $query->the_post();
			
		$post_id = get_the_id();
		$default_url= get_template_directory_uri();
		$format = get_post_format();
		echo '<li  ';
		post_class('');
		echo ' id="post-'.$post_id.'">'."\n";
		echo ' <div>'."\n";
        echo '<div class="">'."\n";
		get_template_part('framework/post-format/format-testimonials',$format);
		echo '</div>'."\n";
        echo '</div>'."\n";
		echo '</li>'."\n";
	}
	wp_reset_postdata();
	return ob_get_clean();
}





add_shortcode('testimonials_ii', 'theme_testimonials_ii');

function theme_testimonials_ii( $atts, $content = null)
{

	extract(shortcode_atts(
        array(
			'count' => '1',
    ), $atts));
	
	$output ='';
	if($content) { $output .= '<p>'.theme_remove_autop(stripslashes($content)).'</p>'."\n"; }
	$output .= '<ul class="testimonilal2_ul">'.theme_testimonials_loop_ii($count, $header, $cat).'</ul>';
	return $output;

}




function theme_testimonials_loop_ii($count, $header, $cat)
{

	$query =  new WP_Query(array('category_name' => $cat, 'post_type' => 'testimonials', 'showposts' => $count, 'order' => 'DESC'));
	$loop_count = 0;
	ob_start();	
	while ($query->have_posts()) { $query->the_post();
			
		$post_id = get_the_id();
		$default_url= get_template_directory_uri();
		$format = get_post_format();
		echo '<li  ';
		post_class('');
		echo ' id="post-'.$post_id.'">'."\n";
		echo ' <div>'."\n";
        echo '<div class="">'."\n";
		get_template_part('framework/post-format/format-testimonials2',$format);
		echo '</div>'."\n";
        echo '</div>'."\n";
		echo '</li>'."\n";
	}
	wp_reset_postdata();
	return ob_get_clean();
}




?>