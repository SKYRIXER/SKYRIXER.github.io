<?php
session_start();
set_include_path(dirname(__FILE__) . '/../');

$route = explode("?", $_SERVER["REQUEST_URI"])[0];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once 'libraries/auth.php';
require_once 'controllers/userManagement.php';
require_once 'controllers/reviewManagement.php';
require_once "controllers/moviemanagement.php";

switch($route) {
    case "/":
        viewreviewsController();
    break;

    case "/register":
        registerController();
    break;

    case "/login":
        loginController();
    break;

    case "/logout":
        logoutController();
    break;

    case "/add_review":
      if(isLoggedIn()){
        addreviewController();
      } else {
        loginController();
      }
    break;

    case "/add_movie":
      if(isLoggedIn()){
        addmoviecontroller();
      } else {
        loginController();
      }
    break;

    case "/delete_review":
      if(isLoggedIn()){
        deletereviewController();
      } else {
        loginController();
      }
    break;

    case "/update_review":
      if(isLoggedIn()){
        if($method == "get"){
          editreviewController();  
        } else {
          updatereviewController();
        }
      } else {
        loginController();
      }
    break;

    default:
      echo "404";
  }
