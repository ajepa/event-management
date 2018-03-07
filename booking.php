<?php session_start(); ?>
<?php include 'dbconfig.php'; ?>
<?php include 'user_info.php'; ?>


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
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;
}
</style>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="=">
	<div id="header" class="container">
		<div id="">
			
		</div>
		<?php include "menu.php"; ?>
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
		          <input type="text" name="lcd" id="LCD projektor" value="" style=" width: 30px" />
		          <label for="LCD projektor">LCD projektor</label>
		          <input type="text" name="speaker" id="Speaker " value="" style=" width: 30px" />
		          <label for="Speaker ">Speaker </label>
		          <input type="text" name="laptop" id="Laptop" value="" style=" width: 30px" />
		          <label for="Laptop">Laptop</label>
		          <input type="text" name="microphone" id="Microphone" value="" style=" width: 30px"/>
		          <label for="Microphone">Microphone</label>
		          <input type="text" name="screen" id="Screen" value="" style=" width: 30px"/>
		          <label for="Screen">Screen</label>
		          <input type="text" name="tv" id="Tv" value="" style=" width: 30px" />
		          <label for="Tv">Tv</label>
		          <input type="text" name="extension" id="Extension " value="" style=" width: 30px"/>
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
		              <input name="tarikh_guna" type="text" class="span2" size="16" value="<?php echo $_POST['event-start-date'] ?>" readonly />
		              <font color="#FF0000">*</font> Masa:
		              <select class="dropdown-submenu" name="masa_guna" id="masa_guna" readonly>
		                <option value=""  <?php if($_POST['masa_guna'] == ''){ echo "selected"; }else{ echo "disabled"; } ?> >Pilih</option>
		                <option value="8" <?php if($_POST['masa_guna'] == 8){ echo "selected"; }else{ echo "disabled"; } ?> >08.00</option>
		                <option value="9" <?php if($_POST['masa_guna'] == 9){ echo "selected"; }else{ echo "disabled"; } ?> >09.00</option>
		                <option value="10" <?php if($_POST['masa_guna'] == 10){ echo "selected"; }else{ echo "disabled"; } ?> >10.00</option>
		                <option value="11" <?php if($_POST['masa_guna'] == 11){ echo "selected"; }else{ echo "disabled"; } ?> >11.00</option>
		                <option value="12" <?php if($_POST['masa_guna'] == 12){ echo "selected"; }else{ echo "disabled"; } ?> >12.00</option>
		                <option value="1" <?php if($_POST['masa_guna'] == 1){ echo "selected"; }else{ echo "disabled"; } ?> >01.00</option>
		                <option value="2" <?php if($_POST['masa_guna'] == 2){ echo "selected"; }else{ echo "disabled"; } ?> >02.00</option>
		                <option value="3" <?php if($_POST['masa_guna'] == 3){ echo "selected"; }else{ echo "disabled"; } ?> >03.00</option>
		                <option value="4" <?php if($_POST['masa_guna'] == 4){ echo "selected"; }else{ echo "disabled"; } ?> >04.00</option>
		                <option value="5" <?php if($_POST['masa_guna'] == 5){ echo "selected"; }else{ echo "disabled"; } ?> >05.00</option>
		                <option value="6" <?php if($_POST['masa_guna'] == 6){ echo "selected"; }else{ echo "disabled"; } ?> >06.00</option>
		                <option value="7" <?php if($_POST['masa_guna'] == 7){ echo "selected"; }else{ echo "disabled"; } ?> >07.00</option>
	                </select>
		              <select class="dropdown-submenu" name="ampm1" id="masa_guna1" readonly>
		                <option value="" <?php if($_POST['ampm1'] == ''){ echo "selected"; }else{ echo "disabled"; } ?>>Pilih</option>
		                <option value="AM" <?php if($_POST['ampm1'] == 'AM'){ echo "selected"; }else{ echo "disabled"; } ?>>AM</option>
		                <option value="PM" <?php if($_POST['ampm1'] == 'PM'){ echo "selected"; }else{ echo "disabled"; } ?>>PM</option>
	                </select>
		              </span></td>
	              </tr>
		          <tr>
		            <td><span class="control-group">
		              <label class="control-label" >Tarikh Selesai:</label>
		              </span></td>
		            <td><input name="tarikh_pulang" type="text" class="span2" size="16"  value="<?php echo $_POST['event-end-date'] ?>" readonly />
		              <font color="#FF0000">*</font> Masa:
		              <select class="dropdown-submenu" name="masa_pulang" id="masa_pulang">
		                <option value=""  <?php if($_POST['masa_pulang'] == ''){ echo "selected"; }else{ echo "disabled"; } ?> >Pilih</option>
		                <option value="8" <?php if($_POST['masa_pulang'] == 8){ echo "selected"; }else{ echo "disabled"; } ?> >08.00</option>
		                <option value="9" <?php if($_POST['masa_pulang'] == 9){ echo "selected"; }else{ echo "disabled"; } ?> >09.00</option>
		                <option value="10" <?php if($_POST['masa_pulang'] == 10){ echo "selected"; }else{ echo "disabled"; } ?> >10.00</option>
		                <option value="11" <?php if($_POST['masa_pulang'] == 11){ echo "selected"; }else{ echo "disabled"; } ?> >11.00</option>
		                <option value="12" <?php if($_POST['masa_pulang'] == 12){ echo "selected"; }else{ echo "disabled"; } ?> >12.00</option>
		                <option value="1" <?php if($_POST['masa_pulang'] == 1){ echo "selected"; }else{ echo "disabled"; } ?> >01.00</option>
		                <option value="2" <?php if($_POST['masa_pulang'] == 2){ echo "selected"; }else{ echo "disabled"; } ?> >02.00</option>
		                <option value="3" <?php if($_POST['masa_pulang'] == 3){ echo "selected"; }else{ echo "disabled"; } ?> >03.00</option>
		                <option value="4" <?php if($_POST['masa_pulang'] == 4){ echo "selected"; }else{ echo "disabled"; } ?> >04.00</option>
		                <option value="5" <?php if($_POST['masa_pulang'] == 5){ echo "selected"; }else{ echo "disabled"; } ?> >05.00</option>
		                <option value="6" <?php if($_POST['masa_pulang'] == 6){ echo "selected"; }else{ echo "disabled"; } ?> >06.00</option>
		                <option value="7" <?php if($_POST['masa_pulang'] == 7){ echo "selected"; }else{ echo "disabled"; } ?> >07.00</option>
	                  </select>
		              <select class="dropdown-submenu" name="ampm2" id="masa_pulang1">
		                <option value="" <?php if($_POST['ampm2'] == ''){ echo "selected"; }else{ echo "disabled"; } ?>>Pilih</option>
		                <option value="AM" <?php if($_POST['ampm2'] == 'AM'){ echo "selected"; }else{ echo "disabled"; } ?>>AM</option>
		                <option value="PM" <?php if($_POST['ampm2'] == 'PM'){ echo "selected"; }else{ echo "disabled"; } ?>>PM</option>
	                  </select></td>
	              </tr>
		          <tr>
		            <td><label for="Nama program">Nama program</label>
		              : </td>
		            <td><textarea name="nama_program" cols="30" rows="4" id="Nama program" readonly><?php echo $_POST['event-name']; ?></textarea></td>
	              </tr>
		          <tr>
		            <td><p>Tempat :</p>
		              <p></p></td>
		            <td><input type="radio" name="location" id="dewan" value="Dewan" readonly <?php if($_POST['location'] == 1){ echo "checked";}else{echo "disabled";} ?> />
		              <label for="Dewan">Dewan</label>
		              <input type="radio" name="location" id="auditorium" value="Auditorium"  readonly <?php if($_POST['location'] == 2){ echo "checked";}else{echo "disabled";} ?> />
	                <label for="Auditorium">Auditorium</label></td>
	              </tr>
		          <tr>
		            <td>C)BUTIRAN PEMINJAM:-</td>
		            <td>&nbsp;</td>
	              </tr>
		          <tr>
		            <td>Nama :</td>
		            <td>
		            	<input name="nama" type="nama" id="textfield" size="49%" value="<?php echo $user_name; ?>" readonly/>
		            	<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
		            </td>
	              </tr>
		          <tr>
		            <td>No. Staff / Matrik : </td>
		            <td><input type="no.staff/matrik" name="no.staff/matrik" id="textfield3" size="49%" value="<?php echo $user_matrik; ?>"  readonly/></td>
	              </tr>
		          <tr>
		            <td>Jawatan / Persatuan : <span class="error-jawatan" style="color: red; visibility: hidden"> * </span></td>
		            <td><input name="jawatan/persatuan" type="jawatan/persatuan" id="jawatan" size="49%" required="required" /></td>
	              </tr>
		          <tr>
		            <td>No .Tel : <span class="error-tel" style="color: red; visibility: hidden"> * </span></td>
		            <td><input name="no.tel" type="no.tel" id="tel" value="" size="49%" required="required"/></td>
	              </tr>
		          </table>		          <p align="left"></p>
	            </td>
	          </tr>
	        </table>
		    <table width="936" border="0">
		      <tr>
		        <td height="26" valign="baseline"><div align="center">
		          <p>
		            <input type="submit" class="btn btn-primary btn-small" name="submit" id="submit" value="Hantar" />
                  </p>
		        </div>
                </td>
	          </tr>
	        </table>
	  </div>
		     
                   
    </form>
		
		
		
  </div>
</div>


</div>
</body>

<script type="text/javascript">
$(document).ready(function() {
	$('#submit').click(function() {
		if($('#jawatan').val() == ''){
            $('.error-jawatan').css("visibility", "visible");
        }
        else{
        	$('.error-jawatan').css("visibility", "hidden");
        }

        if($('#tel').val() == ''){
            $('.error-tel').css("visibility", "visible");
        }
        else{
        	$('.error-tel').css("visibility", "hidden");
        }
	});
});
</script>	
</html>
