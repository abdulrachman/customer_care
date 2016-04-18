<?php
session_start(); //kuncinya ada disini, tulis diawal script sebelum menulis yang lain
 
include("config.php");
/* Ambil variabel */
//global $username;
$username = $_POST['username'];
$pass = $_POST['password'];
/* Validasi */
$error = 0;
if (isset($_POST['submit']))
{
	if( empty( $username ) || empty( $pass ) )
	{
		echo "<script>eval(\"parent.location='./index.php '\");
				alert (' Maaf Login Gagal!');
				</script>";
		$error++;
	}
	else
	{
		$sql = 'SELECT * from t_user where username="' . $username . '"';
		$query = mysql_query( $sql );
		$row = mysql_fetch_array( $query );
 
		if( empty( $row['username'] ) )
		{
			echo '<script>window.alert("Username tidak dikenal");</script>';
			$error++;
		}
		else
		{
			if( $row['password'] != $pass )
			{
				echo '<script>window.alert("Password salah");</script>';
				$error++;
			}
			else
			{
			  /*Daftarkan ke server sbg variabel global*/
			  /* session_register() Sebaiknya tdk digunakan (Deprecated Function)
			  session_register( 'ID', 'PASS' );
			  */
				//$_SESSION['id_user'] = $row[id_user];
				$_SESSION['username'] = $username;
			} //end else
		} //end else
	}
 
if($error == 0)
{
		
		?>
		<script language="JavaScript">alert('Selamat, Login Anda Sukses!!');
			window.location='dashboard.php?'</script>
		<?php
		exit();
}
else 
{
	// jika login salah //
	?>
	<script language="Javascript">window.location='index.php'</script>
	<?php
	//include("login.php");
}
		}
/* else {
 echo '<a href="login.php">Kembali</a>';
 exit();
}*/
?>