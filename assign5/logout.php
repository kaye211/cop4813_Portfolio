<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>John Zank | Developer</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,400,700,800|Josefin+Slab:100,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/responsive.css">
	<link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <header>
      <a href="index.html" id="logo">
        <h1 class="fname">John</h1>
        <h1>Zank</h1>
        <h2>Developer</h2>
      </a>
      <nav>
        <ul>
          <li id="navig"><a href="../index.html">Portfolio</a></li>
          <li id="navig"><a href="../assign1/index.html">About</a></li>
          <li id="navig"><a href="../contact.html">Contact</a></li>
        </ul>
      </nav>
    </header>
    <div id="wrapper">
      <section>
          <h1>Assignment 5</h1>
            <div class="wrap">
	            <?php
					session_start();

					$username = $_SESSION['username'];

					echo "Good Bye, $username.";

					session_destroy();


					echo "<br><br><a href='index.php'>Log in</a>";
				?>
            </div>             	
      </section>
	</div>
    <footer>
	  <a href="http://facebook.com/john.k.zank"><img src="../img/facebook-wrap.png" alt="Facebook" class="social-icon"></a>
	  <p>&copy; 2015 John Zank.</p>
    </footer>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/app.js" type="text/javascript" charset="utf-8"></script>	
  </body> 
</html>