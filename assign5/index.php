<?php include("../inc/header.php"); ?>
    <div id="wrapper">
      <section>
          <h1>Assignment 5</h1>
            <div class="wrap">
              <form action='valid.php' method ='post'>
                <input type="text" name='username' placeholder="username" required>
                <input type="password" name='password' placeholder="password" required>
                <br>
                <input type="Submit" value='Login' class='button'>
                <?php
                  $error = $_GET['error'];
                  if($error == 1)
                    echo "Login credentials do not match.";
                  elseif ($error == 2) 
                    echo "You must login!";                
                ?>
              </form>
            </div>             	
      </section>
	</div>
<?php include("../inc/footer.php"); ?>