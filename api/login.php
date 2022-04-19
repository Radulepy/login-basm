<?php

$timeout = 5;
//Set the maxlifetime of the session (in seconds)

ini_set( "session.gc_maxlifetime", $timeout );

//Set the cookie lifetime of the session

ini_set( "session.cookie_lifetime", $timeout );

session_start();
//TODO: REMOVE HEADER:

header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: http://localhost:8080'); // allow CORS POLICY to talk to backend


// header('Access-Control-Allow-Origin: *'); // allow CORS POLICY! 
if(isset($_POST['user']) && isset($_POST['pass']))
{
    if($_POST['user'] === 'user' && $_POST['pass'] === 'pass') // de verificat cu BD
    {
        $_SESSION['user'] = 'user';
        // echo 'sid:' . session_id();
        return http_response_code(200);
    }
    else
    return http_response_code(401); //unauthorized
}
else
return http_response_code(403); //bad req

?>
