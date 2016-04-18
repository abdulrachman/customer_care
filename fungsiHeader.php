<?php
function headerHtml($title)
{ ?>
	<div class="row">
			<div class="col-lg-12"><br></br>
				<h3 class="page-header"><i class="fa fa-file-text-o"></i><?php echo $title; ?></h3>
					
		</div>
	  </div>
          <div class="row">
              <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading"></header>
			 			    <div class="panel-body">

       
	   <?php
}
function getParam($name) {
	if (isset($_POST[$name]) ) {
		return $_POST[$name];
	} elseif (isset($_GET[$name]) ) {
		return $_GET[$name];
	}
}


function setParam($name,$value) {
	$_POST[$name] = $value;
}
function resultToArray($result) {
	$res_array = array();

	for($count=0;$row = mysql_fetch_array($result);$count++) {
		$res_array[$count] = $row;
	}
	return $res_array;
}
function getData($sqlx){
	$result = mysql_query($sqlx);	
	if(!$result) return false;
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0) return false;
	$result = resultToArray($result);
	
	return $result;
}
?>