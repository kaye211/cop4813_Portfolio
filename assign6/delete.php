<?php
	$studID = $_POST['studID'];
        $mysql_access = mysql_connect('localhost', 'n00449176', 'copn00449176');

        if(!$mysql_access)
        {
                die('Could not connect' . mysql_error());
        }

        mysql_select_db('n00449176');



	$query = "DELETE FROM Student WHERE studID=" .$studID;

	$result = mysql_query($query, $mysql_access);

	header('Location: index.php');

?>
