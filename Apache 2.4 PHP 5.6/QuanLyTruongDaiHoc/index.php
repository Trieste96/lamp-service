<html>
<body>
	<?php
		session_start();
		header('Content-Type: text/html; charset=utf-8');
		mysql_connect("172.18.0.2","root","");
		mysql_select_db("web2");
		mysql_set_charset("UTF-8");
		mysql_query("set names 'utf8'");
		$user=$_GET['user'];
	?>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="index.css">

	<div class="line">
		<div class="Menu">
		<?php
			echo "<p><a href='index.php?page=home&user=$user'>Trang chủ</a></p>";
		?>
		</div>
		<div class="Menu">
		<?php
			echo "<p><a href='index.php?page=qlsv&user=$user'>Quản lý sinh viên</a></p>";
		?>
		</div>
		<div class="Menu">
		<?php
			echo "<p><a href='index.php?page=qlgv&user=$user'>Quản lý giảng viên</a></p>";
		?>
		</div>
		<div class="Menu">
		<?php
			echo "<p><a href='index.php?page=qll&user=$user'>Quản lý lớp</a></p>";
		?>
		</div>
		<div class="account">
		<?php
			echo "<p>Xin chào <a href='doipass.php?user=$user'>$user</a>";
		?>
			<a href="dangnhap.php?checkdangky=0">Thoát</a></p>
		</div>
	</div>
	<?php
		
			switch($_GET['page'])
			{
				case 'home':
					include("home.php");
					break;
				case 'qlsv':
					include("qlsv.php");
					break;
				case 'qlgv':
					include("qlgv.php");
					break;
				case 'qll':
					include("qll.php");
					break;
				case 'editgv':
					include("editgv.php");
					break;
				case 'updategv':
					include("updategv.php");
					break;
				case 'deletegv':
					include("deletegv.php");
					break;
				default: 
					$URL="dangnhap.php?checkdangky=0";
					header("Location: $URL");
				;
			}

	?>
</body>
</html>
