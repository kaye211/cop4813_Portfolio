<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	error_reporting(1);
	$reading = fopen('stock.dat', 'r');
	$writing = fopen('stock.tmp', 'w') or die("Can't open file.");
	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$today = date("m.d.y");
	$choice = $_POST['choice'];
	$replaced = false;

    $yahoo_stock = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$name&f=sl1d1t1c1ohgv&e=.csv");
    $data = explode(",", $yahoo_stock);

	//Checks file first to see if stock is already present.
	while (!feof($reading)) {
		//Taking the line/array apart with " | " as a delimiter
		$line_reading = explode(" | ", fgets($reading));
		//Searching file for matching stock names
		if (stristr($line_reading[0], $name)) {
            if($choice == "buy"){
				//Adding the new quantity to the existing quantity
				$line_reading[1] += $quantity;
				$line_reading[2] = $today;
                $line_reading[3] = ($line_reading[1] * $data[1]);
				$replaced_Line = implode(" | ", $line_reading);
                $replaced_Line = $replaced_Line."\n";
				$replaced = true;
			} elseif ($choice == "sell") {
				//Subtracting the new quantity to the existing quantity
				$line_reading[1] -= $quantity;
				$replaced_Line[2] = $today;
                $line_reading[3] = ($line_reading[1] * $data[1]);
				//Putting line/array together into one piece with " | " as a delimiter
				$replaced_Line = implode(" | ", $line_reading);
                $replaced_Line = $replaced_Line."\n";
				$replaced = true;
			} else {
                //Setting amount to 0;
                $line_reading[1] = 0;
                $line_reading[2] = $today;
                $line_reading[3] = ($line_reading[1] * $data[1]);
                //Putting line/array together into one piece with " | " as a delimiter
                $replaced_Line = implode(" | ", $line_reading);
                $replaced_Line = $replaced_Line."\n";
                $replaced = true;
            }
		} else {
            $replaced_Line = implode(" | ", $line_reading);
        }
        fputs($writing, $replaced_Line);
	}

    if(feof($reading) AND $replaced == FALSE ) {
        $price = ($quantity * $data[1]);
        $replaced_Line = "$name | $quantity | $today | $price\n";
        $replaced = true;
        fputs($writing, $replaced_Line);
    }

	//Finished modifying files and closing streams
	fclose($reading); fclose($writing);
	if ($replaced)
	{
		rename('stock.tmp', 'stock.dat');
	} else {
		unlink('stock.tmp');
	}
	header("Location: admin.php?added=success");
	exit;
}
?>

<?php include("../inc/header.php"); ?>
    <div class="container">
        <div class ="row">
            <div class="col-md-6">
                <h3>Add Stock</h3>
                    <form method="post" action="admin.php">
                        <div class="form-group">
                            <select name='name' class="form-control">
                                <option value="default">Choose your stock</option>
                                <option value="GOOG">Google</option>
                                <option value="AAPL">Apple</option>
                                <option value="MSFT">Microsoft</option>
                                <option value="GE">General Electric Company</option>
                                <option value="INTC">Intel Corporation</option>
                                <option value="FB">Facebook, Inc.</option>
                                <option value="CSCO">Cisco Systems, Inc.</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="choice" class="form-control">
                                    <option value="default">Buy/Sell/Delete</option>
                                    <option value="buy">Buy</option>
                                    <option value="sell">Sell</option>
                                    <option value="delete">Delete</option>
                            </select>
                        </div>
                        <div class="form-group">                    
                            <input name='quantity' placeholder="Quantity" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value='Submit' class="btn btn-primary">
                            <input type='Reset' class="btn btn-danger">
                        </div>
                </form>
            </div>
            <div class="col-md-6">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="4">Your Portfolio</th>
                            </tr>
                        </thead>
                        <tr>
                            <th> Stock Name </th>
                            <th> Amount Owned </th>
                            <th> Date Last Modified </th>
                            <th> Stock Worth </th>
                        </tr>
                    <?php
                        $fp = fopen("stock.dat", "r");
                        $total_worth = 0;
                        while (!feof($fp))
                        {
                            $stock_info = explode(" | ", fgets($fp));
                            echo "<tr>";
                            echo "<td>";
                            echo $stock_info[0];
                            echo "</td>";
                            echo "<td>";
                            echo $stock_info[1];
                            echo "</td>";
                            echo "<td>";
                            echo $stock_info[2];
                            echo "</td>";
                            echo "<td>";
                            echo $stock_info[3];
                            echo "</td>";
                            echo "</tr>";
                            $total_worth += $stock_info[3];

                        }
                        echo "<tr>";
                        echo "<td>";
                        echo "Total Stock Worth:";
                        echo "</td>";
                        echo "<td>";
                        echo "</td>";
                        echo "<td>";
                        echo "</td>";
                        echo "<td>";
                        echo $total_worth;
                        echo "</td>";

                        fclose($fp);
                    ?>
                    </table>
                    <div style="text-align: center;">
                        <br><br><a href='logout.php'>Log out</a>
                    </div>
            </div>
        </div>
    </div>
<?php include("../inc/footer.php"); ?>