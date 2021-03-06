<?php 

function load_styles(){
  wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
  wp_enqueue_style( 'load-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css' );
}

add_action('wp_enqueue_scripts','load_styles');

function load_scripts(){
  wp_enqueue_script( 'bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'myscript',get_template_directory_uri() . '/js/script.js', array( 'jquery' ),false,true );


}

add_action( 'wp_enqueue_scripts', 'load_scripts');


// gallery code

function na_get_gallery_image_urls( $post_id ) {

  $post = get_post($post_id);

  // Make sure the post has a gallery in it
  if( ! has_shortcode( $post->post_content, 'gallery' ) )
      return;

  // Retrieve all galleries of this post
  $galleries = get_post_galleries_images( $post );

  // Loop through all galleries found
  foreach( $galleries as $gallery ) {

      // Loop through each image in each gallery
      foreach( $gallery as $image ) {

          echo '<img src="'.$image.'">';

      }

  }

}