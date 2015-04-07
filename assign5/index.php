<?php include("../inc/header.php"); ?>
    <div class="container">
      <div class="row">
        <div class="col-xs-4 col-xs-offset-4 text-center"
          <section>
              <h3>Assignment 5</h3>
                <div class="form-group">
                  <form action='valid.php' method ='post'>
                    <input type="text" class="form-control" name='username' placeholder="username" required>
                    <input type="password" class="form-control" name='password' placeholder="password" required>
                    <br>
                    <input type="Submit" value='Login' class='btn btn-success'>
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
      </div>
	</div>
<?php include("../inc/footer.php"); ?>