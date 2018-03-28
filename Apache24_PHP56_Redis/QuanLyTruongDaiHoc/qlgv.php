<title>Quản lý giảng viên</title>
	<div class="line">
		<div class="title">
			<p>Quản lý giảng viên</p>
		</div>
	</div>
	<div class="table">
		<table cellpadding=5 border=1  cellspacing=5>
			<tr cellspacing=1>
				<th>
					Mã giảng viên
				</th>
				<th>
					Họ
				</th>
				<th>
					Tên
				</th>
				<th>
					Số điện thoại
				</th>
				<th>
					Địa chỉ
				</th>
			</tr>
			<?php
				$sql="select * from giang_vien";
				$result = mysql_query($sql);
				while($row=mysql_fetch_assoc($result) )
				{
					echo "<tr cellspacing=1>";
					echo "	<td>";
					echo "	<a href=''>".$row['MaGV']."</a>";
					echo "	</td>";
					echo "	<td>";
					echo 		$row['Ho'];
					echo "	</td>";
					echo "	<td>";
					echo 		$row['Ten'];
					echo "	</td>";
					echo "	<td>";
					echo 		$row['SoDT'];
					echo "	</td>";
					echo "	<td>";
					echo 		$row['DiaChi'];
					echo "	</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
	<div class="buttonlist">
		<form action="#" method="post">
        <input type="submit" value="Thêm Giáo Viên" name="themgv" />
        <input type="submit" value="Sửa Giáo Viên" name="suagv" />
        <input type="submit" value="Xoá Giáo Viên" name="xoagv" />
        <br />
        <table>
        <tr>
        <td>MAGV:<input type="text" name="magv" required maxlength="20"><br></td>
        <td>Họ: <input type="text" name="ho" maxlength="20" /><br /></td>
        <td>Tên: <input type="text" name="ten" maxlength="20" /><br /></td>
        <td>Số Điện Thoại: <input type="text" name="sdt"  maxlength="20" /><br /></td>
        <td>Địa chỉ: <input type="text" name="diachi"  maxlength="20" /><br /></td>
		</tr>
        </table>
        </form>
        <?php
        // Nút thêm gv
	if(isset($_POST['themgv']))
{	
	$magv = $_POST['magv'];
	$ho = $_POST['ho'];
	$ten = $_POST['ten'];
	$sodt = $_POST['sdt'];
	$diachi=$_POST['diachi'];
	$malop = $_POST['malop'];
	$sql="insert into giang_vien(MaGV,Ho,Ten,SoDT,DiaChi) values ('$magv','$ho','$ten','$sodt','$diachi')";
	if(!mysql_query($sql)) die ("Lỗi : không thêm giáo viên được");
	echo "Đã thêm giáo viên mới <br>";
	$URL="index.php?page=qlgv&user=$user";
	header("location:$URL");
}
	// Cấu hình nút xóa giáo viên
	if(isset($_POST['xoagv']))
{
	$magv = $_POST['magv'];
	$malop = $_POST['malop'];
	$set0="SET FOREIGN_KEY_CHECKS=0";
	$sql1="update lop set MaGV='null' where MaGV = $magv";
	$sql2="delete from giang_vien where MaGV='$magv'";
	$set1="SET FOREIGN_KEY_CHECKS=1";
	mysql_query($set0);
	mysql_query($sql1);
	mysql_query($sql2);
	mysql_query($set1);
	$URL="index.php?page=qlgv&user=$user";
	header("location:$URL");
}

// Cấu hình nút sửa giảng viên
	if(isset($_POST['suagv']))
{
	$magv = $_POST['magv'];
	$malop=$_POST['malop'];
	$ho = $_POST['ho'];
	$ten = $_POST['ten'];
	$sodt = $_POST['sdt'];
	$diachi=$_POST['diachi'];
	$sql="update giang_vien set Ho='$ho', Ten='$ten', Sodt='$sodt', DiaChi='$diachi' where MaGV='$magv'";
	if(!mysql_query($sql)) 
		die ("Không update được");
	echo"Đã update";
	$URL="index.php?page=qlgv&user=$user";
	header("location:$URL");
	
}
		
	?>

	</div>
