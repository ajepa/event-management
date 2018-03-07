<?php

$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

?>

<div id="menu">
	<ul>
		<?php if(isset($_SESSION['user_id'])){ ?>
        <li <?php if (preg_match('/admin_history.php/',$url)){ echo 'class="active"'; } ?> ><a href="admin_history.php" accesskey="3" title="">Semakan</a></li>
        <?php } ?>
		<?php if(isset($_SESSION['user_id'])){ ?>
		<li <?php if (preg_match('/logout.php/',$url)){ echo 'class="active"'; } ?> ><a href="logout.php" accesskey="4" title="">Logout</a></li>
		<?php } ?>
	
	</ul>
</div>