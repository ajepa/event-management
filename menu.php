<?php

$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

?>

<div id="menu">
	<ul>
		<li <?php if (preg_match('/home.php/',$url)){ echo 'class="active"'; } ?> ><a href="index.php" accesskey="1" title="">Utama</a></li>
		<li <?php if (preg_match('/tentang.php/',$url)){ echo 'class="active"'; } ?> ><a href="tentang.php" accesskey="2" title="">Tentang Kami </a></li>
		<?php if(isset($_SESSION['user_id'])){ ?>
		<li <?php if (preg_match('/calendar.php/',$url) || preg_match('/booking.php/',$url)){ echo 'class="active"'; } ?> ><a href="calendar.php" accesskey="2" title="">Tempahan </a></li>
		<?php } ?>
		<?php if(isset($_SESSION['user_id'])){ ?>
        <li <?php if (preg_match('/history.php/',$url)){ echo 'class="active"'; } ?> ><a href="history.php" accesskey="3" title="">Semakan</a></li>
        <?php } ?>
		<li <?php if (preg_match('/hubungi.php/',$url)){ echo 'class="active"'; } ?> ><a href="hubungi.php" accesskey="4" title="">Hubungi</a></li>
		<?php if(isset($_SESSION['user_id'])){ ?>
		<li <?php if (preg_match('/logout.php/',$url)){ echo 'class="active"'; } ?> ><a href="logout.php" accesskey="4" title="">Logout</a></li>
		<?php } ?>
	
	</ul>
</div>