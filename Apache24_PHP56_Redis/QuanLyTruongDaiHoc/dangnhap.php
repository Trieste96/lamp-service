<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Đăng nhập</title>
</head>
<body>
		<?php
			switch($_GET['checkdangky'])
			{
				case 1:
					echo "<script >";
					echo "alert('Đăng ký thành công!');";    
					echo "</script>";
					break;
				default: break;
			}

	?>
		<form action="#" method="POST">
		Tài khoản:   <input type="text" size="30" name="username" />  <br>
		Mật khẩu:   <input type="password" size="30" name="password"/> <br>
		<p><input type="submit" name="dangnhap" value="Đăng nhập" />
			<input type="submit" name="dangky" value="Đăng ký"/>
		</p>
		<label name="label"></label>

		</form>
		<?php
			$checkconnect=mysqli_connect("localhost","root","") or die("Khong the ket noi co so du lieu!");
			$db=mysqli_select_db($checkconnect,"web2");
			$sql="select * from sinh_vien";
			$connect =mysqli_query($checkconnect,$sql);
		?>
		<?php
			if(isset($_POST['dangnhap']))	
			{			
				$user= $_POST["username"];
				$pass= $_POST["password"];
				$statment="Select * from tai_khoan where TenDangNhap='$user' and MatKhau='$pass'" ;
				$result= mysqli_query($statment);
				if(! $result){
					echo "<script >";
					echo "alert('Tài khoản không có dấu! Vui lòng nhập lại');";    
					echo "</script>";
				}
				else if($user != "" && $pass!="")
				{
					$num_rows=mysqli_num_rows($result); 
					if($num_rows>0) 
					{
						$URL="index.php?page=home&user=$user";
						header ("Location: $URL");
					}
					else echo "<p><font color=\"red\"> Đăng nhập thất bại! </font></p>";
				}
					else if($user =="")
							{
								echo "<script >";
								echo "alert('Vui lòng nhập tài khoản!');";    
								echo "</script>";
							}
						else if($pass =="")
								{
									echo "<script >";
									echo "alert('Vui lòng nhập mật khẩu!');";    
									echo "</script>";
								}
			}
			else if(isset($_POST['dangky']))
				{
					$URL="dangky.php";
					header ("Location: $URL");
				}					
		?>
</body>
</html>
