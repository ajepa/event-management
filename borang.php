<?php session_start(); ?>
<?php include 'dbconfig.php'; ?>
<?php include 'user_info.php'; ?>
<?php

$book_id = $_REQUEST['book_id'];

$query = "SELECT book.*, users.nama, users.no_matrik FROM book JOIN users ON book.user_id = users.id WHERE book.id = $book_id";

$result = $con->query($query);

$row = $result->fetch_assoc();

$startdatetime = new DateTime($row['start_date']);
$enddatetime = new DateTime($row['end_date']);

$sdate = $startdatetime->format('Y-m-d');
$stime = $startdatetime->format('h:i A');

$edate = $enddatetime->format('Y-m-d');
$etime = $enddatetime->format('h:i A');

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
<style type="text/css">
#wrapper #three-column #form1 div table tr td p {
	color: #000;
}
#wrapper #three-column #form1 #page tr td p {
	color: #000;
}
#wrapper #three-column #form1 div {
	color: #000;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;
}

@page {
    margin: 0;
}
</style>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="=">
	<div id="header" class="container">
		<div id="">
			
		</div>
		<?php if(!isset($_REQUEST['print'])){ ?>
		<?php include "menu.php"; ?>
		<?php } ?>
	</div>
	
		
	</div>
</div>
<div id="wrapper">
  <div id="three-column" class="container">
	<div class="title">
	  <h3 align="center">Borang Permohonan Pinjaman Bahan AV</h3>
	</div>
	<form id="form1" method="post" action="booking_process.php">
	  <table width="890" height="93" border="0" align="center"  bgcolor="#CCCCCC" id="footer">
		    <tr>
		      <td height="87" valign="baseline"><p align="left">A.)PERALATAN YANG INGIN DIPINJAM : <em>(*Nyatakan jumlah di petak yang berkenaan) </em></p>
		        <p align="left">
		          <input type="text" name="lcd" id="LCD projektor" value="<?php echo $row['lcd']; ?>"  disabled style=" width: 30px"/>
		          <label for="LCD projektor">LCD projektor</label>
		          <input type="text" name="speaker" id="Speaker " value="<?php echo $row['speaker']; ?>" disabled style=" width: 30px"/>
		          <label for="Speaker ">Speaker </label>
		          <input type="text" name="laptop" id="Laptop" value="<?php echo $row['laptop']; ?>" disabled style=" width: 30px"/>
		          <label for="Laptop">Laptop</label>
		          <input type="text" name="microphone" id="Microphone" value="<?php echo $row['microphone']; ?>" disabled style=" width: 30px"/>
		          <label for="Microphone">Microphone</label>
		          <input type="text" name="screen" id="Screen" value="<?php echo $row['screen']; ?>" disabled style=" width: 30px"/>
		          <label for="Screen">Screen</label>
		          <input type="text" name="tv" id="Tv"  value="<?php echo $row['tv']; ?>" disabled style=" width: 30px"/>
		          <label for="Tv">Tv</label>
		          <input type="text" name="extension" id="Extension " value="<?php echo $row['extension']; ?>" disabled style=" width: 30px"/>
		          <label for="Extension ">Extension </label>
	          </p></td>
	        </tr>
	      </table>
		  <div align="center">
		    
		      <tr>
		        <td width="927" align="center" valign="baseline"><table width="890" height="225" border="0" bgcolor="#CCCCCC">
		          <tr>
		            <td width="253" colspan=""> <p>B) BUTIRAN PROGRAM / AKTIVITI</p></td>
		            <td width="627" valign="baseline"></td>
	              </tr>
<!-- 		          <tr>
		            <td>Hari:</td>
		            <td><select name="school" id="school">
		              <option value="" selected="selected">Pilih</option>
		              <option>Isnin</option>
		              <option>Selasa</option>
		              <option>Rabu</option>
		              <option>Khamis</option>
		              <option>Jumaat</option>
		              <option>Sabtu</option>
		              <option>Ahad</option>
		              </select></td>
	              </tr> -->
		          <tr>
		            <td><span class="control-group">
		              <label class="control-label" >Tarikh Penggunaan:</label>
		              </span></td>
		            <td><span class="input-append date">
		              <input name="tarikh_guna" type="text" class="span2" size="16" value="<?php echo $sdate; ?>" readonly />
		              <font color="#FF0000">*</font> Masa:
		              <input type="text" name="" readonly="" value="<?php echo $stime; ?>">
		              </span></td>
	              </tr>
		          <tr>
		            <td><span class="control-group">
		              <label class="control-label" >Tarikh Selesai:</label>
		              </span></td>
		            <td><input name="tarikh_pulang" type="text" class="span2" size="16"  value="<?php echo $edate; ?>" readonly />
		              <font color="#FF0000">*</font> Masa:
		              <input type="text" name="" readonly="" value="<?php echo $stime; ?>"></td>
	              </tr>
		          <tr>
		            <td><label for="Nama program">Nama program</label>
		              : </td>
		            <td><textarea name="nama_program" cols="30" rows="4" id="Nama program" readonly><?php echo $row['nama_program']; ?></textarea></td>
	              </tr>
		          <tr>
		            <td><p>Tempat :</p>
		              <p></p></td>
		            <td><input type="radio" name="location" id="dewan" value="Dewan" readonly <?php if($row['location'] == 'Dewan'){ echo "checked";}else{echo "disabled";} ?> />
		              <label for="Dewan">Dewan</label>
		              <input type="radio" name="location" id="auditorium" value="Auditorium"  readonly <?php if($row['location'] == 'Auditorium'){ echo "checked";}else{echo "disabled";} ?> />
	                <label for="Auditorium">Auditorium</label></td>
	              </tr>
		          <tr>
		            <td>C)BUTIRAN PEMINJAM:-</td>
		            <td>&nbsp;</td>
	              </tr>
		          <tr>
		            <td>Nama :</td>
		            <td>
		            	<input name="nama" type="nama" id="textfield" size="49%" value="<?php echo $row['nama']; ?>" readonly/>
		            	<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
		            </td>
	              </tr>
		          <tr>
		            <td>No. Staff / Matrik :</td>
		            <td><input type="no.staff/matrik" name="no.staff/matrik" id="textfield3" size="49%" value="<?php echo $row['no_matrik']; ?>"  readonly/></td>
	              </tr>
		          <tr>
		            <td>Jawatan / Persatuan :</td>
		            <td><input name="jawatan/persatuan" type="jawatan/persatuan" id="textfield2" size="49%" value="<?php echo $row['jawatan']; ?>" readonly/></td>
	              </tr>
		          <tr>
		            <td>No .Tel :</td>
		            <td><input name="no.tel" type="no.tel" id="textfield4" size="49%" value="<?php echo $row['no_tel']; ?>" readonly/></td>
	              </tr>
		          </table>		          <p align="left"></p>
	            </td>
	          </tr>
	        </table>
	  </div>
		     
                   
    </form>
		
		
		
  </div>
</div>


</div>
</body>
<?php if(isset($_REQUEST['print'])){
	echo '<script type="text/javascript">window.print();</script>';
}?>


</html>
