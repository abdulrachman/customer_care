<?php
//	session_start();
	include_once "fungsiHeader.php";
	include_once "config.php";
	

	if (getParam("action")=="form" || getParam("action")==NULL){
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <img src="img_user/tes.jpg"/>
                        </h1>
                        <h1>Form Keluhan</h1><br>
						<small><b><i style="color:red;">Silahkan masukan keluhan atau complain anda dengan mengisi form berikut</i></b></small>
                    </div>
                </div>
                
				<div class="row">
				<br>
					<form method="post" action="kelola_keluhan.php">
						<table border=0 cellpadding=1 cellspacing=1>
						<tr>
							<td style="padding-left:15px;">Nama Anda</td>
							<td style="padding-left:45px;">:</td>
							<td style="padding-left:15px;">
								<input class="form-control" type="text" id="nama" name="nama" style="width:200px;" required/>
							</td>
						</tr>
						<tr>
							<td style="padding-left:15px;"><br></td>
						</tr>
						<tr>
							<td style="padding-left:15px;">No. Telp</td>
							<td style="padding-left:45px;">:</td>
							<td style="padding-left:15px;">
								<input class="form-control" type="text" id="tlp" name="tlp" style="width:200px;" required/>
							</td>
						</tr>
						<tr>
							<td style="padding-left:15px;"><br></td>
						</tr>
						<tr>
							<td style="padding-left:15px;">Email</td>
							<td style="padding-left:45px;">:</td>
							<td style="padding-left:15px;">
								<input class="form-control" id="email" type="email " name="email" style="width:200px;" required/>
							</td>
						</tr>
						<tr>
							<td style="padding-left:15px;"><br></td>
						</tr>
						<tr>
							<td style="padding-left:15px;">Isi Komplain</td>
							<td style="padding-left:45px;">:</td>
							<td style="padding-left:15px;">
								<textarea class="form-control" id="teks" rows=10 cols=65 name="teks" required></textarea>
							</td>
						</tr>
						<tr>
							<td style="padding-left:15px;"><br></td>
						</tr>
						<tr>
							<td style="padding-left:15px;"></td>
							<td style="padding-left:45px;"></td>
							<td style="padding-left:15px;">
								<button id="submit" name="kirim" class="btn btn-primary" style="width:100px;" onclick="aa();">Kirim</button>
							</td>
						</tr>
						</table>
					</form>
                </div>
<?php }
	  else if (getParam("action")=="status"){ 
?>
			<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <img src="img_user/tes.jpg"/>
                        </h1>
                        <h1>Daftar Keluhan</h1><br>
						<input id="search" type="text" size=20 name='cari' class="form-control" placeholder="Cari data" style="width:250px;" required="required"/><br>
						<small><b><i style="color:red;">Berikut merupakan daftar keluhan</i></b></small>
						
                    </div>
                </div>
                
				<div class="row">
				<table id="example" class="table table-striped table-bordered table-hover" id="dataTables-example" width=100% cellpadding=0 cellspacing=0 border=0 valign=top>
					<thead>
						<th align=center><b>No</b></th>
						<th align=center><b>Nama Pelanggan</b></th>
						<th align=center><b>Tanggal</b></th>
						<th align=center><b>No HP</b></th>
						<th align=center><b>Email</b></th>
						<th align=center><b>Isi Komplain</b></th>
						<th align=center><b>Tanggapan</b></th>
						<th align=center><b>Status</b></th>
						<?php if ($_SESSION['username']=='admin'){ 
							echo "<th align=center><b>Action</b></th>";
							} else { }
						?>
					</thead>
					<tbody>
					<?php
						$data = getData("SELECT * FROM t_keluhan");
						for ($i=0;$i<count($data);$i++){
						$j=$i+1;
					?>
						<tr>
							<td><?php echo $j; ?></td>
							<td><?php echo $data[$i]['nama']; ?></td>
							<td><?php echo $data[$i]['tgl']; ?></td>
							<td><?php echo $data[$i]['no_telp']; ?></td>
							<td><?php echo $data[$i]['email']; ?></td>
							<td><?php echo $data[$i]['isi_komplain']; ?></td>
							<td><?php echo $data[$i]['isi_respon']; ?></td>
							<td><?php echo $data[$i]['status_komplain']; ?></td>
							<?php if ($_SESSION['username']=='admin'){ ?>
							<td><a href = "dashboard.php?action=edit&id=<?php echo $data[$i]['id'];?>"><img src="img_user/images.jpg" style="width:20px;height:20px;"></a></td>
							<?php } else { }?>
						</tr>
					<?php } ?>
					</tbody>
				</table>
                </div>
<?php
		}
		else if (getParam("action")=="edit"){
			$id = $_GET['id'];
			$data = mysql_fetch_assoc(mysql_query("SELECT * FROM t_keluhan WHERE id='$id'"));
?>
				<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <img src="img_user/tes.jpg"/>
                        </h1>
                        <h1>Form Respon Keluhan</h1><br>
						<small><b><i style="color:red;">Silahkan masukan respon keluhan atau complain </i></b></small>
                    </div>
                </div>
                
				<div class="row">
				<br>
					<form method="post" action="edit_keluhan.php">
						<table border=0 cellpadding=1 cellspacing=1>
						<tr>
							<td style="padding-left:15px;">No Pelanggan</td>
							<td style="padding-left:45px;">:</td>
							<td style="padding-left:15px;">
								<input class="form-control" readonly value="<?php echo $data['id'];?>" type="text" id="id" name="id" style="width:200px;" required/>
							</td>
						</tr>
						<tr>
							<td style="padding-left:15px;"><br></td>
						</tr>
						<tr>
							<td style="padding-left:15px;">Nama Anda</td>
							<td style="padding-left:45px;">:</td>
							<td style="padding-left:15px;">
								<input class="form-control" readonly value="<?php echo $data['nama'];?>" type="text" id="nama" name="nama" style="width:200px;" required/>
							</td>
						</tr>
						<tr>
							<td style="padding-left:15px;"><br></td>
						</tr>
						<tr>
							<td style="padding-left:15px;">No. Telp</td>
							<td style="padding-left:45px;">:</td>
							<td style="padding-left:15px;">
								<input class="form-control" readonly value="<?php echo $data['no_telp'];?>" type="text" id="tlp" name="tlp" style="width:200px;" required/>
							</td>
						</tr>
						<tr>
							<td style="padding-left:15px;"><br></td>
						</tr>
						<tr>
							<td style="padding-left:15px;">Email</td>
							<td style="padding-left:45px;">:</td>
							<td style="padding-left:15px;">
								<input class="form-control" readonly value="<?php echo $data['email'];?>" id="email" type="email" name="email" style="width:200px;" required/>
							</td>
						</tr>
						<tr>
							<td style="padding-left:15px;"><br></td>
						</tr>
						<tr>
							<td style="padding-left:15px;">Isi Komplain</td>
							<td style="padding-left:45px;">:</td>
							<td style="padding-left:15px;">
								<textarea class="form-control" readonly id="teks" rows=10 cols=65 name="teks" required><?php echo $data['isi_komplain'];?></textarea>
							</td>
						</tr>
						<tr>
							<td style="padding-left:15px;"><br></td>
						</tr>
						<tr>
							<td style="padding-left:15px;">Beri Respon</td>
							<td style="padding-left:45px;">:</td>
							<td style="padding-left:15px;">
								<textarea class="form-control" id="teks" rows=10 cols=65 name="respon" required></textarea>
							</td>
						</tr>
						<tr>
							<td style="padding-left:15px;"><br></td>
						</tr>
						<tr>
							<td style="padding-left:15px;"></td>
							<td style="padding-left:45px;"></td>
							<td style="padding-left:15px;">
								<button id="submit" name="kirim" class="btn btn-primary" style="width:100px;">Kirim</button>
							</td>
						</tr>
						</table>
					</form>
                </div>
                <!-- /.row -->
<?php } ?>

<script>
// Write on keyup event of keyword input element
    $("#search").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#example tbody").find("tr"), function() {
            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1){
               $(this).hide();
			}
            else{
               $(this).show();
			}				 
        });
    });
	
</script>     