<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Đổi mật khẩu</title>
</head>
<body>
		<form action="#" method="POST">
		Mật khẩu hiện tại:   <input type="password" size="30" name="password" />  <br>
		Mật khẩu mới:   <input type="password" size="30" name="password1"/> <br>
		Xác nhận lại mật khẩu:   <input type="password" size="30" name="password2"/> <br>
		<p><input type="submit" name="doipass" value="Xác nhận đổi mật khẩu" />
		<input type="submit" name="quaylai" value="Quay lại" />
		</p>
		<label name="label"></label>

		</form>
		<?php
			$checkconnect=mysql_connect("172.18.0.2","root","") or die("Khong the ket noi co so du lieu!");
			$db=mysql_select_db("web2");
			$sql="select * from sinh_vien";
			$connect =mysql_query($sql);
		?>
		<?php
			$user=$_GET['user'];
			if(isset($_POST['doipass']))	
			{	
				$pass= $_POST["password"];
				$pass1= $_POST["password1"];
				$pass2= $_POST["password2"];
				$statment="Select * from tai_khoan where TenDangNhap='$user'" ;
				$result= mysql_query($statment);
				$row=mysql_fetch_assoc($result);
				$check=$row['MatKhau'];
				if($check != $pass){
					echo "<script >";
					echo "alert('Sai mật khẩu hiện tại! Vui lòng nhập lại');";    
					echo "</script>";
				}
				else
				{
					if($check==$pass && $pass != $pass1 && $pass1==$pass2 && $pass!="" && $pass1!="" && $pass2!=""  ) 
					{
						$statment="UPDATE `tai_khoan` SET MatKhau='$pass1' where TenDangNhap='$user'" ;
						$result= mysql_query($statment);
						echo "<script >";
						echo "alert('Đổi mật khẩu thành công!');";   
						echo "</script>";
						$URL="index.php?page=home&user=$user";
						header("location:$URL");
					}
					else if($pass == $pass1) 
						{
							echo "<script >";
							echo "alert('Mật khẩu hiện tại phải khác mật khẩu mới! Vui lòng nhập lại!');";    
							echo "</script>";
						}
						else if($pass1 != $pass2)
							{
								echo "<script >";
								echo "alert('Mật khẩu mới và mật khẩu xác nhận lại không giống nhau!\\n Vui lòng nhập lại!');";    
								echo "</script>";
							}
							else 
							{
								echo "<script >";
								echo "alert('Vui lòng điền đầy đủ mật khẩu!');";    
								echo "</script>";
							}
				
				}
			}
			else if(isset($_POST['quaylai']))
				{
					$URL="index.php?page=home&user=$user";
					header("location:$URL");
				}					
		?>
</body>
</html>
