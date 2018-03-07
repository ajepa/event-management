<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
  //Start session 
  session_start();
  //print_r($_SESSION);
  
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

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
        
        <img src="images/logo-2017.jpg" width="1200" height="100" /><br />
<table width="1200" border="0" align="center">
  <tr>
    <td> <marquee direction="right" behavior="alternate" ><h3>SELAMAT DATANG KE SISTEM PENDAFTARAN DEWAN UNIVERSITI SULTAN AZLAN SHAH</h3></marquee> </td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1146" border="0">
    <tr>
      <td width="776"><table width="569" border="0">
        <tr>
          <td width="798"><b>Pengenalan Sistem Tempahan dewan</b></td>
        </tr>
        <tr>
          <td>Sistem ini dibina untuk memudahkan semua staf dan pelajar Univesiti Sultan Azlan Shah membuat tempahan Dewan Utama.Dengan adanya sistem ini ,para staff dan pelajar boleh mengetahui dengan mudah sama ada dewan ini sudah ditempah atau belum tanpa merujuk kepada staf di Jabatan Pembangunan dan Selenggara.</td>
        </tr>
      </table></td>
      <?php if(!isset($_SESSION['user_id'])){ ?>
      <td width="360" bgcolor="#999999"> MASUKKAN NO. KAD PENGENALAN DAN PASSWORD
        <form method="post" action="login-process.php">
          <p>
            <input type="text" name="no_matrik" placeholder="No. Staf/Matrik" required="required" class="input-txt" />
          </p>
          <p>
            <input type="password" name="password" placeholder="Password" required="required" class="input-txt" />
            <br />
          </p>
          <center>
            <button type="submit" class="submit" name="submit">LOG IN </button>
          </center>
        </form></td>
        <?php } ?>
    </tr>
</table>
<p>
<?php if(!isset($_SESSION['user_id'])){ ?>
<div align="right">
  <blockquote>
    <blockquote>
      <p>Jika belum
        <label for="Daftar3"><a href="register.php">Daftar</a></label>
      </p>
    </blockquote>
</blockquote></div>
<?php } ?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
  //If there is an error during login 
if(isset($_SESSION["error"])){
  if($_SESSION["error"] != ''){

    // remove all session variables
    session_unset(); 

    // destroy the session 
    session_destroy(); 
    
    //echo alertbox
    echo "<script>alert('No Matrik / Password tidak ditemui')</script>";

  }
}
  
?>
		
</body>
</html>