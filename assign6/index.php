<script>
	function changeRecord()
	{
		document.dbForm.action='change.php';
		document.dbForm.submit();
	}
	function deleteRecord()
	{
        document.dbForm.action='delete.php';
        document.dbForm.submit();
	}
</script>

<?php
	error_reporting(1);

        $mysql_access = mysql_connect('localhost', 'n00449176', 'copn00449176');

        if(!$mysql_access)
        {
                die('Could not connect' . mysql_error());
        }

        mysql_select_db('n00449176');
	$query = "select * from Student";
	$result = mysql_query($query, $mysql_access);
?>

<?php include('../inc/header.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h3>Enter Student Information</h3>
			<form action="add_p.php" method='post'>
				<div class="form-group">
					<label for="fName">First Name</label>
					<input type="text" class="form-control" name="fName" id="fName" placeholder="Student First Name">
				</div>
				<div class="form-group">
					<label for="lName">Last Name</label>
					<input type="text" class="form-control" name="lName" id="lName" placeholder="Student Last Name">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Student Email Address">
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
					<input type="text" class="form-control" name="major" id="major" placeholder="Degree Major">
				</div>
				<div class="form-group">
					<label for="GPA">GPA</label>
					<input type="number" class="form-control" name="GPA" id="GPA" placeholder="Student GPA" min="0.0" max="4.0" step="0.1">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>
			</form>			
		</div>
		<div class="col-md-6">
			<h3>Database Information</h3>
			<form name="dbForm" action='' method='post'>
			<?php
				echo "<table class='table table-hover table-responsive'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th colspan='8'>Student Information</th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tr>";
				echo "<th></th>";
				echo "<th>First Name</th>";
				echo "<th>Last Name</th>";
				echo "<th>Email</th>";
				echo "<th>Grade</th>";
				echo "<th>Status</th>";
				echo "<th>Major</th>";
				echo "<th>GPA</th>";
				echo "</tr>";
				while ($row = mysql_fetch_row($result))
				{
					$studID = $row[0];
					$studFName = $row[1];
					$studLName = $row[2];
					$studEmail = $row[3];
					$studGrade = $row[4];
					$studStatus = $row[5];
					$studMajor = $row[6];
					$studGPA = $row[7];
					
					echo "<tr>";
					echo "<td><input type='radio' value='$studID' name='studID'></td>";
					echo "<td>$studFName</td>";
					echo "<td>$studLName</td>";
					echo "<td>$studEmail</td>";
					echo "<td>$studGrade</td>";
					echo "<td>$studStatus</td>";
					echo "<td>$studMajor</td>";
					echo "<td>$studGPA</td>";
					echo "</tr>";
				}
				echo "</table>";
				mysql_close($mysql_access);
			?>
			<div class="form-group">
				<button onClick="changeRecord()" class="btn btn-primary">Change Record</button>
				<button onClick="deleteRecord()" class="btn btn-danger">Delete Record</button>
			</div>
		</div>
	</div>
</div>

<?php include('../inc/footer.php'); ?>