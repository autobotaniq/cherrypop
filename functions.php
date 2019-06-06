<?php 

// include css and js files
function cherryAssets () {

  wp_enqueue_style( 'cherry-main-stylesheet', get_theme_file_uri('assets/css/styles.min.css'), NULL, microtime() );
  wp_enqueue_style( 'cherry-wp-stylesheet', get_theme_file_uri('assets/css/wp.min.css'), NULL, microtime() );

  wp_enqueue_script('jquery');
  wp_enqueue_script( 'cherry-main-js', get_theme_file_uri('assets/js/main.b6dd2a526bfe4ee64e73.js'), NULL, microtime(), true );
  wp_enqueue_script( 'cherry-js', get_theme_file_uri('assets/js/script.js'), NULL, microtime(), true );
  // wp_enqueue_script( 'cherry-wp-js', get_theme_file_uri('/js/wp.min.js'), NULL, microtime(), true );
  wp_localize_script('jquery', 'ajax_var', array(
    'url'   => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('ajax-nonce')
  ));
}

add_action( 'wp_enqueue_scripts', 'cherryAssets' );

// redirect user to main page after log out
add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout(){
  wp_redirect( home_url() );
  exit();
}

// UI for subscribers
add_action('admin_init', 'redirectSubscriber');

function redirectSubscriber() {
  $currentUser = wp_get_current_user();
  if (count($currentUser->roles) == 1 AND !defined('DOING_AJAX') AND $currentUser->roles[0] == 'subscriber') {
    wp_redirect( get_site_url('/') );
    exit;
  }
}

add_action('wp_loaded', 'noAdminbarForSubscribers');

function noAdminbarForSubscribers() {
  $currentUser = wp_get_current_user();
  if (count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
    show_admin_bar( false );
  }
}


function cpr_login() {
  parse_str( $_POST['query'], $params );

  $creds                  = array();
  $creds['user_login']    = $params['login'];
  $creds['user_password'] = $params['password'];
  $creds['remember']      = $params['rememberme'];

  $user = wp_signon( $creds, false );

  if ( is_wp_error( $user ) ) {
    echo json_encode( array( 'message' => 'Invalid username and/or password!', 'success' => false ) );
  } else {
    wp_set_current_user( $user->ID );
    wp_set_auth_cookie( $user->ID );
    echo json_encode( array( 'message' => '', 'success' => true, 'linkhome' => esc_url( home_url() . '/stations' ) ) );
  }

  wp_die();
}

add_action( 'wp_ajax_cpr_login', 'cpr_login' );
add_action( 'wp_ajax_nopriv_cpr_login', 'cpr_login' );


function cpr_registration() {
  parse_str( $_POST['query'], $params );

  $login = (filter_var($params['login'], FILTER_VALIDATE_EMAIL) ) ? $params['login'] : '';
  //$email    = $params['email'];
  $password = $params['password'];

  $userExists = username_exists( $login );

  $message = 'Required form field is missing!';

  if ( $login !== '' && $password !== '' && $params['password'] == $params['password-repeat'] && !$userExists  ) {
    $user_id = wp_create_user( $login, $password );

    if ( is_wp_error( $user_id ) ) {
      echo json_encode( array( 'message' => $user_id->get_error_message(), 'success' => false ) );
    } else {
      echo json_encode( array( 'message' => '', 'success' => true, 'linkhome' => esc_url( home_url() . '/stations' ) ) );
    }
  } else {
    if ($password != $params['password-repeat']) $message = 'Please repeat your password correctly';
    if ($login == '') $message = 'Enter valid email.';
    if ($userExists) $message = 'User with such email already exists';
    echo json_encode( array( 'message' => $message, 'success' => false ) );
  }

  wp_die();
}

add_action( 'wp_ajax_cpr_registration', 'cpr_registration' );
add_action( 'wp_ajax_nopriv_cpr_registration', 'cpr_registration' );

?>