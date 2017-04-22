<!--Purely Made by The Creat0r, Omnipotent-->

<?php
	include 'konek.php';
	
	function antiSQLi($string)
	{
		strtolower($string);
		if(strpos($string, "' or '") !== false) die('Omnipotent Anti-SQLi');
	}
	function oExists($username)
	{
		$query = ("SELECT * FROM ".$GLOBALS['table_name']." WHERE ".$GLOBALS['user_column']." = '$username'");
		$cmd = mysqli_query($GLOBALS['link'], $query);
		if(mysqli_num_rows($cmd))
		{
			mysqli_free_result($cmd);
			return 1;
		}
		else
		{
			mysqli_free_result($cmd);
			return 0;
		}
	}
	function oGetPass($username)
	{
		$query = ("SELECT ".$GLOBALS['pass_column']." FROM ".$GLOBALS['table_name']." WHERE ".$GLOBALS['user_column']." = '$username'");
		$cmd = mysqli_query($GLOBALS['link'], $query);
		$result = mysqli_fetch_row($cmd);
		return $result[0];

	}
	function oGetValueFromWhere($column_from, $column_where, $value)
	{
		$query = ("SELECT ".$column_from." FROM ".$GLOBALS['table_name']." WHERE ".$column_where." = '$value'");
		$cmd = mysqli_query($GLOBALS['link'], $query);
		$result = mysqli_fetch_row($cmd);
		return $result[0];

	}
	function oSetValueInto($column_target, $target_value, $where_value)
	{
		$query = ("UPDATE ".$GLOBALS['table_name']." SET ".$column_target."= '$target_value'"." WHERE ".$GLOBALS['user_column']." = '$where_value'");
		$cmd = mysqli_query($GLOBALS['link'], $query);
		if($cmd) return 1;
		else die('Internal Error: Query Error!!!');
	}

?>