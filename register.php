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
	list-style-position: inside;
}
#wrapper #three-column #form1 #page tr td p {
	color: #000;
}
#wrapper #three-column #form1 div {
	color: #000;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
#wrapper #three-column #form1 div table tr td p {
	text-align: left;
}
</style>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="=">
	<div id="header" class="container">
		<div id="">
			
		</div>
		<div id="menu">
			<ul>
				<li class="active"><a href="home.php" accesskey="1" title="">Utama</a></li>
				<li><a href="tentang.php" accesskey="2" title="">Tentang Tempahan</a></li>
                <li><a href="semakan.php" accesskey="3" title="">Semakan </a></li>
				<li><a href="hubungi.php" accesskey="4" title="">Hubungi</a></li>
			
			</ul>
		</div>
	</div>
	
		
</div>
</div>
<div id="wrapper">
  <div id="three-column" class="container">
	<div class="title">
	  <form id="form2" method="post" action="">
	    <h3 align="center">Pendaftaran</h3></form></div>
		<form id="form1" method="post" action="register-process.php">
		  <div align="center">
		    <table width="600" height="202" border="0" bgcolor="#CCCCCC">
		      <tr>
		        <td width="179" height="32" align="left" valign="baseline">Nama : <span class="error-jawatan" style="color: red; visibility: visible"> * </span></td>
		        <td width="405" valign="baseline"><label for="nama"></label>
	            <input required="required" name="nama" type="text" id="nama" size="30" /></td>
	          </tr>
		      <tr>
		        <td height="27" align="left" valign="baseline">No Kad Pengenalan : <span class="error-jawatan" style="color: red; visibility: visible"> * </span>
                <label for="noI/C"></label></td>
		        <td valign="baseline"><label for="noI/C"></label>
	            <input required name="ic" type="text" id="no_ic" size="30" /></td>
	          </tr>
		      <tr>
		        <td height="45" valign="baseline">Alamat : <span class="error-jawatan" style="color: red; visibility: visible"> * </span></td>
		        <td valign="baseline"><label for="alamat"></label>
                <textarea required name="alamat" cols="32" id="alamat"></textarea></td>
	          </tr>
		      <tr>
		        <td height="26" valign="baseline">Email : <span class="error-jawatan" style="color: red; visibility: visible"> * </span>
                <label for="email"></label></td>
		        <td valign="baseline"><label for="email"></label>
	            <input required name="email" type="email" id="email" size="30" /></td>
	          </tr>
		      <tr>
		        <td height="29" valign="baseline">No Staff / Matrik <span class="error-jawatan" style="color: red; visibility: visible"> * </span></td>
		        <td valign="baseline"><label for="password"></label>
		          <label for="username"></label>
	            <input required name="no_matrik" type="text" id="no_matrik" size="30" /></td>
	          </tr>
		      <tr>
		        <td height="29" valign="baseline">Kata Laluan : <span class="error-jawatan" style="color: red; visibility: visible"> * </span></td>
		        <td valign="baseline"><input id="password" name="password" type="password" required="required" class="input-txt" placeholder="Password" size="30" /></td>
	          </tr>
	          <tr>
		        <td height="29" valign="baseline"> Pengesahan K. Laluan : <span class="error-jawatan" style="color: red; visibility: visible"> * </span></td>
		        <td valign="baseline"><input id="c-password" name="" type="password" required="required" class="input-txt" placeholder="Confirm Password" size="30" /></td>
	          </tr>
	        </table>
		    
        <div align="center"></div>
		<div align="center"></div>
		<div class="boxB">
          <div align="center"><!--<a href="daftarberjaya.php" class="button button-alt">Daftar</a>--> <button id="btnSubmit" type="submit" class="button button-alt">Daftar</button></div>
		</div>
</div>
		 
    </form>
		
		
		
  </div>
</div>


</div>
</body>

<script type="text/javascript">
	$("#btnSubmit").click(function(e){
		e.preventDefault();

		if($("#nama").val() == '' || $("#no_ic").val() == '' || $("#alamat").val() == '' || $("#email").val() == '' || $("#no_matrik").val() == '' || $("#password").val() == '' || $("#c-password").val() == ''){
			alert("Sila isi maklumat dengan lengkap!");
		}
		else if($("#password").val() != $("#c-password").val()){
			alert("Kata laluan tidak sama!");
		}
		else{
			$.ajax({
		        url: "ajax_register_check.php",
		        data: { "no_matrik": $('#no_matrik').val() },
		        dataType:"html",
		        type: "post",
		        success: function(data){
		            console.log(data);
		            if(data == 'Available'){
		                $('#form1').submit();
		            }
		            else{
		                alert("No matrik telah di daftar!")
		            }
		        }
		    });
		}
		
	});
	
</script>
</html>
