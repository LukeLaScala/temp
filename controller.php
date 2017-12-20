<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'user_functions.php';
                  require 'point.php';

if(! logged_in()){header('Location: login.php');}
switch ($_GET['action']) {
    case "login":
       	log_in($_POST['uname'], md5($_POST['pass']));
       	if (logged_in()){
       		header("Location: index.php?");
       	} else {
       		header("Location: login.php");
       	}
        break;
    case "register":
    	if(get_user($_POST['uname'])){
    		echo "Username already exists";
    	} else {
       	add_user($_POST['uname'], md5($_POST['pass']));
       	header("Location: login.php?");
       	}
        break;
    case "debug":
    	echo(print_r($_SESSION));
    	break;
    case "logout":
    	session_destroy();
		header("Location: login.php?");
		break;
    case "add_point":
      if (! logged_in()){
          header("Location: index.php");
      }

      require 'point_functions.php';
      
      if(isset($_POST['x']) && isset($_POST['y'])){
          
          $x = $_POST['x'];
          $y = $_POST['y'];
          
          if(ctype_digit($x) && ctype_digit($y)){
              if(($x <= 500 && $x >= 0) && ($y <= 500 && $y >= 0)){
                  $point = new point($x, $y, get_id_of_point());
                  add_point($_SESSION['user']['uid'], serialize($point), get_id_of_point());
              } else {                
                  echo "Not within the range [0, 500].";
              }

          } else {
              echo "Must pass in digits.";
          }
      } else {
          echo "Must pass in both parameters.";
      }

      header("Location: index.php");
      break;
    case "delete_point":
      $point = unserialize($_GET['point']);
      $point->delete();
      header("Location: index.php");
      break;


} 
?>