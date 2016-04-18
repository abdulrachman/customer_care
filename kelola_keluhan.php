
<?php
include 'config.php';

if (isset($_POST['kirim'])){
	$nama = $_POST['nama'];
	$tlp = $_POST['tlp'];
	$email = $_POST['email'];
	$isi = $_POST['teks'];
	
	//buat ID
	
	$string = mysql_fetch_array(mysql_query("SELECT id FROM t_keluhan ORDER BY id DESC"));
	$totalrow = mysql_num_rows(mysql_query("SELECT id FROM t_keluhan ORDER BY id DESC"));
	$s=substr($string['id'], -4);
	$s2=substr($string['id'], 0,1);
	$next=$s+1;
	$jid=strlen($next);

	if ($totalrow==0)
	{
		$id='CL0001';
	}
	elseif ($jid==1){
		$id='CL000'.$next;
	}
	elseif($jid==2){
		$id='CL00'.$next;
	}
	elseif($jid==3){
		$id='CL0'.$next;
	}
	elseif($jid==4){
		$id='CL'.$next;
	}
	
	
	$query = mysql_query("INSERT INTO t_keluhan VALUES('$id', '$nama', '$tlp', '$email', '$isi', 'Belum dibaca', NULL, '')");
	
	if ($query){
		echo "<script>alert('Berhasil, silahkan menunggu tanggapan.'); window.location='index.php';</script>";
	}
}
?>