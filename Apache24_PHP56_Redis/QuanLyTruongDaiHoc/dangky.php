<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Đăng ký</title>
</head>
<body>
		<form action="#" method="POST">
		Tài khoản mới:   <input type="text" size="30" name="username" />  <br>
		Mật khẩu:   <input type="password" size="30" name="password" /> <br>
		Xác nhận lại mật khẩu:   <input type="password" size="30" name="password1"/> <br>
		<p>
			<input type="submit" name="xacnhan" value="Xác nhận"/>
			<input type="submit" name="quaylai" value="Quay lại" />
		</p>	
		<label name="label"></label>

		</form>
		<?php
			$checkconnect=mysql_connect("172.17.0.3","root","") or die("Khong the ket noi co so du lieu!");
			$db=mysql_select_db("web2");
			$sql="select * from sinh_vien";
			$connect =mysqli_query($sql);
		?>
		<?php
			if(isset($_POST['xacnhan']))	
			{		
				
				$user= $_POST["username"];
				$pass= $_POST["password"];
				$pass1= $_POST["password1"];
				$statment2="Select * from tai_khoan where TenDangNhap='$user'" ;
				$result= mysqli_query($statment2);
				if(! $result){
					echo "<script >";
					echo "alert('Tài khoản không có dấu! Vui lòng nhập lại');";    
					echo "</script>";
				}
				else
				{
					if($user != "" && $pass!= "")
					{
						$num_rows=mysql_num_rows($result);
						if($num_rows>0) 
						{
							echo "<script >";
							echo "alert('Tài khoản đã có người sử dụng! Vui lòng nhập lại');";    
							echo "</script>";
						} else if($pass != $pass1)
							{
								echo "<script >";
								echo "alert('Mật khẩu mới và mật khẩu xác nhận lại không giống nhau!\\n Vui lòng nhập lại!');";    
								echo "</script>";
							}
						else
						{
							$statment="INSERT INTO `web2`.`tai_khoan` (`TenDangNhap`,`MatKhau`) VALUES ('$user','$pass') ";
							$result= mysqli_query($statment) or die(mysql_error());
							$URL="dangnhap.php?checkdangky=1";
							header ("Location: $URL");
						} 
					}
					else 
					{
						echo "<script>";
						echo "alert('Dữ liệu không được để trống!');";    
						echo "</script>";
					}
					}
				}	
				else if(isset($_POST['quaylai']))
				{
					$URL="dangnhap.php?checkdangky=0";
					header("location:$URL");
				}						
		?>
</body>
</html>
