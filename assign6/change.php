<?php
	$studID = $_POST['studID'];
    $mysql_access = mysql_connect('localhost', 'n00449176', 'copn00449176');

    if(!$mysql_access)
    {
            die('Could not connect' . mysql_error());
    }

    mysql_select_db('n00449176');



	$query = "SELECT * FROM Student WHERE studID=" .$studID;

	$result = mysql_query($query, $mysql_access);

       	$row = mysql_fetch_row($result);
        $studID = $row[0];
        $studFName = $row[1];
        $studLName = $row[2];
        $studEmail = $row[3];
        $studGrade = $row[4];
        $studStatus = $row[5];
        $studMajor = $row[6];
        $studGPA = $row[7];
	
	mysql_close($mysql_access);

?>

<?php include('../inc/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Enter Student Information</h3>
            <form action="change_p.php" method='post'>
                <div class="form-group">
                    <input type="hidden" name="studID" value="<?php echo $studID; ?>">
                    <label for="fName">First Name</label>
                    <input type="text" class="form-control" name="fName" id="fName" value="<?php echo $studFName ?>">
                </div>
                <div class="form-group">
                    <label for="lName">Last Name</label>
                    <input type="text" class="form-control" name="lName" id="lName" value="<?php echo $studLName ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $studEmail ?>">
                </div>
                <div class="form-group">
                    <label for="grade">Current Grade</label>
                    <select class="form-control" id="grade" name="grade">
                        <option>Freshman</option>
                        <option>Sophemore</option>
                        <option>Junior</option>
                        <option>Senior</option>
                        <option>Graduate Student</option>
                    </select>
                </div>  
                <div class="form-group">
                    <label for="status">Current Status</label>
                    <select class="form-control" id="status" name="status">
                        <option>Part-Time</option>
                        <option>Full-Time</option>
                        <option>Not Attending</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="major">Major</label>
                    <input type="text" class="form-control" name="major" id="major" value="<?php echo $studMajor ?>">
                </div>
                <div class="form-group">
                    <label for="GPA">GPA</label>
                    <input type="number" class="form-control" name="GPA" id="GPA" value="<?php echo $studGPA ?>" min="0.0" max="4.0" step="0.1">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>         
        </div>
    </div>
</div>

<?php include('../inc/footer.php'); ?>