<?php
session_start(); //kuncinya ada disini, tulis diawal script sebelum menulis yang lain

if( isset($_SESSION['username']) )
{
	$_SESSION = array();
	session_destroy();
	echo"<script>
			window.location = 'index.php'
		</script>";
}
else
{
	echo"<script>
			window.location = 'dashboard.php'
		</script>";
}
?>