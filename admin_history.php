<?php 

session_start();

include 'dbconfig.php';
include 'user_info.php';

if($user_type == 0){
	header("Location: home.php");
}

$query = "SELECT * FROM book";

$result = $con->query($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="assets/js/jquery.min.js"></script>
<style type="text/css">
#wrapper #three-column #form1 div table tr td p {
	color: #000;
}
#wrapper #three-column #form1 #page tr td p {
	color: #000;
}
#wrapper #three-column #form1 div {
	color: #000;
}

table {
    border-collapse: collapse;
}

table, th, td {
   border: 1px solid rgba(0,0,0,0.6);
}

th, td{
	padding: 10px 10px;
}
</style>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="=">
	<div id="header" class="container">
		<div id="">
			
		</div>
		<?php include "menu_admin.php"; ?>
	</div>
	
		
	</div>
</div>
<div id="wrapper">
  <div id="three-column" class="container">
	<div class="title">
	  <h3 align="center">Histori Tempahan dan Kelulusan Tempahan</h3>
	</div>
	<div>
	<center>	
		<table>
			<thead>
				<tr>
					<th></th>
					<th>Nama Program</th>
					<th>Lokasi</th>
					<th>Tarikh Mula</th>
					<th>Tarikh Akhir</th>
					<th>Status</th>
					<th>Borang</th>
					<th></th>
					<th>Catatan</th>
				</tr>
			</thead>
			<tbody>
				<?php $count = 1; ?>
				<?php while($row = $result->fetch_assoc()) { ?>
				<?php 
					if($row['approval'] == 1){
						$row['approval'] = 'Diluluskan';
					}
					else if($row['approval'] == 2){
						$row['approval'] = 'Ditolak';
					}
					else if($row['approval'] == 3){
						$row['approval'] = 'Batal';
					}
					else{
						$row['approval'] = 'Dalam Proses';
					}
				?>
				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo $row['nama_program']; ?></td>
					<td><?php echo $row['location']; ?></td>
					<td><?php echo $row['start_date']; ?></td>
					<td><?php echo $row['end_date']; ?></td>
					<td><?php echo $row['approval']; ?></td>
					<td><a class="borang" href="borang.php?book_id=<?php echo $row['id']; ?>" target="_blank">Lihat Borang</a></td>
					<td>
						<a class="lulus" href="approval.php?book_id=<?php echo $row['id']; ?>&status=1">Lulus</a>
						<a class="tolak" no="<?php echo $row['id']; ?>" >Tolak</a>
					</td>
					<td>
						<textarea  id="reason<?php echo $row['id']; ?>" rows="4" cols="10"><?php echo $row['reason'];?></textarea>
					</td>
					<td><a class="salin" href="borang.php?book_id=<?php echo $row['id']; ?>&print=1" target="_blank">Salin</a></td>
				</tr>
				<?php $count++; ?>
				<?php } ?>
			</tbody>
		</table>
	</center>
	</div>
</div>
		
</div>
</div>


</div>
</body>

<script>
$(".tolak").click(function(){
	var no = $(this).attr("no");
	var reason  = $("#reason"+no).val();
    //alert($("#reason"+no).val());
    window.location.href = 'approval.php?book_id='+no+'&reason='+reason+'&status=2';
});
</script>


</html>

<?php
  //If there is an error during login
if(isset($_SESSION["message"])){
  if($_SESSION["message"] != ''){

    //echo alertbox
    echo '<script>alert("' . $_SESSION["message"] .  '")</script>';
    $_SESSION["message"]  = '';

  }
}
?>
