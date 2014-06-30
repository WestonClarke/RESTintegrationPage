<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$method = $_SERVER['REQUEST_METHOD'];
	if( strtolower( $method ) == 'post' )
	{

		$first_name = addslashes($_POST['first_name']);
		$last_name = addslashes($_POST['last_name']);
		$dob = addslashes($_POST['dob']);
		$user_name = addslashes($_POST['user_name']);
		$pass_word = addslashes($_POST['pass_word']);

		$connect = mysql_connect('localhost','root','');
		$db = mysql_select_db('rest test db');
		

		if ($connect)
		{
			$sql = "insert into people (first_name, last_name, dob, user_name, pass_word) values('$first_name', '$last_name', '$dob', '$user_name', '$pass_word')";
			$query = mysql_query($sql);

			if ($query)
			{
				$id = mysql_insert_id();
				$sql = "select * from people where id=$id";

				$query = mysql_query($sql);

				if($query)

				{

					if (mysql_num_rows($query) == 1)

					{

						$row = mysql_fetch_object($query);

						echo json_encode( $row );
					}
				}
			}
		}
		else 
		{
			echo "There was an issue connecting with DB";
		}
	}
	else 
	{

		echo "What are you trying to do";

	}

?>	