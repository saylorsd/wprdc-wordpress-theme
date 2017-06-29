<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {

	// Enqueue the main Stylesheet.
	wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/assets/stylesheets/foundation.css', array(), '2.9.2', 'all' );

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );

	// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false );

	// If you'd like to cherry-pick the foundation components you need in your project, head over to gulpfile.js and see lines 35-54.
	// It's a good idea to do this, performance-wise. No need to load everything if you're just going to use the grid anyway, you know :)
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/javascript/foundation.js', array('jquery'), '2.9.2', true );

	// Add the comment-reply library on pages where it is necessary
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
	}

	}

	wp_enqueue_script('d3', 'https://cdnjs.cloudflare.com/ajax/libs/d3/4.9.1/d3.js', array(), '4.9.1', true);

//    wp_enqueue_script('app', get_template_directory_uri() . '/assets/javascript/custom/app.js', array('foundation', 'd3'), '0.0.1', true);

    // Icons, Google fonts , etc
	wp_enqueue_style('material-icons','https://fonts.googleapis.com/icon?family=Material+Icons',array(),'', 'all');
	wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css?family=Open+Sans' ,array(),'', 'all');
	wp_enqueue_style('ion-icons','http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' ,array(),'', 'all');

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;
