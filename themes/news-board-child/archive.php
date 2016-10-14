<?php // Template Name: Blog Template ?>
<?php 
get_header(); 
global $more;
$more = 0;

$title = get_the_title();
if ( $title == "Blog Left Sidebar")  $mes_options['blog_sidebar_position'] = "Left Sidebar";
if ( $title == "Blog Right Sidebar")  $mes_options['blog_sidebar_position'] = "Right Sidebar";
if ( $title == "Without Sidebar")  $mes_options['blog_sidebar_position'] = "Without Sidebar";
if (is_archive()){$mes_options['blog_sidebar_position'] = "Right Sidebar";}

?>
                        <div class="container">
                            <div class="row">
                                este es archive.php
                            </div>
                        </div>

<?php 
get_footer();
?>