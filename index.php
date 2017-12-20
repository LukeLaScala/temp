<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); ?>
<?php include 'user_functions.php'; ?>
<?php include 'point_functions.php'; ?>
<?php include 'point.php'; ?>
<?php if(! logged_in()){header('Location: login.php');} ?>

<html>
  <head>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script type="text/javascript" src="init.js"></script>

<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'navbar.php';?>
<main class="container">
<div class="section"></div>
<div class="row">
  <div class="col l6 push-l3">
<?php if($_SESSION['user']['username'] == "admin"){ ?>
      <h3>ctflearn{obj3ct_inj3ct1on}</h3>
    <?php } ?>
  </div>
</div>
<div class="row">
  <div class="col l6 push-l3">
    <canvas id="myCanvas" width="504" height="504" style="border:4px solid #000000;">
      Your browser does not support the canvas element.
    </canvas>
  </div>
</div>
<script>
var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
ctx.fillStyle = "#FF0000";


<?php foreach (get_all_points($_SESSION['user']['uid']) as $item) { 
  $point = unserialize($item['point_blob']); ?>
  ctx.fillRect(<?php echo $point->get_x(); ?>, <?php echo($point->get_y()); ?>, 7, 7);
<?php } ?>

</script>

  <div class="row"> 
    <div class="col l6 push-l3">
      <form method="post" action="controller.php?action=add_point">
        <div class="row">
          <div class="input-field col l12">
            <input id="x" name="x" type="number" class="validate" min="0" max="500">
            <label for="x">x</label>
          </div>
          <div class="input-field col l12">
            <input id="y" name="y" type="number" class="validate" min="0" max="500">
            <label for="y">y</label>
          </div>
        </div>
      <button type="submit" class="waves-effect waves-light btn-large" style="width: 200px;">Plot</button>

      </form>
    </div>
  </div>
  <div class="row">
    <div class="col l6 push-l3">
      <?php foreach (get_all_points($_SESSION['user']['uid']) as $item) { 
        $point = unserialize($item['point_blob']);
        $delete_link = "<a href='controller.php?action=delete_point&point=" . $item['point_blob'] . "'>delete</a>";
        echo "ID: " . $point->ID . "&nbsp" . "x: " . $point->get_x() . "&nbsp" . "y: " . $point->get_y() . "&nbsp" . $delete_link . "<br />";
        } ?>
    </div>
  </div>
</main>
        <?php include 'footer.php'; ?>
</body>
</html>