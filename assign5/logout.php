<?php include('../inc/header.php'); ?>
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
<?php include('../inc/footer.php'); ?>