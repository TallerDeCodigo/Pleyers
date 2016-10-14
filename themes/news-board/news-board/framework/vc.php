<?php 
/* ------------------------------------------------------------------------ */
/* VC Extendes */
/* ------------------------------------------------------------------------ */


vc_map( array(
   "name" => __("Price Table",'mestowabo'),
   "base" => "vc_price",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content','mestowabo'),
   "params" => array(
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("It will be special table?",'mestowabo'),
         "param_name" => "price_spec",
         "value" => __("0",'mestowabo'),
		 "description" => __("1 or 0",'mestowabo')
      ),
	  
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Price Title",'mestowabo'),
         "param_name" => "price_title",
         "value" => __("Business Plan",'mestowabo'),
      ),
	  
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Amount",'mestowabo'),
         "param_name" => "price_amount",
         "value" => __("10",'mestowabo'),
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Currency",'mestowabo'),
         "param_name" => "price_cur",
         "value" => __("$",'mestowabo'),
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Date",'mestowabo'),
         "param_name" => "price_date",
         "value" => __("per month",'mestowabo'),
      ),

      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Header background color",'mestowabo'),
         "param_name" => "price_head_bg",
         "value" => '#ff5c00',
      ),
	  
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Header text color",'mestowabo'),
         "param_name" => "price_title_color",
         "value" => '#ffffff',
      ),


	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Text on the button",'mestowabo'),
         "param_name" => "text_on_button",
         "value" => __("Order Now",'mestowabo'),
      ),
	  
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Button URL",'mestowabo'),
         "param_name" => "url_on_button",
         "value" => __("#",'mestowabo'),
      ),

      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'mestowabo'),
         "param_name" => "content",
         "value" => __("<ul><li>1</li><li>2</li><li>3</li></ul>",'mestowabo'),
      )
   )
) );








vc_map( array(
   "name" => __("Gallery-Slider",'mestowabo'),
   "base" => "vc_mes_gallery",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
    array(
      "type" => "attach_images",
      "heading" => __("Images", "js_composer"),
      "param_name" => "images",
      "value" => "",
      "description" => __("Select images from media library.", "js_composer")
    )
   )
) );















vc_map( array(
   "name" => __("Team Member",'mestowabo'),
   "base" => "vc_team_member",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
	  array(
         "type" => "attach_image",
         "class" => "",
         "heading" => __("Member Photo",'mestowabo'),
         "param_name" => "image",
         "value" => __("",'mestowabo'),
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Name",'mestowabo'),
         "param_name" => "name",
         "value" => __("Jhon Doe",'mestowabo'),
      ),
	  
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Position In Company",'mestowabo'),
         "param_name" => "position",
         "value" => __("My Position In Company",'mestowabo'),
         "description" => __("",'mestowabo')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background color",'mestowabo'),
         "param_name" => "bg",
         "value" => '#f3f3ef',
         "description" => __("Choose background color",'mestowabo')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title color",'mestowabo'),
         "param_name" => "bg2",
         "value" => '#333',
         "description" => __("Choose background color",'mestowabo')
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Contact text",'mestowabo'),
         "param_name" => "welcome",
         "value" => __("Text above the icons",'mestowabo'),
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("URL to Facebook page",'mestowabo'),
         "param_name" => "fb_url",
         "value" => __("",'mestowabo'),
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("URL to Twitter page",'mestowabo'),
         "param_name" => "tw_url",
         "value" => __("",'mestowabo'),
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("URL to Google plus page",'mestowabo'),
         "param_name" => "gplus_url",
         "value" => __("",'mestowabo'),
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("URL to LinkedIn page",'mestowabo'),
         "param_name" => "in_url",
         "value" => __("",'mestowabo'),
      ),
	  
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("e-mail",'mestowabo'),
         "param_name" => "mail_url",
         "value" => __("",'mestowabo'),
      ),

      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'mestowabo'),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>",'mestowabo'),
         "description" => __('Enter your content.', 'mestowabo')
      )
   )
) );










vc_map( array(
   "name" => __("Testimonial I",'mestowabo'),
   "base" => "testimonial_i",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Want to stick with header?",'mestowabo'),
         "param_name" => "title",
         "value" => __("Testimonial Author",'mestowabo'),
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Date",'mestowabo'),
         "param_name" => "date",
         "value" => __("Testimonial date",'mestowabo'),
      ),
	  
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Rating",'mestowabo'),
         "param_name" => "rating",
         "value" => __("5",'mestowabo'),
         "description" => __("From 1 to 5",'mestowabo')
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Company",'mestowabo'),
         "param_name" => "company",
         "value" => __("Testimonial Company",'mestowabo'),
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("URL to Company Site",'mestowabo'),
         "param_name" => "cpmpany_url",
         "value" => __("#",'mestowabo'),
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Author Image",'mestowabo'),
         "param_name" => "image",
         "value" => __("http://html.mestowabo.com/splendor/wp-content/uploads/2013/08/proff.png",'mestowabo'),
         "description" => __("Past url to your image",'mestowabo')
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Image Style",'mestowabo'),
         "param_name" => "image_style",
         "value" => __("1",'mestowabo'),
		 "description" => __("1 -  Image Circle, 2 -  Image Rounded conors, 3 -  Image Polaroid Style",'mestowabo')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background color",'mestowabo'),
         "param_name" => "bg",
         "value" => '#ffffff',
         "description" => __("Choose background color",'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Border color",'mestowabo'),
         "param_name" => "border",
         "value" => '#f6f6f6',
         "description" => __("Choose border color",'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text color",'mestowabo'),
         "param_name" => "color",
         "value" => '#666666',
         "description" => __("Choose text color",'mestowabo')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'mestowabo'),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>",'mestowabo'),
         "description" => __("Enter your content.", 'mestowabo')
      )
   )
) );





vc_map( array(
   "name" => __("Testimonial II",'mestowabo'),
   "base" => "testimonials_ii",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
           array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Humber of testimonials",'mestowabo'),
         "param_name" => "count",
         "value" => __("1",'mestowabo'),
       "description" => __("Before you paste number of testimonials please create them",'mestowabo')
      ),
   )
) );



vc_map( array(
   "name" => __("News",'mestowabo'),
   "base" => "news",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
      array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Latest Posts Number",'mestowabo'),
         "param_name" => "show_posts",
         "admin_label" => true,
         "value" => __("1",'mestowabo'),
         "description" => __("Number value",'mestowabo')
      ),
      array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Category",'mestowabo'),
         "param_name" => "cater",
         "admin_label" => true,
         "value" => __("education",'mestowabo'),
         "description" => __("Enter category of posts",'mestowabo')
      ),
   )
) );



vc_map( array(
   "name" => __("Instagram Feed",'mestowabo'),
   "base" => "instames",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_inst.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
      array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("UserID",'mestowabo'),
         "param_name" => "id",
         "value" => __("1574915538",'mestowabo'),
          "description" => __("Instagram feed uses <a href='http://instafeedjs.com/'>Insta-Feed.js</a> plugin. To get ID and token <a href='http://instafeedjs.com/#user'>Click here</a> ",'mestowabo')
      ),
      array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Acces Token",'mestowabo'),
         "param_name" => "secret",
         "value" => __("1574915538.467ede5.a72a2f1269bc4897849672f15af0fc0e",'mestowabo'),
          "description" => __("Number value",'mestowabo')
      ),
      array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Number of posts",'mestowabo'),
         "param_name" => "num",
         "value" => __("11",'mestowabo'),
      ),
   )
) );



vc_map( array(
   "name" => __("Icon Box I",'mestowabo'),
   "base" => "vc_box",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Want to stick with header?",'mestowabo'),
         "param_name" => "title",
         "value" => __("Box Title",'mestowabo'),
         "description" => __("Enter the box title",'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon Background color",'mestowabo'),
         "param_name" => "icon_bg",
         "value" => '#ff5c00', 
         "description" => __("Choose Icon Background color",'mestowabo')
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Icon",'mestowabo'),
         "param_name" => "icon",
         "value" => __("http://html.mestowabo.com/splendor/wp-content/themes/splendor/assets/img/plane.png",'mestowabo'),
         "description" => __("Past url to your icon",'mestowabo')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background color",'mestowabo'),
         "param_name" => "bg",
         "value" => '#f9f9f9',
         "description" => __("Choose text color",'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Border color",'mestowabo'),
         "param_name" => "border",
         "value" => '#ededed',
         "description" => __("Choose Border color",'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text color",'mestowabo'),
         "param_name" => "color",
         "value" => '#666666',
         "description" => __("Choose text color",'mestowabo')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'mestowabo'),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>",'mestowabo'),
         "description" => __("Enter your content.", 'mestowabo')
      )
   )
) );


vc_map( array(
   "name" => __("Icon Box II",'mestowabo'),
   "base" => "vc_box_ii",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Want to stick with header?",'mestowabo'),
         "param_name" => "title",
         "value" => __("Box Title",'mestowabo'),
         "description" => __("Enter the box title",'mestowabo')
      ),
      array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Icon Link",'mestowabo'),
         "param_name" => "icon_link",
         "value" => __("#",'mestowabo'),
         "description" => __("F.g: http://yoursite.com",'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon Background color",'mestowabo'),
         "param_name" => "icon_bg",
         "value" => '#ff5c00', 
         "description" => __("Choose Icon Background color",'mestowabo')
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Icon",'mestowabo'),
         "param_name" => "icon",
         "value" => __("http://html.mestowabo.com/splendor/wp-content/themes/splendor/assets/img/plane.png",'mestowabo'),
         "description" => __("Past url to your icon",'mestowabo')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background color",'mestowabo'),
         "param_name" => "bg",
         "value" => '#ffffff',
         "description" => __("Choose text color",'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Border color",'mestowabo'),
         "param_name" => "border",
         "value" => '#ededed',
         "description" => __("Choose Border color",'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text color",'mestowabo'),
         "param_name" => "color",
         "value" => '#666666',
         "description" => __("Choose text color",'mestowabo')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'mestowabo'),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>",'mestowabo'),
         "description" => __("Enter your content.", 'mestowabo')
      )
   )
) );

vc_map( array(
   "name" => __("Mesto Separator",'mestowabo'),
   "base" => "vc_mes_sepor",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
      array(
         "type" => "textfield",
         "class" => "",
         "admin_label" => true,
         "heading" => __("Header",'mestowabo'),
         "param_name" => "header",
         "value" => __("Header",'mestowabo'),
         "description" => __("Past header",'mestowabo')
      ),
      array(
         "type" => "textfield",
         "class" => "",
         "admin_label" => true,
         "heading" => __("Font Awesome Class",'mestowabo'),
         "param_name" => "fac",
         "value" => __("fa-facebook",'mestowabo'),
         "description" => __("",'mestowabo')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background Color",'mestowabo'),
         "param_name" => "fill",
         "value" => '#fff',
         "description" => __("Choose title color",'mestowabo')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Font Color",'mestowabo'),
         "param_name" => "font_color",
         "value" => '#393939',
         "description" => __("Choose title color",'mestowabo')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Border Color",'mestowabo'),
         "param_name" => "border_color",
         "value" => '#e5e5e5',
         "description" => __("Choose title color",'mestowabo')
      ),
   )
) );


vc_map( array(
   "name" => __("Light Box Image",'mestowabo'),
   "base" => "vc_lightbox",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
     array(
         "type" => "attach_image",
         "class" => "",
         "heading" => __("Member Photo",'mestowabo'),
         "param_name" => "image",
         "value" => __("",'mestowabo'),
      ),

   )
) );



vc_map( array(
   "name" => __("Google Map",'mestowabo'),
   "base" => "g_map",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_map.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
     array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Your Address",'mestowabo'),
         "param_name" => "address",
         "value" => __("7th Ave, New York, NY",'mestowabo'),
         "admin_label" => true,
         "description" => __("Enter the address of your location", 'mestowabo')
      ),
      array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Height",'mestowabo'),
         "param_name" => "height",
         "admin_label" => true,
         "value" => __("400px",'mestowabo'),
         "description" => __("Enter the height of map", 'mestowabo')
      ),
   )
) );


vc_map( array(
   "name" => __("Icon Box III",'mestowabo'),
   "base" => "vc_box_iii",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Want to stick with header?",'mestowabo'),
         "param_name" => "title",
         "value" => __("Box Title",'mestowabo'),
         "description" => __("Enter the box title", 'mestowabo')
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Icon",'mestowabo'),
         "param_name" => "icon",
         "value" => __("http://html.mestowabo.com/splendor/wp-content/themes/splendor/assets/img/or-plane.png",'mestowabo'),
         "description" => __("Past url to your icon",'mestowabo')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'mestowabo'),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>",'mestowabo'),
         "description" => __("Enter your content.", 'mestowabo')
      )
   )
) );




vc_map( array(
   "name" => __("Icon Box IV",'mestowabo'),
   "base" => "vc_box_iv",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Want to stick with header?",'mestowabo'),
         "param_name" => "title",
         "value" => __("Box Title",'mestowabo'),
         "description" => __("Enter the box title",'mestowabo')
      ),
      array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Title Link",'mestowabo'),
         "param_name" => "titlelink",
         "value" => __("html://wwww.yoursite.com",'mestowabo'),
         "description" => __("Paste a link for title",'mestowabo')
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Icon",'mestowabo'),
         "param_name" => "icon",
         "value" => __("fa-ban",'mestowabo'),
         "description" => __("FontAwesom icon", 'mestowabo')
      ),
	  
	   array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon Color",'mestowabo'),
         "param_name" => "iconcolor",
         "value" => '#fff',
         "description" => __("Choose icon color", 'mestowabo')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Color",'mestowabo'),
         "param_name" => "titlecolor",
         "value" => '#666',
         "description" => __("Choose title color", 'mestowabo')
      ),
	  
	   array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon Background Color",'mestowabo'),
         "param_name" => "bgcolor",
         "value" => '#000',
         "description" => __("Choose icon background  color", 'mestowabo')
      ),
	  
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'mestowabo'),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>",'mestowabo'),
         "description" => __("Enter your content.", 'mestowabo')
      )
   )
) );







vc_map( array(
   "name" => __("Achievements",'mestowabo'),
   "base" => "achievements",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Achievement Title",'mestowabo'),
         "param_name" => "title",
         "value" => __("123",'mestowabo'),
         "description" => __("Enter the achievement title", 'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text color",'mestowabo'),
         "param_name" => "color",
         "value" => '#ff5c00',
         "description" => __("Choose text color", 'mestowabo')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'mestowabo'),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>",'mestowabo'),
         "description" => __("Enter your content.", 'mestowabo')
      )
   )
) );










vc_map( array(
   "name" => __("Content Break",'mestowabo'),
   "base" => "c_break",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(
	  
	  
	  
	   
	    array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Top Margin",'mestowabo'),
         "param_name" => "m_t",
         "value" => __("40px",'mestowabo'),
         "description" => __("", 'mestowabo')
      ),
	  
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Bottom Margin",'mestowabo'),
         "param_name" => "m_b",
         "value" => __("40px",'mestowabo'),
         "description" => __("", 'mestowabo')
      ),
	  
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Top Padding",'mestowabo'),
         "param_name" => "p_t",
         "value" => __("40px",'mestowabo'),
         "description" => __("", 'mestowabo')
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Bottom Padding",'mestowabo'),
         "param_name" => "p_b",
         "value" => __("40px",'mestowabo'),
         "description" => __("", 'mestowabo')
      ),
	   
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Fix content on the center?",'mestowabo'),
         "param_name" => "fixed",
         "value" => __("1",'mestowabo'),
         "description" => __("Set '0' if you want to stretch content and '1' if you don't want.", 'mestowabo')
      ),
      
	  array(
         "type" => "attach_image",
         "class" => "",
         "heading" => __("Background Image",'mestowabo'),
         "param_name" => "image",
         "value" => __("",'mestowabo'),
      ),
	  
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("BackGround color",'mestowabo'),
         "param_name" => "bg",
         "value" => '#f9f9f9',
         "description" => __("Choose text color", 'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Border color",'mestowabo'),
         "param_name" => "border",
         "value" => '',
         "description" => __("Choose Border color", 'mestowabo')
      ),
	  array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text color",'mestowabo'),
         "param_name" => "color",
         "value" => '#3a3a3a',
         "description" => __("Choose text color", 'mestowabo')
      ),
	  
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Want to add extra class name?",'mestowabo'),
         "param_name" => "extraclass",
         "value" => __("",'mestowabo'),
         "description" => __("Extra class name", 'mestowabo')
      ),
	  
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'mestowabo'),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>",'mestowabo'),
         "description" => __("Enter your content.", 'mestowabo')
      )
   )
) );





vc_map( array(
   "name" => __("Full Paralax",'mestowabo'),
   "base" => "c_break_full_paralax_break",
   "class" => "",
   "icon" => get_template_directory_uri().'/framework/images/vc_composer/vc_image.jpg',
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Content', 'mestowabo'),
   "params" => array(

	  
	  
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Fix content on the center?",'mestowabo'),
         "param_name" => "fixed",
         "value" => __("1",'mestowabo'),
         "description" => __("Set '0' if you want to stretch content and '1' if you don't want.", 'mestowabo')
      ),
	  
	
	
	    array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Top Margin",'mestowabo'),
         "param_name" => "m_t",
         "value" => __("40px",'mestowabo'),
         "description" => __("", 'mestowabo')
      ),
	  
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Bottom Margin",'mestowabo'),
         "param_name" => "m_b",
         "value" => __("40px",'mestowabo'),
         "description" => __("", 'mestowabo')
      ),
	  
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Top Padding",'mestowabo'),
         "param_name" => "p_t",
         "value" => __("40px",'mestowabo'),
         "description" => __("", 'mestowabo')
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Bottom Padding",'mestowabo'),
         "param_name" => "p_b",
         "value" => __("40px",'mestowabo'),
         "description" => __("", 'mestowabo')
      ),
	array(
         "type" => "attach_image",
         "class" => "",
         "heading" => __("Upload LeftSide Background image",'mestowabo'),
         "param_name" => "image",
         "value" => __("",'mestowabo'),
      ),
   

      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("RightSide BackGround color",'mestowabo'),
         "param_name" => "bgcolor",
         "value" => '#e9e8e4',
         "description" => __("Choose text color", 'mestowabo')
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Want to add extra class name?",'mestowabo'),
         "param_name" => "extraclass",
         "value" => __("",'mestowabo'),
         "description" => __("Extra class name", 'mestowabo')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'mestowabo'),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>",'mestowabo'),
         "description" => __("Enter your content.", 'mestowabo')
      )
   )
) );






/* ------------------------------------------------------------------------ */
/* / Tis if for Visual Composer Content Break shortcode/
/* ------------------------------------------------------------------------ */

add_filter( 'the_content', 'my_div_form' );
function my_div_form($text) {
	$regexp_code = "|\[vc_row(.*)\](.*)\[/vc_row\]|imuUs";
	preg_match_all($regexp_code,$text,$out);
	$text_out ="";
	foreach($out[0] as $val){
		$regexp_code1 = "|\[c_break(.*)\[/c_break(.*)\]|imuUs";
		preg_match_all($regexp_code1,$val,$out1);
		if(count($out1[1])>0){
			foreach($out1[0] as $key_c =>$val_c){
				$text_out .= $out1[0][$key_c];
			}
		}else{
			$text_out .= $val;
		}
		
	}
	if(count($out[0]) == 0){
		$text_out = $text;
	}
    return $text_out;
}
?>