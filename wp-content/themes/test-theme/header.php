<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php wp_title(); ?></title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  <?php $pageID = $wp_query->post->ID; ?>
  <body>
    <div id="<?php echo $pageID; ?>" class="<?php echo get_the_title($pageID); ?>">
    <div class="container header">
      <div class="row">
        <div class="col-sm-1">
          <i class="fa fa-calendar" aria-hidden="true"></i>
        </div>
        <div class="col-sm-5">
          <div class="row">
            <div class="col-sm-12 htitle">Alex Imbir</div>
          </div>
          <div class="row">
            <div class="col-sm-12 hdescription">portofolio</div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="share-icons">
            <a href="https://www.facebook.com/aleximbir"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/aleximbir92"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a class="sign-up-link" id="sign-up-link" href="#sign-up-link"><i class="fa fa-info" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Contact Modal -->
    <div id="join-newsletter-modal" class="join-newsletter-modal">
      <div class="join-newsletter-modal-content">
        <div class="logo-wrapper">
            <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a><a class="close-modal" href="#" id="close-modal">X</a></h1>
        </div>
        <div class="join-newsletter-form">
          <?php echo do_shortcode( '[contact-form-7 id="34" title="Contact"]' ); ?>
        </div>
      </div>
    </div>