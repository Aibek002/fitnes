<?php

//require_once __DIR__ . '/vendor/autoload.php';
ini_set('allow_url_fopen',1);
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'HomePage.php';
        break;
    case '/HomePage':
        require 'HomePage.php';
        break;
    case '/HomePage.php':
        require 'HomePage.php';
        break;
    case '/login':
        require 'login.php';
        break;
     case '/login.php':
        require 'login.php';
        break;
    case '/register':
        require 'register.php';
        break;
     case '/register.php':
        require 'register.php';
        break;
    case '/get-code-for-re-passwd.php':
        require __DIR__.'/get-code-for-re-passwd.php';
        break;
    case '/profile.php':
        require __DIR__.'/profile.php';
        break;
    case '/clases/Usuario.php':
        require __DIR__.'/clases/Usuario.php';
        break;
    case '/clasesDAO/UsuarioDAO.php':
        require __DIR__.'/clasesDAO/UsuarioDAO.php';
        break;
    default:
        http_response_code(404);
        echo @parse_url($_SERVER['REQUEST_URI'])['path'];
        exit('Not Found');
}


?>