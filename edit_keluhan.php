<?php
include 'config.php';

if (isset($_POST['kirim'])){
	$id = $_POST['id'];
	$isi = $_POST['respon'];
	
	
	$query = mysql_query("UPDATE t_keluhan SET status_komplain='Sudah Dibaca', isi_respon='$isi', tgl=current_timestamp WHERE id='$id'");
	
	if ($query){
		echo "<script>alert('Berhasil mengirim tanggapan.'); window.location='dashboard.php';</script>";
	}
}
?>