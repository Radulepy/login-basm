<?php

$timeout = 5;


ini_set( "session.gc_maxlifetime", $timeout );

//Set the cookie lifetime of the session

ini_set( "session.cookie_lifetime", $timeout );

session_start();

header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: http://localhost:8080'); // allow CORS POLICY! 

// echo session_id();
// echo $_POST['PHPSESSID'];


if( session_id() === $_POST['PHPSESSID'] )
{
    echo "SESSION OK!" . session_id();
    return http_response_code(200);
}
else
    echo "SESSION NOT OK!";
    return http_response_code(403);


// echo session_status();

// var_dump( $_SESSION['user'] );

// session_destroy();

?>