<!doctype html>
<html <?php html_tag_schema(); ?> <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if( get_field('tracking_id', 'option') ): ?>
        <!-- Google Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', '<?php the_field('tracking_id', 'option'); ?>', {'allowAnchor': true});
            ga('send', 'pageview', { 'page': location.pathname + location.search + location.hash});
        </script>
        <!-- End Google Analytics -->
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div itemscope itemtype="http://schema.org/Organization">
                <a title="<?php bloginfo('name'); ?>" itemprop="url" href="<?php echo esc_url(home_url()); ?>">
                    <img class="img-responsive" alt="<?php bloginfo('name'); ?> logo" itemprop="logo" src="<?php the_field('logo', 'option'); ?>" />
                </a>
            </div><!--/logo schema-->
        </div><!--/.navbar-header-->
        <ul class="list-unstyled navbar-social-media">
            <?php
            if( get_field('phone_number', 'option') )
                echo '<li class="phone">' . get_field('phone_number', 'option') . '</li>';

            $social_icons = get_field( 'social_media_links', 'option' );
            foreach( (array)$social_icons as $social_icon ) {
	            $target = isset( $social_icon['new_window'] ) ? ' ' .$social_icon['new_window'] : '';
	            echo '<li><a href="' . $social_icon['link'] . '"' . $target . '><i class="fa ' . $social_icon['icon'] . ' fa-fw"></i></a></li>';
            }
            ?>

        </ul>
    </div><!-- /.container-fluid -->
    <div class="container-fluid menu">
        <div class="container">
	    <?php
	    $defaults = array(

		    'theme_location'  => '',
		    'menu'            => 'Header Menu',
		    'container'       => 'div',
		    'container_class' => 'collapse navbar-collapse',
		    'container_id'    => 'bs-example-navbar-collapse-1',
		    'menu_class'      => 'nav navbar-nav navbar-right',
		    'menu_id'         => '',
		    'before'          => '',
		    'after'           => '',
		    'link_before'     => '',
		    'link_after'      => '',
		    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		    'depth'           => 0,
		    'walker'          => new bsc_walker()
	    );
	    wp_nav_menu( $defaults );
	    ?>
        </div>
    </div>
</nav>
<?php
if( !is_front_page() ) {
#get_template_part('inc/page-header');
?>
<section class="container-fluid content white-bg">
    <div class="container">
        <div class="row">
<?php } ?>