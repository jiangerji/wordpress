<?php
/** Make sure that the WordPress bootstrap has run before continuing. */
require( dirname(__FILE__) . '/wp-load.php' );

$password='19850129';
$storePass='$P$BiTeL0MDw7/wiwz1kt5Ub8hkXiIk5d0';

function checkPassword($password, $storePass){
    global $wp_hasher;

    if ( empty( $wp_hasher ) ) {
        require_once ABSPATH . WPINC . '/class-phpass.php';
        $wp_hasher = new PasswordHash( 8, true );
    }

    $result = false;
    try {
        $result = $wp_hasher->CheckPassword($password, $storePass);
    } catch (Exception $e){
    }

    $jarr=array("code"=>$result);
    return json_encode($jarr);
}

$action=$_GET['action'];
$password=$_GET['pwd'];
$storePass=$_GET['storepwd'];
$from=$_GET['from'];

// echo $action . ':' . $password . ':' . $storePass . ':' . $from;

if ($from != 'web2py'){
    echo "";
    exit();
}

if ($action == 'login')
    echo checkPassword($password, $storePass);

?>