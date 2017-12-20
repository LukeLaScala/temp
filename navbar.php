<?php if(!logged_in()){ ?>
<nav>
    <div class="nav-wrapper teal lighten-1">
      <a href="#" class="brand-logo left">&nbsp Grid It</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
  </nav>
  <?php  } else { ?>
<nav>
    <div class="nav-wrapper teal lighten-1">
      <a href="#" class="brand-logo left">&nbsp Grid It</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><?php echo($_SESSION['user']['username']); ?></li>
        <li><a href="controller.php?action=logout">Logout</a></li>
      </ul>
    </div>
  </nav>  	<?php } ?>