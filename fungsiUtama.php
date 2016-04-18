<?php
//session_start();
include_once("config.php");
include('fungsiHeader.php');


if (getParam("action")=="")
{
	headerHtml('Dashboard');
	echo "<h4>Selamat Datang ".$nama."</h4>";
	
		<script language="javascript">
		function send(url)
		{
			document.location=url;
		}
		</script>
	
		include('tampilPengumuman.php');
}

if (getParam("action")=="upload")
{
	headerHtml('Upload Foto');
	include ('uploadFoto.php');
}
if (getParam("action")=="biodata")
{
	headerHtml("Biodata");
	include_once ('biodata.php');
}
if (getParam("action")=="delete")
{
	include_once ('delete.php');
}
if (getParam("action")=="editpswd")
{
	headerHtml("Ubah Password");
	include_once ('editPassword.php');
}

?>