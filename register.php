<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); ?>
<?php include 'user_functions.php'; ?>
<html>
  <head>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script type="text/javascript" src="init.js"></script>

<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container">
<h1>Register!</h1>
<div class="row"> 
    <form class="col l6 push-l3" method="post" action="controller.php?action=register">
      <div class="row">
        <div class="input-field col l12">
          <input id="uname" name="uname" type="text" class="validate">
          <label for="uname">username</label>
        </div>
        <div class="input-field col l12">
          <input id="pass" name="pass" type="text" class="validate">
          <label for="pass">password</label>
        </div>
      </div>
    <button type="submit" class="waves-effect waves-light btn-large" style="width: 200px;">Register</button>

    </form>
  </div>
  </div>
</body>
</html>